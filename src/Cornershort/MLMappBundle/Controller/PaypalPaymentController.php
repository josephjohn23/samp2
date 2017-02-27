<?php

namespace Cornershort\MLMappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaypalPaymentController extends Controller {

    public function paymentProcessAction($order){
        $config = [
            'paypal_express_checkout' => [
                'return_url' => $this->generateUrl('app_orders_paymentcreate', [
                    'id' => $order->getId(),
                ], UrlGeneratorInterface::ABSOLUTE_URL),
                'cancel_url' => $this->generateUrl('app_orders_paymentcancel', [
                    'id' => $order->getId(),
                ], UrlGeneratorInterface::ABSOLUTE_URL),
                'notify_url' => $this->generateUrl('app_orders_ipn', [
                    'id' => $order->getId(),
                ], UrlGeneratorInterface::ABSOLUTE_URL),
            ],
        ];
    }

}
