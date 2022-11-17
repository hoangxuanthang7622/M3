<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:blogs|max:20',
            'description' => 'required',
            'category_id' => 'required'
        ];
    }
    public function messages()
    {
        return  [
                'name.required' => 'Vui lòng không được để trống',
                'name.unique'   => 'Vui lòng không được trùng dữ liệu',
                'name.max'      => 'Vui lòng không nhập quá :max kí tự',
                'description.required' => 'Vui lòng không được để trống',
                'category_id.required' => 'Vui lòng không được để trống'
            ];
    }
}
