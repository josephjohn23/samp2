<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UpgradeMemberWebController extends Controller
{
    public function manualAction(){
        return $this->render('CornershortMLMappBundle:UpgradeMember:manual.html.php');
    }
}
