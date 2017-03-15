<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cornershort\MLMappBundle\Entity\User;

class RegisterMemberWebController extends Controller
{
    public function showAction(){
        $em = $this->getDoctrine()->getManager();
        $memberId = $this->getUser()->getMemberId();
        $memberName = $this->getUser()->getFirstName();

        //FIND memberInfo
        $memberInfos = $em->getRepository('CornershortMLMappBundle:User')->findBy(
            array(
                'leaderId' => $memberId
            )
        );

        return $this->render('CornershortMLMappBundle:RegisterMember:show.html.php',
            array(
                'memberInfos' => $memberInfos
            )
        );
    }

    public function addAction(){
        $memberId = $this->getUser()->getMemberId();
        $memberName = $this->getUser()->getFirstName() . ' ' . $this->getUser()->getLastName();

        return $this->render('CornershortMLMappBundle:RegisterMember:add.html.php',
            array(
                'memberId' => $memberId,
                'memberName' => $memberName
            )
        );
    }
}
