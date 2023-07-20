<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'cod_prov'      => 'numeric|nullable|unique:App\Models\Product,cod_prov',
            'descripcion'   => 'required|min:5|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'cantidad_u'    => 'required|numeric',
            'cantidad_eu'   => 'required|numeric',
            'precio_compra' => 'required|numeric|decimal:1,3',
            'stock'         => 'required|numeric',
            'stock_minimo'  => 'required|numeric',
            'peso'          => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'cod_prov.numeric'          => 'Este campo acepta solo números o vacio',
            'cod_prov.nullable'         => 'Este campo acepta solo números o vaci',
            'cod_prov.unique'           => 'Este codigo ya existe',
            'descripcion.required'      => 'Este campo es obligatorio.',
            'descripcion.min'           => 'Este campo debe tener almenos 5 caracteres.',
            'cantidad_u.required'       => 'Obligatorio.',
            'cantidad_u.numeric'        => 'Debe ser numérico.',
            'cantidad_eu.required'      => 'Obligatorio.',
            'cantidad_eu.numeric'       => 'Debe ser numérico.',
            'precio_compra.required'    => 'Este campo es obligatorio.',
            'precio_compra.numeric'     => 'Este campo debe ser numérico.',
            'precio_compra.decimal'     => 'Este campo debe tener entre 1 y 3 decimales.',
            'stock.required'            => 'Este campo es obligatorio',
            'stock.numeric'             => 'Este campo debe ser numérico',
            'stock_minimo.required'     => 'Este campo es obligatorio',
            'stock_minimo.numeric'      => 'Este campo debe ser numérico',
            'peso.required'             => 'Este campo es obligatorio',
            'peso.numeric'              => 'Este campo debe ser numérico',

        ];
    }
}
