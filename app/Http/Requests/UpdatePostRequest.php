<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'=>'required|max:255',
            'desc'=> 'required',
            'file'=> 'required|mimes:jpeg,jpg,bmp,png,svg|max:4096',
        ];
    }

    public function messages(){
        return [
            'title'=>'A title is requirted',
            'desc'=> 'A description is required',
            'file'=> 'A file is required and max 4 Mb',
        ] ;
    }
}
