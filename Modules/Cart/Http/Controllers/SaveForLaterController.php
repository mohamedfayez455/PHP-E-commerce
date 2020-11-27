<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Cart;

class SaveForLaterController extends Controller
{

    
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success', 'Item has been removed!');
    }




    public function switchToCart($id)
    {

        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your Cart!');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
            ->associate('Modules\Products\Entities\Product');

        return redirect()->route('cart.index')->with('success', 'Item has been moved to Cart!');
    }

}
