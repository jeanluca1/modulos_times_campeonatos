<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArbritosRequest extends FormRequest
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
        'inNome'=>'required',
        'inCpf'=>'required|unique:arbitro,cpf',
    
        ];
    }

    public function messages()
    {
        return [
            'inNome.required' => 'O campo Nome é obrigatório!',
            'inCpf.required' => 'O campo CPF é obrigatório!',
            'inCpf.unique' => 'Esse CPF ja esta sedo usado!',
        ];
    }
}
