<?php

namespace Modules\Admins\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admins\Entities\Admin;
use Modules\Admins\Http\Requests\CreateRequest;
use Modules\Admins\Http\Requests\UpdateRequest;
use Image;

use Illuminate\Support\Facades\Storage;

class AdminsController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::when($request->search , function ($q) use ($request)
        {
            return $q->where('name'  ,'like' ,'%'.$request->search.'%');
        })->latest()->paginate(5);

        return view('admins::admin.index' , compact('admins'));
    }

    public function create()
    {
        return view('admins::admin.create');
    }


    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt(\request('password'));
        if ($request->photo) {
            Image::make($request->photo)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/admins/' . $request->photo->hashName()));
            $data['photo'] = $request->photo->hashName();
        }
        Admin::create($data);
        session()->flash('success' , 'Admin added successfully');
//        ('success' , 'added successfully');
//        session('success' , 'added successfully');
        return redirect()->route('admins.index');
    }


    public function show($id)
    {
        return view('admins::admin.index');
    }


    public function edit($id)
    {
        $admin = Admin::findOrFail( $id );
        return view('admins::admin.edit' , compact('admin'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $admin = Admin::find($id);
        $data = $request->except('_token' , '_method' , 'password');
        if(\request('password')){
            $data['password'] = bcrypt($request->password);
        }else{
            unset($data['password']);
        }

        if ($request->photo) {
            if ($admin->photo != 'default.png') {
                Storage::disk('public_uploads')->delete('/admins/' . $admin->photo);
            }
            Image::make($request->photo)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/admins/' . $request->photo->hashName()));
            $data['photo'] = $request->photo->hashName();
        }

        Admin::where('id' , $id)->update($data);
        session('success' , 'updated successfully');
        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
       $admin=  Admin::findOrFail($id);
       if ($admin->photo != 'default.png')
       {
           Storage::disk('public_uploads')->delete('/admins/'.$admin->photo  );
       }
       $admin->delete();
        session('success' , 'updated successfully');
        return redirect()->route('admins.index');
    }
}
