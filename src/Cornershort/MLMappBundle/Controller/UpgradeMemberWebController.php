<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cornershort\MLMappBundle\Entity\MemberPaymentHistory;
use Cornershort\MLMappBundle\Entity\User;

class UpgradeMemberWebController extends Controller
{
    public function manualAction(){
        return $this->render('CornershortMLMappBundle:UpgradeMember:manual.html.php');
    }
}
