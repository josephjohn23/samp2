<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserAccountWebController extends Controller
{
    public function showAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');

        $myId = '004';
        $params = array('myId' => $myId);
        $sql = "SELECT * FROM users WHERE member_id=:myId";
        $member_info = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:UserAccount:show.html.php', array('member_info' => $member_info[0]));
    }

    public function editAction(){
        return $this->render('CornershortMLMappBundle:UserAccount:edit.html.php');
    }
}
