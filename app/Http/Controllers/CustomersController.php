<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
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
        $customers = Customer::whereNull('deleted_at')->get();
        //dd($customers);
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        //DB::beginTransaction();
        //dd($request->all());
        //try {
            $customer = Customer::create([
                'tipo_doc'          => $request['tipo_doc'],
                'documento_cliente' => $request['documento_cliente'],
                'razon_social'      => $request['razon_social'],
                'direccion'         => $request['direccion'],
                'telefono'          => $request['telefono'],
                'mail'              => $request['mail'],
                'contacto'          => $request['contacto'],
                'telef_contac'      => $request['telef_contac']
            ]);
            $customer->codigo_cliente = generarCodigo($customer->id, 'c');
            //$customer->tipo_doc = $request['tipo_doc'];
            $customer->save();
            //DB::commit();

        //} catch (\Throwable $th) {
            //DB::rollback();
        //}

        //DB::beginTransaction();

        //try {
            Destination::create([
                'customer_id'       => $customer->id,
                'punto_partida'     => $request['punto_partida'],
                'punto_llegada'     => $request['punto_llegada'],
                'placa'             => $request['placa'],
                'documento_chofer'  => $request['documento_chofer'],
            ]);
            //DB::commit();
        //} catch (\Throwable $th) {
            //DB::rollback();
        //}
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $customer = DB::table('customers')->select('customers.id','customers.codigo_cliente' , 'customers.tipo_doc', 'customers.documento_cliente', 'customers.razon_social','customers.direccion', 'customers.telefono', 'customers.mail', 'destinations.contacto', 'destinations.telef_contac', 'destinations.punto_partida', 'destinations.punto_llegada', 'destinations.placa', 'destinations.documento_chofer')
                                    ->leftJoin('destinations', 'destinations.customer_id', '=', 'customers.id')
                                    ->where('customers.id', $request->id)
                                    ->first();
        return $customer;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = DB::table('customers')->select('customers.id','customers.codigo_cliente' , 'customers.tipo_doc', 'customers.documento_cliente', 'customers.razon_social','customers.direccion', 'customers.telefono', 'customers.mail', 'destinations.contacto', 'destinations.telef_contac', 'destinations.punto_partida', 'destinations.punto_llegada', 'destinations.placa', 'destinations.documento_chofer')
                                    ->leftJoin('destinations', 'destinations.customer_id', '=', 'customers.id')
                                    ->where('customers.id', $id)
                                    ->first();
        //dd($customer);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        //dd($request->all());
        $customer = Customer::find($id);
        $customer->tipo_doc             = $request['tipo_doc'];
        $customer->documento_cliente    = $request['documento_cliente'];
        $customer->razon_social         = $request['razon_social'];
        $customer->direccion            = $request['direccion'];
        $customer->telefono             = $request['telefono'];
        $customer->mail                 = $request['mail'];
        $customer->save();

        $destination = Destination::Where('customer_id',$customer->id)->get();
        //dd($destination->all());
        foreach ($destination as $row) {

            $row->contacto      = $request['contacto'];
            $row->telef_contac  = $request['telef_contac'];
            $row->punto_partida = $request['punto_partida'];
            $row->punto_llegada = $request['punto_llegada'];
            $row->placa         = $request['placa'];
            $row->documento_chofer = $request['documento_chofer'];
            $row->save();
        }
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
        return $customer;
    }
}
