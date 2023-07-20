<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            'razon_social'      => 'required|min:5|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'direccion'         => 'required|min:5|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'telefono'          => 'required|numeric',
            'mail'              => 'required|email',
            'contacto'          => 'required|min:5|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'telefono_contac'   => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'razon_social.required'     => 'La Razón Social es requerida',
            'razon_social.min'          => 'La Razón Social debe tener almenos 5 caracteres',
            'direccion.required'        => 'La Direccion es requerida',
            'telefono.required'         => 'El Teléfono es requerido',
            'telefono.numeric'          => 'El Teléfono deber ser numérico',
            'mail.required'             => 'El Email es requerido.',
            'mail.email'                => 'El Email debe ser de tipo email Ejmplo: ejemplo@mail.com',
            'telefono_contac.numeric'   => 'El Telefono del Contacto debe ser numérico',
            'telefono_contac.required'  => 'El Teléfono del Contacto es requerido',
            'contacto.required'         => 'El Contacto es requerido',
            'contacto.min'              => 'La Razón Social debe tener almenos 5 caracteres',

        ];
    }
}
