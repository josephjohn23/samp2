<?php

namespace CornerShortBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CornerShortBundle:Default:index.html.twig');
    }
}
