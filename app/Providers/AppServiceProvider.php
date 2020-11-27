<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Products\Entities\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength('191');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
        {
            $departments = \Modules\Departments\Entities\Department::all();
//            $search_products = Product::when(request('search') , function ($q)
//            {
//                return $q->where('name'  ,'like' ,'%'.request('search')->search.'%');
//            })->latest()->paginate(5);
//
//            return $view->with(['departments' => $departments , 'search_products' =>$search_products]);

            return $view->with(['departments' => $departments ]);
        });
    }
}
