<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{

    public function rules()
    {
        return [
            'name'          => 'required',
            'desc'          => 'sometimes|nullable',
            'price'         => 'required',
            'size'          => 'required',
            'color'         => 'sometimes|nullable',
//            'photo'         => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'photo'         => '',
            'photos'        => '',
            'state'         => 'required',
            'department_id' => 'required',
        ];
    }


    public function authorize()
    {
        return true;
    }
}
