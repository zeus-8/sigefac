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
            'descripcion'   => 'required|min:5|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i',
            'precio_compra' => 'required|numeric|decimal:1,3',
            'stock'         => 'required|numeric',
            'stock_minimo'  => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required'      => 'El campo descripcion es obligatorio.',
            'descripcion.min'           => 'El campo descripcion debe tener almenos 5 caracteres.',
            'precio_compra.required'    => 'El campo precio ultima compra es obligatorio.',
            'precio_compra.numeric'     => 'El campo precio ultima compra debe ser numérico.',
            'precio_compra.decimal'     => 'El campo precio ultima compra debe tener entre 1 y 3 decimales.',
            'stock.required'            => 'El campo Stock es obligatorio',
            'stock.numeric'             => 'El campo Stock debe ser numérico',
            'stock_minimo.required'     => 'El campo Stock Minimo es obligatorio',
            'stock_minimo.numeric'      => 'El campo Stock Minimo debe ser numérico',

        ];
    }
}
