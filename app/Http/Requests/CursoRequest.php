<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Curso;

class CursoRequest extends FormRequest
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
            'codigo' => 'required|numeric|min:0',
            'id_Departamento' => 'required|integer|min:0',
            'email' => 'required|email'
          ];
        }
          if ($this-> isMethod('put')){
            return [
              'nome' => 'string',
              'codigo' => 'numeric|min:0',
              'id_Departamento' => 'integer|min:0'
          ];
        }

      }

          public function messages(){
              return [
                  'nome.alpha' => 'O nome deve consistir apenas de caracteres alfabéticos.',
                  'email.email' => 'Insira um email válido',
                  'email.unique' => 'Este email já existe'
                    ];
              }
          protected function failedValidation(Validator $validator){
              throw new
                HttpResponseException(response()->json($validator->errors(),
                  422));
          }


}
