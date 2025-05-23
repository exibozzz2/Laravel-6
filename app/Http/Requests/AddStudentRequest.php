<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'string|required|min:2',
            'grade' => 'int|required|min:1|max:5',
            'professor' => 'string|required'
        ];
    }
}


