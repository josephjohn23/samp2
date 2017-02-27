<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserManagementWebController extends Controller
{
    public function showAction(){
        return $this->render('CornershortMLMappBundle:UserManagement:show.html.php');
    }

    public function addAction(){
        return $this->render('CornershortMLMappBundle:UserManagement:add.html.php');
    }
}
