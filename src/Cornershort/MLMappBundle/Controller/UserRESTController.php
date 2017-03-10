<?php

namespace Cornershort\MLMappBundle\Controller;

use Cornershort\MLMappBundle\Entity\User;
use Cornershort\MLMappBundle\Form\UserType;

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
 * User controller.
 * @RouteResource("User")
 */
class UserRESTController extends VoryxController
{
    public function postHomeAction(Request $request)
    {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $data = json_decode($request->getContent(), true);

        $my_id = '001';
        //FIND MY INFO
        $params = array('my_id' => $my_id,);
        $sql = "SELECT * FROM users WHERE member_id=:my_id ";
        $my_info = $SQLHelper->fetchRow($sql, $params);

        //FIND MEMBER'S PAYMENT HISTORY
        $params = array('my_id' => $my_id,);
        $sql = "SELECT * FROM member_payment_history WHERE leader_id='".$my_id."' AND is_level_paid='0' AND is_level_requested='1' ";
        $member_infos = $SQLHelper->fetchRows($sql, $params);

        //FIND NEXT LEADER ID
        $sql = "SELECT next_leader_id, activation_level FROM users WHERE member_id=:my_id";
        $next_leader_info = $SQLHelper->fetchRow($sql, $params);

        //FIND NEXT LEADER INFO
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

        //FIND TOTAL CASH EARNINGS
        $params = array('my_id' => $my_id,);
        $sql = "SELECT SUM(level_amount) FROM member_payment_history WHERE leader_id='".$my_id."' AND is_level_paid='1' AND membership_option='cash' ";
        $total_cash_earnings = $SQLHelper->fetchRow($sql, $params);
        $total_cash_earnings = (is_null($total_cash_earnings['SUM(level_amount)']) ? 0 : $total_cash_earnings['SUM(level_amount)']);

        //FIND TOTAL CARD EARNINGS
        $params = array('my_id' => $my_id,);
        $sql = "SELECT SUM(level_amount) FROM member_payment_history WHERE leader_id='".$my_id."' AND is_level_paid='1' AND membership_option='card' ";
        $total_card_earnings = $SQLHelper->fetchRow($sql, $params);
        $total_card_earnings = (is_null($total_card_earnings['SUM(level_amount)']) ? 0 : $total_card_earnings['SUM(level_amount)']);

        $result = [];
        $result['member_infos'] = $member_infos;
        // $result['member_infos'] = array('asd'=>'asd', 'dd'=>'dd');
        $result['next_leader_info'] = $next_leader_info;
        $result['total_cash_earnings'] = $total_cash_earnings;
        $result['total_card_earnings'] = $total_card_earnings;
        $result['my_info_level'] = $my_info['activation_level'];

        return $result;
    }

    /**
     * Create a User entity.
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
        $data = json_decode($request->getContent(), true);
        $saved_record = 0;

        $data['password'] = md5($data['password']);

        $params = array('email' => $data['email']);
        $sql = "SELECT * FROM users WHERE email=:email";
        $users = $SQLHelper->fetchRow($sql, $params);

        if (!($users)) {
            $saved_record = $SQLHelper->insertRecord('users', $data);
        } else {
            return "Error";
        }

        if (!$saved_record) {
            return "Error";
        } else {
            return "Success";
        }
    }

    public function postEditAccountAction(Request $request)
    {
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $data = json_decode($request->getContent(), true);
        $saved_record = 0;

        $data['password'] = md5($data['password']);

        $params = array('email' => $data['email']);
        $sql = "SELECT * FROM users WHERE email=:email";
        $users = $SQLHelper->fetchRow($sql, $params);

        if ($users) {
            $saved_record = $SQLHelper->updateRecord('users', $data);
        } else {
            return "Error";
        }

        if (!$saved_record) {
            return "Error";
        } else {
            return "Success";
        }
    }
}
