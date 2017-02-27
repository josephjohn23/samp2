<?php

namespace Cornershort\MLMappBundle\Controller;

use Cornershort\MLMappBundle\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use JMS\Payment\CoreBundle\Form\ChoosePaymentMethodType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class Demo_PaymentController extends Controller {

    public function newAction(){
        $membership_amount = '1500';
        $em = $this->getDoctrine()->getManager();
        $order = new Order($membership_amount);
        $em->persist($order);
        $em->flush();

        return $this->redirect($this->generateUrl('cornershort_mlmapp_demo_payment_page_show', [
            'id' => $order->getId(),
        ]));
    }

    public function viewAction(Request $request, Order $order){

        $form = $this->createForm('jms_choose_payment_method', null, [
            'amount'   => $order->getAmount(),
            'currency' => 'PHP',
            'allowed_methods' => ['paypal_express_checkout']
        ]);

        return $this->render('CornershortMLMappBundle:Demo_Payment:view.html.twig', [
            'order' => $order,
            'form'  => $form->createView(),
        ]);
    }

}
