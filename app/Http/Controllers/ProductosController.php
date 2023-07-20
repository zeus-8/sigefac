<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Unit;
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
        $providers = Provider::all();
        $brands = Brand::all();
        $units = Unit::all();
        $product="";
        //dd($providers,$brands);
        return view('product.create', compact('providers', 'brands', 'product', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $provider = Provider::where('id', $request['provider_id'])->get();
        $request['cod_prov'] = (is_numeric($request['cod_prov'])) ? $request['cod_prov'] : null;
        $request['unidad_id'] = ($request['cantidad'] == 0) ? 0 : $request['unidad_id'];
        //dd($request->all(), $provider);

        $product = Product::create([
            'cod_prov'      => $request['cod_prov'],
            'brand_id'      => $request['brand_id'],
            'descripcion'   => strtoupper($request['descripcion']),
            'unit_id'       => $request['unit_id'],
            'cantidad_u'    => $request['cantidad_u'],
            'cantidad_eu'   => $request['cantidad_eu'],
            'stock'         => $request['stock'],
            'stock_minimo'  => $request['stock_minimo'],
            'peso'          => $request['peso'],
        ]);

        $codigo = generarCodigo($product->id,'p');

        $product->codigo = $codigo;
        $product->save();

        $product->providers()->attach($provider,['orden' => 'Sotok Inicial', 'cantidad' => $request['stock'], 'precio_compra' => $request['precio_compra'], 'active'=> 1, 'created_at' => NOW(), 'updated_at' => NOW()]);



        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $product = Product::find($request->id);
        //$providers = $product->provider();

        /*
        foreach ($providers as $provider) {
            $pivotData = $provider->pivot;
            $orden = $provider->orden;
            $quantity = $pivotData->quantity;
        }
        */



        //dd($orden);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::whereNull('products.deleted_at')
                                ->findOrFail($id)
                                ->leftJoin('product_provider', 'products.id', '=', 'product_provider.product_id')
                                ->where('active',1)
                                ->select(['products.*', 'product_provider.provider_id', 'product_provider.precio_compra'])
                                ->first();
        $tabla = Product::whereNull('products.deleted_at')
                            ->findOrFail($id)
                            ->leftJoin('product_provider', 'products.id', '=', 'product_provider.product_id')
                            ->select(['products.id', 'product_provider.product_id', 'product_provider.orden', 'product_provider.cantidad', 'product_provider.precio_compra', 'product_provider.created_at', 'active'])
                            ->get();

        $providers = Provider::whereNull('deleted_at')->get();
        $brands = Brand::whereNull('deleted_at')->get();
        $units = Unit::all();
        //dd($id,$product, $providers,$brands, $tabla);
        return view('product.edit', compact('product', 'providers', 'brands', 'units', 'tabla'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::find($id);

        $product->brand_id          = $request->brand_id;
        $product->descripcion       = $request->descripcion;
        $product->cantidad_u        = $request->cantidad_u;
        $product->cantidad_eu       = $request->cantidad_eu;
        $product->unidad_id         = $request->unidad_id;
        $product->stock             = $request->stock;
        $product->stock_minimo      = $request->stock_minimo;
        $product->peso              = $request->peso;
        $product->save();

        DB::table('product_provider')->where('active',1)->update(['cantidad'=>$product->stock, 'precio_compra'=>$request->precio_compra]);
        //dd($product);
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
