<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('news');

        return [
            'title' => "required|max:255|min:5|unique:news,title,{$id},id,deleted_at,NULL",
            'description' => 'required|max:1000|min:10',
            'image' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Please select an image.'
        ];
    }
}
