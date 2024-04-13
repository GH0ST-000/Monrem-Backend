<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'description'=>'required',
            'header'=>'required',
            'images'=>'required',
            'subheader'=>'required',
            'status'=>'sometimes',
        ];
    }
}
