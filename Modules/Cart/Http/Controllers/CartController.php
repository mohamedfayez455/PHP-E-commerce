<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Cart;
use Modules\Products\Entities\Product;

class CartController extends Controller
{

    public function index()
    {
        return view('cart::cart.cart');
    }


    public function create()
    {
        return view('front::create');
    }


    public function store(Request $request)
    {
        $duplicate = Cart::search(function ($cartItem , $rowId) use ($request){
            return  $cartItem->id === $request->id;
        });

        if ($duplicate->isNotEmpty())
        {
            return redirect()->back()->with('success' , 'the item is already in your card');
        }

        if ($request->quantity > 0 )
        {
            $quantity = $request->quantity;
        }
        else
        {
            $quantity = 1 ;
        }


//        Cart::add($request->id , $request->name , 1 ,  $request->price)->associate('Modules\Products\Entities\Product');
        Cart::add($request->id , $request->name , $quantity ,  $request->price)
            ->associate('Modules\Products\Entities\Product');
        return redirect()->back()->with('success' , 'added successfully');
    }


    public function show($id)
    {
        return view('front::show');
    }


    public function edit($id)
    {
        return view('front::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success', 'deleted successfully');
    }



    public function switchToSaveForLater($id)
    {
        $item = Cart::instance()->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        })->first();

        if ($item){
            Cart::remove($item->rowId);
        }

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return back()->with('success', 'Item is already Saved For Later!');
        }

        $item = Product::find($id);

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('Modules\Products\Entities\Product');


        return back()->with('success', 'Item has been Saved For Later!');
    }

}
