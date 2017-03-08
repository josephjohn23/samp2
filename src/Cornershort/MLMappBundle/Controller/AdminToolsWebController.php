<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminToolsWebController extends Controller
{
    public function memberInfoShowAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');

        $my_id = '004';
        $params = array('my_id' => $my_id);
        $sql = "SELECT * FROM users";
        $member_infos = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:AdminTools:member_info_show.html.php',
            array(
                'member_infos' => $member_infos
            )
        );
    }

    public function memberPaymentHistoryShowAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');

        $my_id = '004';
        $params = array('my_id' => $my_id);
        $sql = "SELECT * FROM member_payment_history";
        $member_histories = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:AdminTools:member_payment_history_show.html.php',
            array(
                'member_histories' => $member_histories
            )
        );
    }

    public function upgradeMemberManualShowAction(){
        return $this->render('CornershortMLMappBundle:AdminTools:upgrade_member_manual_show.html.php');
    }
}
