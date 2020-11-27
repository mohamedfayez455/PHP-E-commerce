<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Departments\Entities\Department;
use Modules\Products\Entities\Product;
use Modules\Products\Entities\product_photo;
use Modules\Products\Http\Requests\Store;
use File;
use Image;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::when($request->search ,function ($q) use ($request){
            return $q->where('name' , 'like' , '%'.$request->search.'%');
        })->latest()->paginate(5);
        return view('products::products.index' , compact('products'));
    }


    public function create()
    {
        $departments = Department::all();
        return view('products::products.create' , compact('departments'));
    }


    public function store(Store $request)
    {
        $data= $request->except('_token' , '_method' , 'photos');

        if ($request->photo) {

//            dd($request->photo);
            Image::make($request->photo)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/products/' . $request->photo->hashName()));
            $data['photo'] = $request->photo->hashName();
        }

        $product =  Product::create($data);

        if ($request->photos)
        {
            foreach ($request->photos as $photo){
                Image::make($photo)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/products/album/' . $photo->hashName()));

                Product_Photo::create([
                   'photos'=> $photo->hashName(),
                   'product_id'=>$product->id,
                ]);
            }
        }
        session('success' , 'product created successfully');
        return redirect()->route('products.index');

    }


    public function show($id)
    {
        return view('products::products.index');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $departments = Department::all();
        return view('products::products.edit' , compact('product' , 'departments'));
    }


    public function update(Store $request, $id)
    {
        $product = Product::find($id);
        $data = $request->except('_token' , '_method' ,'photo' , 'photos');

        if ($request->photo)
        {
            if ($product->photo != 'default.png' )
            {
                Storage::disk('public_uploads')->delete('/products/'.$product->photo);
            }
            Image::make($request->photo) ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/products/'.$request->photo->hashName()));
            $data['photo'] = $request->photo->hashName();
        }

        $product->update($data);


        if ($request->photos)
        {
            foreach ($product->photos as  $photo)
            {
                File::delete(public_path().'/uploads/products/album/'.$photo->photos);
                Product_Photo::where('product_id', $id)->delete();
            }
            foreach ($request->photos as $photo){
                Image::make($photo)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/products/album/' . $photo->hashName()));

                Product_Photo::create([
                    'photos'=> $photo->hashName(),
                    'product_id'=>$product->id,
                ]);
            }
        }
        session()->flash('success','product updated  successfully');
        return redirect()->route('products.index');
    }






    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->photo != 'default.png')
        {
            Storage::disk('public_uploads')->delete('/products/'.$product->photo  );
        }

        foreach ($product->photos as  $photo) {
            if ($product->photos) {
                    File::delete(public_path().'/uploads/products/album/'.$photo->photos);
            }
        }


        $product->delete();

        session()->flash('success','product updated  successfully');
        return redirect()->route('products.index');
    }




    public function get_photo($id)
    {
        $product = Product::find($id);
        $product_photo =   Product_Photo::where('product_id' , $product->id)->get();
        return view('products::products.photo' ,compact('product_photo' , 'product') );

    }

    public function delete_photo($id)
    {
//        $product = Product::find($id);
//        dd($product);
        $product_photo =   Product_Photo::find($id);
        File::delete(public_path().'/uploads/products/album/'.$product_photo->photos);
        $product_photo->delete();
        session()->flash('success','photo deleted successfully');
        return back();
//        return redirect()->route('products.index');
//        return redirect()->route('image.index' ,$product->id);

    }

    public function create_photo(Request $request)
    {
        $data = $request->validate([
            'photos'     => 'required',
            'product_id'     => 'required',
        ]);
        if ($request->photos)
        {
            Image::make($request->photos) ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/products/album/'.$request->photos->hashName()));
            $data['photos'] = $request->photos->hashName();
            Product_Photo::create($data);
        }
        session()->flash('success','photo added successfully');
        return back();

    }



}
