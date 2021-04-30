<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'number' => 'required|numeric',
            'category' => 'required',
            'descrition' => 'required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'A categoria tem que ser definida',
            'name.required' => 'O campo nome é de preenchimento obrigatório',
            'number.numeric' => 'precisar ser apenas numeros',
            'number.required' => 'O campo número é de preenchimento obrigatório',
            'descrition.required' => 'A Descrição é obrigatória',
        ];
    }
}
