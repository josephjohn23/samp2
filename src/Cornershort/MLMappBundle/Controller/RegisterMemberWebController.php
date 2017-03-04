<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegisterMemberWebController extends Controller
{
    public function showAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');

        $my_id = '004';
        $params = array('my_id' => $my_id);
        $sql = "SELECT * FROM users WHERE leaders_id=:my_id";
        $member_infos = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:RegisterMember:show.html.php', array('member_infos' => $member_infos));
    }

    public function addAction(){
        return $this->render('CornershortMLMappBundle:RegisterMember:add.html.php');
    }
}
