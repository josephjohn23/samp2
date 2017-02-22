<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddNewMemberWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:AddNewMember:index.html.php');
    }
}
