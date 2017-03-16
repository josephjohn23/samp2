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

        $memberId = '1';
        $memberId = str_pad($memberId, 8, '0', STR_PAD_LEFT); //need $leaderId = session['leaderId'];

        //FIND myInfo
        $myInfo = $em->getRepository('CornershortMLMappBundle:ProductInfo')->find($id);

        //FIND member_payment_history
        $memberPaymentHistory = $em->getRepository('CornershortMLMappBundle:MemberPaymentHistory')->findBy(
            array(
                'memberId' => $memberId,
                'isLevelPaid' => 0
            )
        );
    }

    public function postSearchNextLeaderAction(Request $request) {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $em = $this->getDoctrine()->getManager();
        $memberId = '1';
        $memberId = str_pad($memberId, 8, '0', STR_PAD_LEFT); //need $leaderId = session['leaderId'];

        //FIND isLevelLevelPaid
        $isLevelPaid = $em->getRepository('CornershortMLMappBundle:MemberPaymentHistory')->findBy(
            array(
                'memberId' => $memberId,
                'isLevelRequested' => 1,
                'isLevelPaid' => 0
            )
        );

        //FIND myInfo
        $params = array('my_id' => $memberId,);
        $sql = "SELECT * FROM users WHERE member_id=:my_id ";
        $my_info = $SQLHelper->fetchRow($sql, $params);

        //FIND next_leader_id
        $sql = "SELECT next_leader_id, activation_level FROM users WHERE member_id=:my_id";
        $next_leader_info = $SQLHelper->fetchRow($sql, $params);

        //FIND next_leader_info
        $params = array('next_leader_id' => $next_leader_info['next_leader_id'],);
        $sql = "SELECT * FROM users WHERE member_id=:next_leader_id";
        $next_leader_info = $SQLHelper->fetchRow($sql, $params);

            if (!isset($next_leader_info['member_id'])) {
                $next_leader_info['member_id'] = '001';
                $next_leader_info['first_name'] = 'Juan';
                $next_leader_info['last_name'] = 'Dela Cruz';
                $next_leader_info['mobile_number'] = '09251234567';
                $next_leader_info['home_addr_city'] = 'San Fernando';
                $next_leader_info['home_addr_province'] = 'Pampanga';
            }

            $result['next_leader_info'] = $next_leader_info;
            $result['my_info'] = $my_info;
            $result['isLevelPaid'] = $isLevelPaid;

            return $result;
    }

    public function postRequestForUpgradeAction(Request $request) {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $em = $this->getDoctrine()->getManager();
        $memberId = '1';
        $memberId = str_pad($memberId, 8, '0', STR_PAD_LEFT);

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
        $memberId = str_pad($data['member_id'], 8, '0', STR_PAD_LEFT);

        //FIND myInfo
        $myInfo = $em->getRepository('CornershortMLMappBundle:User')->findBy(
            array(
                'memberId' => $memberId
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
                $data['is_level_requested'] = '1';
                $data['date_level_upgraded'] = date('Y-m-d H:i:s');
                $data['is_level_paid'] = '1';
                $data['date_product_upgraded'] = date('Y-m-d H:i:s');
                $data['is_product_paid'] = '1';
                $data['date_completed'] = date('Y-m-d H:i:s');
                $data['status'] = 'upgraded';

                $saved_record = $SQLHelper->insertRecord('member_payment_history', $data);

                $this->updateUser($memberId);
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

    //ADMINT TOOLS - UPGRADE MEMBER
    private function updateUser($id) {

        $SQLHelper = $this->get('cornershort_sql_helper.api');

        //FIND memberInfo
        $params = array('memberId' => $id);
        $sql = "SELECT id, member_id, next_leader_id, activation_level FROM users WHERE member_id=:memberId";
        $memberInfo = $SQLHelper->fetchRow($sql, $params);

        //FIND nextNextLeaderId
        $params = array('nextLeaderId' => $memberInfo['next_leader_id']);
        $sql = "SELECT leader_id FROM users WHERE member_id=:nextLeaderId";
        $nextNext = $SQLHelper->fetchRow($sql, $params);

        //UPDATE nextNextLeaderId and activationLevel
        $memberInfo['next_leader_id'] = $nextNext['leader_id'];
        $memberInfo['activation_level'] = $memberInfo['activation_level'] + 1;

        $saved_record = $SQLHelper->updateRecord('users', $memberInfo);

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
        $memberId = str_pad($data['member_id'], 8, '0', STR_PAD_LEFT);

        //FIND memberInfo
        $memberInfo = $em->getRepository('CornershortMLMappBundle:User')->findBy(
            array(
                'memberId' => $memberId
            )
        );

        //FIND memberInfos
        $params = array();
        $sql = "SELECT u.id as u_id, u.leader_id, u.member_id, u.first_name, u.last_name, u.mobile_number, u.acct_exp_date, u.activation_level, u.status, mph.id as mph_id FROM users as u
                	JOIN member_payment_history as mph
                    ON mph.member_id=u.member_id
                	WHERE u.member_id
                	  IN(SELECT mph.member_id
                	      FROM member_payment_history
                	      WHERE mph.leader_id = '" . $memberId . "'
                	      AND mph.is_level_paid = 0
                	      AND mph.is_level_requested = 1
                    )";
        $memberInfos = $SQLHelper->fetchRows($sql, $params);

        $result['memberInfo'] = $memberInfo;
        $result['memberInfos'] = $memberInfos;

        return $result;
    }

    //STATEMENT
    public function postSearchMemberPaymentAction(Request $request) {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $em = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);
        $leaderId = $this->getUser()->getMemberId();

        $year = $data['year'];
        $month = $data['month'];
        $day = '01';

        $nowMonth = $year . '-' . $month . '-' . $day;
        $nextMonth = date("Y-m-d", strtotime("1 month", strtotime(date($nowMonth))));

        $params = array('nowMonth' => $nowMonth, 'nextMonth' => $nextMonth, 'leaderId' => $leaderId);
        $sql = "SELECT SUM(level_amount) as total FROM member_payment_history WHERE leader_id=:leaderId AND date_completed >= :nowMonth AND date_completed < :nextMonth ";
        $statement = $SQLHelper->fetchRows($sql, $params);

        $params = array('nowMonth' => $nowMonth, 'nextMonth' => $nextMonth, 'leaderId' => $leaderId);
        $sql = "SELECT u.member_id, u.last_name, u.first_name, mph.level_amount, mph.activation_level, mph.date_completed
                        FROM member_payment_history as mph
                        JOIN users as u
                        ON u.member_id = mph.member_id
                        WHERE mph.leader_id=:leaderId
                        AND mph.date_completed >= :nowMonth
                        AND mph.date_completed < :nextMonth ";
        $memberPayments = $SQLHelper->fetchRows($sql, $params);

        $result['statement'] = $statement;
        $result['memberPayment'] = $memberPayments;

        return $result;
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
