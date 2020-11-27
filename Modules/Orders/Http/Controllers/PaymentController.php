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

class PaymentController extends Controller
{

    protected $apiContext;

    public function __construct()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
               'ATF34qNs2zdwuaDSAINrIfLDwdKh7BEbhU-SK9RFqrYpgvTxpNypUpBgcnP-itEmaqWayoEVh0l5SCpA',     // ClientID
               'EBdEbWG86MmNBE4pfHreJrTGCF0qsOZsCzcAacPGWZvccjtWADVeTnbqLnxA1KhW1GoPAmtUvuhuhxta'   // ClientSecret
            )
        );
    }



//    public function index()
//    {
//        return view('orders::orders.checkout');
//    }
//    public function create()
//    {
//        return view('orders::create');
//    }
//    public function store(Request $request)
//    {
//        //
//    }
//    public function show($id)
//    {
//        return view('orders::show');
//    }
//    public function edit($id)
//    {
//        return view('orders::edit');
//    }
//    public function update(Request $request, $id)
//    {
//        //
//    }
//    public function destroy($id)
//    {
//        //
//    }
}
