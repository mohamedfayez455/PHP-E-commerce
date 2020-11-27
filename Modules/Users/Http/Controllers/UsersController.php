<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Users\Entities\User;
use Modules\Users\Http\Requests\Store;
use Image;


class UsersController extends Controller
{

    public function get_login()
    {
        return view('users::login.login');
    }



    public function post_login()
    {
        if (auth()->guard('user')->attempt( ['email' => \request('email') , 'password'=> \request('password')   ] ))
        {
//            return redirect()->route('home');
            return redirect('/front/home');
        }
        else
        {
            return redirect('/front/login');
        }
    }

    public function logout()
    {
        auth()->guard('user')->logout();
        return redirect('/front/login');
    }


    public function get_register()
    {
        return view('users::login.register');
    }


    public function post_register(Store $request)
    {
        $data = $request->except('_token' ,'password' , 'photo');

        $data['password'] = bcrypt(\request('password'));

        if ($request->photo) {
            Image::make($request->photo)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/users/' . $request->photo->hashName()));
            $data['photo'] = $request->photo->hashName();
        }

        $user = User::create($data);
        auth('user')->login($user);

        session('success' , ' user added successfully');
        return redirect()->route('home');
    }








    public function home()
    {
        return view('front::index');
    }

    public function index()
    {
        return view('users::index');
    }


    public function create()
    {
        return view('users::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('users::show');
    }


    public function edit($id)
    {
        return view('users::edit');
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
