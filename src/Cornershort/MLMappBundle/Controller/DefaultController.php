<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:Default:index.html.php');
    }

    public function sidebarMenuAction(){
        return $this->render('CornershortMLMappBundle:Layout:sidebar.html.php');
    }
}
