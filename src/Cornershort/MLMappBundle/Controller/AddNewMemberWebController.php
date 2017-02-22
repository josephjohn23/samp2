<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddNewMemberWebController extends Controller
{
    public function listAction(){
        return $this->render('CornershortMLMappBundle:AddNewMember:list.html.php');
    }

    public function viewAction($id){
        return $this->render('CornershortMLMappBundle:AddNewMember:view.html.php');
    }
}
