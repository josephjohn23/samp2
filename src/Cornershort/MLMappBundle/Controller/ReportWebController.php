<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:Report:index.html.php');
    }
}
