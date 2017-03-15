<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserAccountWebController extends Controller
{
    public function showAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $leaderId = $this->getUser()->getMemberId();

        $params = array('leaderId' => $leaderId);
        $sql = "SELECT * FROM users WHERE member_id=:leaderId";
        $member_info = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:UserAccount:show.html.php', array('member_info' => $member_info[0]));
    }

    public function editAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $leaderId = $this->getUser()->getMemberId();

        $params = array('leaderId' => $leaderId);
        $sql = "SELECT * FROM users WHERE member_id=:leaderId";
        $member_info = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:UserAccount:edit.html.php', array('member_info' => $member_info[0]));
    }
}
