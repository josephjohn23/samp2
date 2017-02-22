<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FamilyTreeWebController extends Controller
{
    public function indexAction(){
        return $this->render('CornershortMLMappBundle:FamilyTree:index.html.php');
    }
}
