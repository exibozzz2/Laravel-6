<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddContactRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|required|min:4',
            'subject' => 'string|required|min:4|max:256',
            'message' => 'string|required|min:10|max:2000',
            'email' => 'string|required|max:256',
            'phone' => 'regex:/^0?[1-9][0-9]*$/|required',
        ];
    }
}
