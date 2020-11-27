<?php

namespace Modules\Orders\Http\Controllers;

use Cart;
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

class createPaymentController extends PaymentController
{


    public  function create()
    {

        $products = [];

        foreach (Cart::content() as $product) {

            $item = new Item();
            $item->setName($product->name)
                ->setCurrency('USD')
                ->setQuantity($product->qty)
                ->setSku($product->id) // Similar to `item_number` in Classic API
                ->setPrice($product->price);

            array_push($products, $item);

        }

        $itemList = new ItemList();
        $itemList->setItems($products);
        $payment = self::Payment(
            self::payer(),
            self::RedirectUrls(),
            self::Transaction(self::Amount(self::Details()), $itemList)
        );
        $payment->create($this->apiContext);
        return redirect( $payment->getApprovalLink());
    }

    /**
     * @return Payer
     */
    protected static function Payer(): Payer
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        return $payer;
    }

    /**
     * @return Details
     */
    protected static function Details(): Details
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
    protected static function Amount(Details $details): Amount
    {
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal( str_replace( ',' , '' , Cart::total()))
            ->setDetails($details)  ;
        return $amount;
    }

    /**
     * @param Amount $amount
     * @param ItemList $itemList
     * @return Transaction
     */
    protected static function Transaction(Amount $amount, ItemList $itemList): Transaction
    {
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
        return $transaction;
    }

    /**
     * @return RedirectUrls
     */
    protected static function RedirectUrls(): RedirectUrls
    {
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(config('services.paypal.url.redirect'))
            ->setCancelUrl(config('services.paypal.url.cancel'));
        return $redirectUrls;
    }

    /**
     * @param Payer $payer
     * @param RedirectUrls $redirectUrls
     * @param Transaction $transaction
     * @return Payment
     */
    protected static function Payment(Payer $payer, RedirectUrls $redirectUrls, Transaction $transaction): Payment
    {
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        return $payment;
    }


}
