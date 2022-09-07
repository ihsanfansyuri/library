<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validasi extends FormRequest
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
        return [
            'name' => 'required|unique:books,name,' . $this->id,
            'author' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama sudah ada',
            'author.required' => 'Author wajib diisi',
            'category_id.required' => 'silahkan pilih category',
        ];
    }
}
