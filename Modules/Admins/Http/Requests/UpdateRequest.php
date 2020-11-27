<?php

namespace Modules\Admins\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Admins\Entities\Admin;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'email'     => ['required', 'string', 'email', 'max:191', 'unique:admins,email,' . $this->admin ],
            'password'  => 'sometimes|nullable',
            'phone'     => 'sometimes|nullable',
            'photo'     => 'sometimes|nullable',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
