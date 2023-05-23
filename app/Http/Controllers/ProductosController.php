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
        //$products = Product::all();
        //dd($products);
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

        $codigo = $this->generarCodigo($product->id);

        $product->codigo = $codigo;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $x = 'bien';
        return $x;
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
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index');
    }

    public function generarCodigo ($valor){
        $letras = 'BK';
        $longitudTotal = 8;

        $cantidadCeros = $longitudTotal - strlen($letras) - strlen($valor);
        $codigo = $letras . '-' . str_repeat('0', $cantidadCeros) . $valor;

        return $codigo;
    }
}
