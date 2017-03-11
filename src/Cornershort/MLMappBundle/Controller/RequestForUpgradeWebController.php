<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RequestForUpgradeWebController extends Controller
{
    public function autoAction(){
        return $this->render('CornershortMLMappBundle:RequestForUpgrade:auto.html.php');
    }

    public function manualAction(){
        return $this->render('CornershortMLMappBundle:RequestForUpgrade:manual.html.php');
    }
}
