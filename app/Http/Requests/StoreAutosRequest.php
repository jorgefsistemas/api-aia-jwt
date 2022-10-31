<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required',
            'precio' => 'required',
            'kilometraje' => 'required',
            'color' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fotografia' => 'required|min:1'
            

        ];
    }
    public function messages()
    {
        return [
            'marca' => 'Revisar marca, es requerido',
            'modelo' => 'Revisar modelo, es requerido',
            'anio' => 'Revisar anio, es requerido',
            'precio' => 'Revisar precio, es requerido',
            'kilometraje' => 'Revisar kilometraje, es requerido',
            'color' => 'Revisar color, es requerido',
            'email' => 'Revisar email, es requerido',
            'telefono' => 'Revisar telefono, es requerido',
            'fotografia' => 'Revisar fotografia, es requerido',
            


        ];
    }
}
