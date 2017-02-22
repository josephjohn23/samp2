<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UpgradeMemberWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:UpgradeMember:index.html.php');
    }
}
