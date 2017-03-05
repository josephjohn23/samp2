<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RequestForUpgradeWebController extends Controller
{
    public function autoAction(){
        return $this->render('CornershortMLMappBundle:RequestForUpgrade:auto.html.php');
    }

    public function manualAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');

        $my_id = '005';
        //FIND MY INFO
        $params = array('my_id' => $my_id,);
        $sql = "SELECT * FROM users WHERE member_id=:my_id ";
        $my_info = $SQLHelper->fetchRow($sql, $params);

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

        return $this->render('CornershortMLMappBundle:RequestForUpgrade:manual.html.php',
            array(
                    'next_leader_info' => $next_leader_info,
                    'my_info' => $my_info
                )
        );
    }
}
