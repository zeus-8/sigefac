<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::onlyTrashed()->count();
        $customer = Customer::onlyTrashed()->count();
        $provider = Provider::onlyTrashed()->count();
        //dd($product,$customer,$provider);
        return view('trash.index', compact('product', 'customer', 'provider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function restore(Request $request)
    {
        dd($request);
        /*
        switch ($search) {
            case 'product':
                $consul = Product::onlyTrashed()->get();
                    break;
            case 'customer':
                $consul = Customer::onlyTrashed()->get();
                break;
            case 'provider':
                $consul = Provider::onlyTrashed()->get();
                break;
            default:

                break;
        }
        dd($consul);*/
        //return $consul;
    }
}
