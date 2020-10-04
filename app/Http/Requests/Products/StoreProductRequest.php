<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',
            'categorie_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.unique' => 'Já ah um produto com esse nome!',
            'description.required' => 'A descrição é obrigatória!',
            'price.required' => 'O preço é obrigatório!',
            'categorie_id.required' => 'A categoria é obrigatória!',
        ];
    }
}
