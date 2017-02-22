<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RequestForUpgradeWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:RequestForUpgrade:index.html.php');
    }
}
