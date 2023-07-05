<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'documento_cliente' => 'numeric|unique:customers,documento_cliente',
            'razon_social'      => 'required|min:5|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'direccion'         => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'telefono'          => 'numeric',
            'mail'              => 'required|email',
            'contacto'          => 'nullable|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'telef_contac'      => 'nullable|numeric',
            'punto_llegada'     => 'nullable|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'placa'             => 'nullable|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'documento_chofer' => 'nullable|numeric',

        ];
    }

    public function messages()
    {
        return [
            'documento_cliente.numeric'     => 'El campo RUC o Documento deber numérico',
            'documento_cliente.unique'      => 'El número de RUC o Documento ya existe',
            'razon_social.required'         => 'El campo Razón Social es requerido',
            'razon_social.min'              => 'El campo Razón Social debe tener almenos 5 caracteres',
            'direccion.required'            => 'El campo Direccion es requerida',
            'telefono.numeric'              => 'El campo Teléfono deber numérico',
            'mail.required'                 => 'El campo Email es requerido.',
            'mail.email'                    => 'El campo Email debe ser de tipo email Ejmplo: ejemplo@mail.com',
            'telef_contac.numeric'          => 'El campo Telefono debe ser numérico',
            'documento_chofer.numeric'      => 'El campo Documento del chofer debe ser numérico',
        ];
    }
}
