<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cornershort\MLMappBundle\Entity\MemberPaymentHistory;
use Cornershort\MLMappBundle\Entity\User;

class UpgradeMemberWebController extends Controller
{
    public function manualAction(){
        $SQLHelper = $this->get('cornershort_sql_helper.api');
        $em = $this->getDoctrine()->getManager();
        $memberId = '004';

        //FIND memberInfo
        $params = array();
        $sql = "SELECT * FROM users
                WHERE member_id
                    IN(SELECT member_id
                        FROM member_payment_history
                        WHERE leader_id = '" . $memberId . "'
                        AND is_level_paid = 0
                        AND is_level_requested = 1
                    )";
        $member_infos = $SQLHelper->fetchRows($sql, $params);

        return $this->render('CornershortMLMappBundle:UpgradeMember:manual.html.php',
            array(
                'member_infos' => $member_infos
            )
        );
    }
}
