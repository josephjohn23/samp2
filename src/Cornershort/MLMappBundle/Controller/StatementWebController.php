<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class StatementWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:Statement:index.html.php');
    }
}
