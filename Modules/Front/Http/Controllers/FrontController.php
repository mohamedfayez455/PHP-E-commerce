<?php

namespace Modules\Front\Http\Controllers;

use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Departments\Entities\Department;
use Modules\Products\Entities\Product;
use Modules\Products\Entities\Product_Photo;
use Modules\Products\Entities\Review;
use Modules\Users\Entities\User;

class FrontController extends Controller
{




    public function home()
    {
//        resolve('Gloudemans\Shoppingcart\Cart')->destroy();
        $products = Product::take(3)->get();
        $products2 = Product::take(6)->get();
        $all_departments = Department::all();
        $departmentss = Department::limit(3)->get();
        $top_product = Product::withCount('orders')->orderBy('orders_count' , 'asc')->limit(6)->get();

        return view('front::index' ,compact( 'products' , 'products2'  , 'all_departments' , 'top_product' , 'departmentss'));
    }


    public function stores()
    {
        $departments = Department::all();
        $products = Product::paginate(6);
        $top_product = Product::withCount('orders')->orderBy('orders_count' , 'asc')->limit(4)->get();
        return view('front::front.store' ,compact('departments' , 'products' , 'top_product') );
    }


    public function profile($id)
    {
        $user = User::find($id);
        return view('front::front.profile' , compact('user') );
    }


    public function product($id)
    {
        $products = Product::findOrFail($id);
        $product_photo =   Product_Photo::where('product_id' , $products->id)->get();
        $product = Product::where('department_id' ,$products->department->id)->take(4)->get();
        $reviews = Review::where('product_id' , $id)->paginate(3);
        return view('front::front.product' ,compact('products' , 'product_photo'  , 'product' , 'reviews' ));
    }



    public function department($id)
    {
        $department = Department::whereId($id)->with('products')->first();
        $products = $department->products()->paginate(3);

        $top_product = Product::withCount('orders')->orderBy('orders_count' , 'asc')->limit(6)->get();


        return view('front::front.department' ,compact('products','department' , 'top_product' ));
    }




    public function search(Request $request)
    {
//        dd($request->product);
        if ($request->product == null)
        {
            return redirect('/front/home');
        }

        $products = Product::when($request->product , function ($q) use ($request)
        {
            return $q->where('name'  ,'like' ,'%'.$request->product.'%');

        })->latest()->paginate(6);


        $top_product = Product::withCount('orders')->orderBy('orders_count' , 'asc')->limit(4)->get();

        return view('front::front.search' ,compact('products' ,'top_product' ));
    }



    public function create()
    {
        return view('front::create');
    }

    public function store(Request $request)
    {
        //
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
        //
    }
}
