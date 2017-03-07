<?php

namespace Cornershort\MLMappBundle\Controller;

use Cornershort\MLMappBundle\Entity\MemberPaymentHistory;
use Cornershort\MLMappBundle\Form\MemberPaymentHistoryType;
use Cornershort\MLMappBundle\Entity\User;
use Cornershort\MLMappBundle\Entity\ProductInfo;
use Cornershort\MLMappBundle\Entity\LevelInfo;

use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View as FOSView;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Voryx\RESTGeneratorBundle\Controller\VoryxController;

/**
 * MemberPaymentHistory controller.
 * @RouteResource("MemberPaymentHistory")
 */
class MemberPaymentHistoryRESTController extends VoryxController
{
    /**
     * Get a MemberPaymentHistory entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @return Response
     *
     */
    public function getAction(MemberPaymentHistory $entity)
    {
        return $entity;
    }
    /**
     * Get all MemberPaymentHistory entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param ParamFetcherInterface $paramFetcher
     *
     * @return Response
     *
     * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing notes.")
     * @QueryParam(name="limit", requirements="\d+", default="20", description="How many notes to return.")
     * @QueryParam(name="order_by", nullable=true, array=true, description="Order by fields. Must be an array ie. &order_by[name]=ASC&order_by[description]=DESC")
     * @QueryParam(name="filters", nullable=true, array=true, description="Filter by fields. Must be an array ie. &filters[id]=3")
     */
    public function cgetAction(ParamFetcherInterface $paramFetcher)
    {
        try {
            $offset = $paramFetcher->get('offset');
            $limit = $paramFetcher->get('limit');
            $order_by = $paramFetcher->get('order_by');
            $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('CornershortMLMappBundle:MemberPaymentHistory')->findBy($filters, $order_by, $limit, $offset);
            if ($entities) {
                return $entities;
            }

            return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * Create a MemberPaymentHistory entity.
     *
     * @View(statusCode=201, serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     *
     * @return Response
     *
     */
    public function postAction(Request $request)
    {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $my_id = '005';
        $memberId = '005';
        $id = 1;

        //FIND MY INFO
        // $this->myInfo($my_id);
        $myInfo = $em->getRepository('CornershortMLMappBundle:ProductInfo')->find($id);

        //FIND MEMBER'S PAYMENT HISTORY
        $memberPaymentHistory = $em->getRepository('CornershortMLMappBundle:MemberPaymentHistory')->findBy(array('memberId' => $my_id, 'isLevelPaid' => 0));
    }
    /**
     * Update a MemberPaymentHistory entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function putAction(Request $request, MemberPaymentHistory $entity)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $request->setMethod('PATCH'); //Treat all PUTs as PATCH
            $form = $this->createForm(get_class(new MemberPaymentHistoryType()), $entity, array("method" => $request->getMethod()));
            $this->removeExtraFields($request, $form);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->flush();

                return $entity;
            }

            return FOSView::create(array('errors' => $form->getErrors()), Codes::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * Partial Update to a MemberPaymentHistory entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function patchAction(Request $request, MemberPaymentHistory $entity)
    {
        return $this->putAction($request, $entity);
    }
    /**
     * Delete a MemberPaymentHistory entity.
     *
     * @View(statusCode=204)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function deleteAction(Request $request, MemberPaymentHistory $entity)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();

            return null;
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function postRequestForUpgradeAction(Request $request) {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $em = $this->getDoctrine()->getManager();
        $memberId = '005';

        //FIND myInfo
        $myInfo = $em->getRepository('CornershortMLMappBundle:User')->findBy(
            array(
                'memberId' => $memberId
            )
        );

        //FIND isLevelLevelPaid
        $isLevelPaid = $em->getRepository('CornershortMLMappBundle:MemberPaymentHistory')->findBy(
            array(
                'memberId' => $memberId,
                'isLevelRequested' => 1,
                'isLevelPaid' => 0
            )
        );

        //FIND productInfo
        $productInfo = $em->getRepository('CornershortMLMappBundle:ProductInfo')->findBy(
            array(
                'activationLevel' => $myInfo[0]->getActivationLevel() + 1
            )
        );

        //FIND levelInfo
        $levelInfo = $em->getRepository('CornershortMLMappBundle:LevelInfo')->findBy(
            array(
                'activationLevel' => $myInfo[0]->getActivationLevel() + 1
            )
        );

        if (is_null($isLevelPaid[0])) {
            $saved_record = 0;
            $data['leader_id'] = $myInfo[0]->getLeaderID();
            $data['member_id'] = $memberId;
            $data['membership_option'] = 'cash';
            $data['activation_level'] = $myInfo[0]->getActivationLevel() + 1;
            $data['product_amount'] = $productInfo[0]->getProductAmount();
            $data['level_amount'] = $levelInfo[0]->getLevelAmount();
            $data['date_requested'] = date('Y-m-d H:i:s');
            $data['is_level_requested'] = 1;
            $data['date_level_upgraded'] = '';
            $data['is_level_paid'] = '';
            $data['date_product_upgraded'] = '';
            $data['is_product_paid'] = '';
            $data['date_completed'] = '';

            $saved_record = $SQLHelper->insertRecord('member_payment_history', $data);

            if (!$saved_record) {
                return "Error";
            } else {
                return "Success";
            }
        }
    }

    public function postUpgradeMemberAction(Request $request) {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $memberId = str_pad($data['member_id'], 3, '0', STR_PAD_LEFT);

        //FIND isLevelLevelPaid
        $isLevelPaid = $em->getRepository('CornershortMLMappBundle:MemberPaymentHistory')->findBy(
            array(
                'memberId' => $memberId,
                'isLevelRequested' => 1,
                'isLevelPaid' => 0
            )
        );

        if (!is_null($isLevelPaid[0])) {
            $data = [];
            $data['id'] = $isLevelPaid[0]->getId();
            $data['member_id'] = $memberId;
            $data['is_level_paid'] = 1;

            $saved_record = $SQLHelper->updateRecord('member_payment_history', $data);
        }

        if (!$saved_record) {
            return "Error";
        } else {
            return "Success";
        }
    }
}

// $memberPaymentHistory = new MemberPaymentHistory();
// $memberPaymentHistory->setLeaderId(1);
// $MemberPaymentHistory->setMemberId();
// $MemberPaymentHistory->setMembershipOption('');
// $MemberPaymentHistory->setActivationLevel();
// $MemberPaymentHistory->setProductAmount();
// $MemberPaymentHistory->setLevelAmount();
// $MemberPaymentHistory->setDateRequested();
// $MemberPaymentHistory->setDateLevelUpgraded();
// $MemberPaymentHistory->setIsLevelPaid();
// $MemberPaymentHistory->setDateProductUpgraded();
// $MemberPaymentHistory->setIsProductPaid();
// $MemberPaymentHistory->setDateCompleted();
//
// $em = $this->getDoctrine()->getManager();
// $em->persist($memberPaymentHistory);
// $em->flush();
