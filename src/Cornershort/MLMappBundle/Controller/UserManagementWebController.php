<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserManagementWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:UserManagement:index.html.php');
    }
}
