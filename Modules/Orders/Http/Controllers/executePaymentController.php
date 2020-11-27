<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Cart;

class executePaymentController extends PaymentController
{


    public function execute()
    {
        $payment = $this->getPayment();

        $this->createExecution()->addTransaction($this->Transaction());

        $result = $payment->execute($this->createExecution(), $this->apiContext);

        return $result;
    }

    /**
     * @return Payment
     */
    protected function getPayment(): Payment
    {
        $paymentId = \request('paymentId');
        $payment = Payment::get($paymentId, $this->apiContext);
        return $payment;
    }

    /**
     * @return PaymentExecution
     */
    protected function createExecution(): PaymentExecution
    {
        $execution = new PaymentExecution();
        $execution->setPayerId(\request('payerId'));
        return $execution;
    }

    /**
     * @return Details
     */
    protected function Details(): Details
    {
        $details = new Details();
        $details->setShipping(0)
            ->setTax(Cart::tax())
            ->setSubtotal( str_replace(',' , '' ,Cart::subtotal() ) );
        return $details;
    }

    /**
     * @param Details $details
     * @return Amount
     */
    protected function Amount(): Amount
    {
        $amount = new Amount();
        $amount->setCurrency('USD');
        $amount->setTotal( str_replace(',' , '' ,Cart::total() ));
        $amount->setDetails($this->Details());
        return $amount;
    }

    /**
     * @param Amount $amount
     * @return Transaction
     */
    protected function Transaction(): Transaction
    {
        $transaction = new Transaction();
        $transaction->setAmount($this->Amount());
        return $transaction;
    }

}
