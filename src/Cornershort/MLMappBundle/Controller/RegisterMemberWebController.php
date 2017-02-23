<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegisterMemberWebController extends Controller
{
    public function showAction(){
        return $this->render('CornershortMLMappBundle:RegisterMember:show.html.php');
    }

    public function addAction(){
        return $this->render('CornershortMLMappBundle:RegisterMember:add.html.php');
    }
}
