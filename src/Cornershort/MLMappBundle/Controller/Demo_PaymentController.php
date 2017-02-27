<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use JMS\Payment\CoreBundle\Form\ChoosePaymentMethodType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Cornershort\MLMappBundle\Entity\Order;

class Demo_PaymentController extends Controller {

    private function createPayment($order){
        $instruction = $order->getPaymentInstruction();
        $pendingTransaction = $instruction->getPendingTransaction();

        if ($pendingTransaction !== null) {
            return $pendingTransaction->getPayment();
        }

        $ppc = $this->get('payment.plugin_controller');
        $amount = $instruction->getAmount() - $instruction->getDepositedAmount();

        return $ppc->createPayment($instruction->getId(), $amount);
    }

    public function newAction(){
        $membership_amount = '1500';
        $em = $this->getDoctrine()->getManager();
        $order = new Order($membership_amount);
        $em->persist($order);
        $em->flush();

        return $this->redirect($this->generateUrl('cornershort_mlmapp_demo_payment_page_show', [
            'order' => $order->getId()
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

    public function showAction(Request $request, Order $order){

        $form = $this->createForm('jms_choose_payment_method', null, [
            'amount'   => $order->getAmount(),
            'currency' => 'PHP',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ppc = $this->get('payment.plugin_controller');
            $ppc->createPaymentInstruction($instruction = $form->getData());

            $order->setPaymentInstruction($instruction);

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush($order);

            return $this->redirect($this->generateUrl('cornershort_mlmapp_demo_payment_page_create', [
                'order' => $order->getId(),
            ]));
        }

        return $this->render('CornershortMLMappBundle:Demo_Payment:view.html.twig', [
            'order' => $order,
            'form'  => $form->createView(),
        ]);
    }

    public function paymentCreateAction(Order $order){
        $payment = $this->createPayment($order);

        $ppc = $this->get('payment.plugin_controller');
        $result = $ppc->approveAndDeposit($payment->getId(), $payment->getTargetAmount());

        if ($result->getStatus() === Result::STATUS_SUCCESS) {
            return $this->redirect($this->generateUrl('cornershort_mlmapp_demo_payment_page_complete', [
                'order' => $order->getId(),
            ]));
        }

        throw $result->getPluginException();

        // In a real-world application you wouldn't throw the exception. You would,
        // for example, redirect to the showAction with a flash message informing
        // the user that the payment was not successful.
    }

}
