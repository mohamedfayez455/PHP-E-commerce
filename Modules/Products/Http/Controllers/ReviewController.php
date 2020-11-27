<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Products\Entities\Review;

class ReviewController extends Controller
{

    public function index()
    {
        return view('products::index');
    }


    public function create()
    {
        return view('products::create');
    }


    public function store(Request $request)
    {
        $data = $request->except('_token' , '_method');
//dd($data);
        Review::create($data);

        return back()->with('success' , 'your review Add successfully');

    }

    public function post_store(Request $request)
    {
        dd($request->all());
    }


    public function show($id)
    {
        return view('products::show');
    }


    public function edit($id)
    {
        return view('products::edit');
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
