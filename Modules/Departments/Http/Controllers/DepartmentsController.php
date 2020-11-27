<?php

namespace Modules\Departments\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Departments\Entities\Department;
use Modules\Departments\Http\Requests\Store;
use  Image;

class DepartmentsController extends Controller
{

    public function index()
    {
        return view('departments::department.index');
    }


    public function create()
    {
        return view('departments::department.create');
    }


    public function store(Store $request)
    {
        $data = $request->all();
        if ($request->photo) {
            Image::make($request->photo)->resize(300, null, function ($constraint) {$constraint->aspectRatio();
                })->save(public_path('uploads/departments/' . $request->photo->hashName()));
            $data['photo'] = $request->photo->hashName();
        }
        Department::create($data);
        session('success' , 'department Add Successfully');
        return redirect()->route('departments.index');
    }


    public function show($id)
    {
        return view('departments::show');
    }


    public function edit($id)
    {
        $department  = Department::find($id);
        return view('departments::department.edit' ,compact('department'));
    }


    public function update(Store $request, $id)
    {
        $department = Department::find($id);
        $data = $request->except('_token' , '_method');
        if ($request->photo) {
            if ($department->photo != 'default.png') {
                Storage::disk('public_uploads')->delete('/departments/' . $department->photo);
            }
            Image::make($request->photo)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/departments/' . $request->photo->hashName()));
            $data['photo'] = $request->photo->hashName();
        }
        Department::where('id' ,$id)->update($data);
        session('success' , 'department updated Successfully');
        return redirect()->route('departments.index');

    }

    public function delete_parent($id)
    {
        $parents = Department::where('parent_id' , $id)->get();
        foreach ($parents as $sub)
        {
            self::delete_parent($sub->id);
            if ($sub->photo)
            {
                Storage::disk('public_uploads')->delete('/departments/'.$sub->photo);
            }
             $sub_department =  Department::find($sub->id);

            if(!empty($sub_department)){
                $sub_department->delete();
            }
        }
        $department = Department::find($id);
        if($department->photo)
        {
            Storage::disk('public_uploads')->delete('/departments/'.$department->photo);
        }
        $department->delete();
    }


    public function destroy($id)
    {
        self::delete_parent($id);
        session('success' , 'department deleted successfully');
        return redirect()->route('departments.index');
    }

}
