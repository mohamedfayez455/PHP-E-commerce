<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Orders\Entities\Order;

class AdminOrderController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::all();
        return view('orders::admin_orders.index' , compact('orders'));
    }

    public function order_show($id)
    {
        $order = Order::find($id);
        return view('orders::admin_orders.edit' , compact('order'));
    }

    public function order_edit($id)
    {
        $order = Order::find($id);
        return view('orders::admin_orders.update_state' , compact('order'));
    }


      public function order_update(Request $request,$id)
      {

          $state  = $request->state;

          Order::where($id , $request->id)->update([
             'state' => $state,
          ]);

          return redirect()->route('orders.index')->with('success' , 'state updated successfully');

      }

    public function status($id)
    {

        if (\request()->ajax()){

            $order = Order::findOrFail($id);

            $order->update(['state' => \request('state')]);

            return 'done';
        }

    }


    public function destroy($id)
    {
        $order =  Order::findOrFail($id);

        $order->products()->detach($order->products);

        $order->delete();
        return redirect('/admin/orders')->with('success' , 'order deleted successfully');
    }





    public function create()
    {
        return view('orders::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('orders::show');
    }


//    public function edit($id)
//    {
//        $order = Order::find($id);
//        return view('orders::admin_orders.edit' , compact('order'));
//    }


    public function update(Request $request, $id)
    {
        //
    }


}
