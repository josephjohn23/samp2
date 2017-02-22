<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:Home:index.html.php');
    }
}
