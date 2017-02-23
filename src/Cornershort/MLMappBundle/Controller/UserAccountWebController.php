<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserAccountWebController extends Controller
{
    public function showAction(){
        return $this->render('CornershortMLMappBundle:UserAccount:show.html.php');
    }

    public function editAction(){
        return $this->render('CornershortMLMappBundle:UserAccount:edit.html.php');
    }
}
