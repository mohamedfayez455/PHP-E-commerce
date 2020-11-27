<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Carbon;
use Cart;
use Modules\Orders\Entities\Order;
use Modules\Orders\Entities\ProductOrder;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders::index');
    }

    public function create()
    {
        return view('orders::create');
    }



    public function store(Request $request)
    {
        $data= $request->except('_token');
//        dd($data);
        $order =  Order::create($data);

        foreach(Cart::content() as  $item):

//            dd($item->qty);

            $product = $item->model;
            $order->products()->attach($product , ['quantity' => $item->qty]);

        endforeach;

        Cart::destroy();

        session('success' , 'order send successfully');

           return view('orders::orders.save');

    }




    public function show($id)
    {
        return view('orders::show');
    }

    public function edit($id)
    {
        return view('orders::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $order =  Order::findOrFail($id);

        $order->products()->detach($order->products);

        $order->delete();
        return redirect('/front/home');
    }
}
