<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminToolsWebController extends Controller
{
    public function memberInfoShowAction(){
        return $this->render('CornershortMLMappBundle:AdminTools:member_info_show.html.php');
    }

    public function memberPaymentHistoryShowAction(){
        return $this->render('CornershortMLMappBundle:AdminTools:member_payment_history_show.html.php');
    }

    public function upgradeMemberManualShowAction(){
        return $this->render('CornershortMLMappBundle:AdminTools:upgrade_member_manual_show.html.php');
    }
}
