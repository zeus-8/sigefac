<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $customer = Customer::create([
                'codigo_cliente'    => $request['codigo_cliente'],
                'tipo_doc'          => $request['tipo_doc'],
                'documento_cliente' => $request['documento_cliente'],
                'razon_social'      => $request['razon_social'],
                'direccion'         => $request['direccion'],
                'telefono'          => $request['telefono'],
                'mail'              => $request['mail'],
                'contacto'          => $request['contacto'],
                'telef_contac'      => $request['telef_contac']
            ]);
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();
        }

        DB::beginTransaction();

        try {
            Destination::create([
                'customer_id'       => $customer->id,
                'punto_partida'     => $request['punto_partida'],
                'punto_llegada'     => $request['punto_llegada'],
                'placa'             => $request['placa'],
                'documento_chofer'  => $request['documento_chofer'],
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
