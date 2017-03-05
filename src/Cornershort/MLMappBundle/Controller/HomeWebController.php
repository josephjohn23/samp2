<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeWebController extends Controller
{
    public function indexAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');

        $my_id = '004';
        //FIND MY INFO
        $params = array('my_id' => $my_id,);
        $sql = "SELECT * FROM users WHERE member_id=:my_id ";
        $my_info = $SQLHelper->fetchRow($sql, $params);

        //FIND MEMBER'S PAYMENT HISTORY
        $params = array('my_id' => $my_id,);
        $sql = "SELECT * FROM member_payment_history WHERE leader_id='".$my_id."' AND is_level_paid='0' ";
        $member_infos = $SQLHelper->fetchRows($sql, $params);

        //FIND NEXT LEADER ID
        $sql = "SELECT next_leader_id, activation_level FROM users WHERE member_id=:my_id";
        $next_leader_info = $SQLHelper->fetchRow($sql, $params);

        //FIND NEXT LEADER INFO
        $params = array('next_leader_id' => $next_leader_info['next_leader_id'],);
        $sql = "SELECT * FROM users WHERE member_id=:next_leader_id";
        $next_leader_info = $SQLHelper->fetchRow($sql, $params);

            $next_leader_info['member_id'] = (is_null($next_leader_info) ? 0 : '001');
            $next_leader_info['first_name'] = (is_null($next_leader_info) ? 0 : 'Juan');
            $next_leader_info['last_name'] = (is_null($next_leader_info) ? 0 : 'Dela Cruz');
            $next_leader_info['mobile_number'] = (is_null($next_leader_info) ? 0 : '09251234567');
            $next_leader_info['home_addr_city'] = (is_null($next_leader_info) ? 0 : 'San Fernando');
            $next_leader_info['home_addr_province'] = (is_null($next_leader_info) ? 0 : 'Pampanga');

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

        return $this->render('CornershortMLMappBundle:Home:index.html.php',
            array(
                    'member_infos' => $member_infos,
                    'next_leader_info' => $next_leader_info,
                    'total_cash_earnings' => $total_cash_earnings,
                    'total_card_earnings' => $total_card_earnings,
                    'my_info_level' => $my_info['activation_level']
                )
            );
    }
}
