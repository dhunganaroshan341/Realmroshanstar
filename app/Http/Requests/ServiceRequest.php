<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:3',
            'short_desc'=>'required',
            'image'=>$this->route('id') ? 'nullable|image' :'required|image',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Please Enter the Name',
            'name.min'=>'Name must be at least 3 character long',
            'short_desc.required'=>'Please Enter the short description',
            'image.required'=>'Please Insert the image',
            'image.image'=>'Image must be a type of jpg,png,jpeg'
        ];
    }
}
