<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserAccountWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:UserAccount:index.html.php');
    }
}
