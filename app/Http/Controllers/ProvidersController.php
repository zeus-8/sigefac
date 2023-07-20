<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use Illuminate\Http\Request;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = DB::table('providers')->whereNull('deleted_at')->get();
        return view('provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProviderRequest $request)
    {
        $provider = Provider::create([
            'direccion'     => $request['direccion'],
            'telefono'      => $request['telefono'],
            'mail'          => $request['mail'],
            'razon_social'  => $request['razon_social'],
            'contacto'      => $request['contacto']
        ]);

        $codigo = generarCodigo($provider->id, 'pr');

        $provider->codigo_proveedor = $codigo;
        $provider->save();

        return redirect()->route('provider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $provider = Provider::find($request->id);
        return $provider;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $provider = Provider::find($id);
        //dd($id,$product);
        return view('provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $provider = Provider::find($id);

        $provider->razon_social = $request->razon_social;
        $provider->direccion = $request->direccion;
        $provider->telefono = $request->telefono;
        $provider->mail = $request->mail;
        $provider->contacto = $request->contacto;
        $provider->telefono_contac = $request->telefono_contac;
        $provider->save();

        return redirect()->route('provider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $provider = Provider::find($request->id);
        $provider->delete();
        return $provider;
    }
}
