<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{

    public function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'required|unique:users,email',
            'password'  => 'required',
            'phone'     => 'sometimes|nullable',
            'photo'     => 'sometimes|nullable',
        ];
    }


    public function authorize()
    {
        return true;
    }
}
