<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' =>'required',
            'url' =>'required',
            'description' =>'required',
            'category_id' => ['required', 'exists:categories,id'],
            'image' => [ $this->route('project') ? 'nullable' : 'required', 'mimes:jpeg,png'] // jpeg, png, bmp, gif, svg o webp
        ];
    }


    public function messages(){
        return[
            'title.required' => 'El proyecto necesita un titulo'
        ];
    }
}
