<?php

namespace Modules\Social\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;
use Modules\Social\Entities\Provider;
use Modules\Users\Entities\User;

class SocialController extends Controller
{


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user =  Socialite::driver($provider)->user();
        $selectprovider = Provider::where('provider_id' , $user->getId())->first();
        if (! $selectprovider )
        {
            $user_get_real  = User::where('email' , $user->getEmail())->first();
            if (! $user_get_real)
            {
                $user_get_real = new User();
                $user_get_real->name = $user->getName();
                $user_get_real->email = $user->getEmail();
                $user_get_real->save();
            }
            $new_provider = new provider();
            $new_provider->provider_id = $user->getId();
            $new_provider->provider = $provider;
            $new_provider->user_id = $user_get_real->id;
            $new_provider->save();
        }else
        {
            $user_get_real = User::find($selectprovider->user_id);
        }

        auth('user')->login($user_get_real);
        return redirect('/front/home');

//        dd($user);
    }




    public function index()
    {
        return view('social::index');
    }

    public function create()
    {
        return view('social::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('social::show');
    }


    public function edit($id)
    {
        return view('social::edit');
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
