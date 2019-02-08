<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
      if ($this-> isMethod('post')){
        return [
          'nome' => 'required|string',
          'cpf' => 'cpf',
          'id_Departamento' => 'required|integer|min:0',
          'email' => 'required|email'
        ];
      }

            //
    }
    public function messages(){
        return [
            'nome.alpha' => 'O nome deve consistir apenas de caracteres alfabéticos.',
            'email.email' => 'Insira um email válido',
            'email.unique' => 'Este email já existe'
              ];
}
