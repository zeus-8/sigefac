<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')->whereNull('deleted_at')->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $product = Product::create([
            'descripcion'       => $request['descripcion'],
            'stock'             => $request['stock'],
            'precio_compra'     => $request['precio_compra'],
            'stock_minimo'      => $request['stock_minimo'],
        ]);

        $codigo = generarCodigo($product->id,'p');

        $product->codigo = $codigo;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $product = Product::find($request->id);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        //dd($id,$product);
        return view('product.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->descripcion       = $request->descripcion;
        $product->stock             = $request->stock;
        $product->stock_minimo      = $request->stock_minimo;
        $product->precio_compra     = $request->precio_compra;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $product = Product::find($request->id);
        $product->delete();

        return $product;
        //return redirect()->route('product.index');
    }


}
