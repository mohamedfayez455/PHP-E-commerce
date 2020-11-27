<?php

namespace Modules\Admins\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admins\Entities\Admin;
use Modules\Departments\Entities\Department;
use Modules\Orders\Entities\Order;
use Modules\Products\Entities\Product;

class AdminLoginController extends Controller
{

    public function get_login(){
       return view('admins::login.login');
    }


    public function post_login()
    {
        if (auth()->guard('admin')->attempt( ['email' => \request('email') , 'password'=> \request('password')   ] ))
        {
//            return redirect()->route('home');
            return redirect('/admin/home');
        }
        else
        {
            return redirect('/admin/login');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }



    public function home()
    {
        $admins = Admin::all();
        $products = Product::all();
        $departments = Department::all();
        $orders = Order::all();
        return view('admins::index' , compact('admins' , 'products' , 'departments' ,'orders'));
    }

}
