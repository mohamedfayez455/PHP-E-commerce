<?php

namespace Modules\Admins\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'      => 'required|string',
            'email'     => 'required|email',
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
