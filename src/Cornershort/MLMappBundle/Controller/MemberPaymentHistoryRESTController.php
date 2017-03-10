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
        $memberPaymentHistory = $em->getRepository('CornershortMLMappBundle:MemberPaymentHistory')->findBy(
            array(
                'memberId' => $my_id,
                'isLevelPaid' => 0
            )
        );
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
        $myId = '005';

        //FIND myInfo
        $myInfo = $em->getRepository('CornershortMLMappBundle:User')->findBy(
            array(
                'memberId' => $myId
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

        if ($data[type] == 'level') {
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
        } else {
            //FIND isLevelProductPaid
            $isProductPaid = $em->getRepository('CornershortMLMappBundle:MemberPaymentHistory')->findBy(
                array(
                    'memberId' => $memberId,
                    'isProductPaid' => 0
                )
            );

            if (is_null($isProductPaid[0])) {
                $saved_record = 0;
                $data['leader_id'] = $myInfo[0]->getLeaderID();
                $data['member_id'] = $memberId;
                $data['membership_option'] = 'cash';
                $data['activation_level'] = $myInfo[0]->getActivationLevel() + 1;
                $data['product_amount'] = $productInfo[0]->getProductAmount();
                $data['level_amount'] = $levelInfo[0]->getLevelAmount();
                $data['date_requested'] = date('Y-m-d H:i:s');
                $data['is_level_requested'] = 1;
                // $data['date_level_upgraded'] = '';
                // $data['is_level_paid'] = '';
                $data['date_product_upgraded'] = date('Y-m-d H:i:s');
                $data['is_product_paid'] = '1';
                // $data['date_completed'] = '';

                $saved_record = $SQLHelper->insertRecord('member_payment_history', $data);
            } else {
                $data = [];
                $data['id'] = $isProductPaid[0]->getId();
                $data['member_id'] = $memberId;
                $data['is_product_paid'] = 1;

                $saved_record = $SQLHelper->updateRecord('member_payment_history', $data);
            }
        }


        if (!$saved_record) {
            return "Error";
        } else {
            return "Success";
        }
    }

    public function postSearchMemberAction(Request $request) {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $memberId = str_pad($data['member_id'], 3, '0', STR_PAD_LEFT);

        //FIND memberInfo
        $memberInfo = $em->getRepository('CornershortMLMappBundle:User')->findBy(
            array(
                'memberId' => $memberId
            )
        );

        return $memberInfo;
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
