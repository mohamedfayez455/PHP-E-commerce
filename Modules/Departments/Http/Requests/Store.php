<?php

namespace Modules\Departments\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{

    public function rules()
    {
        return [
            'name'      => 'required',
            'desc'      => 'sometimes|nullable',
            'photo'     => 'sometimes|nullable|image',
            'parent_id' => 'sometimes|nullable',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
