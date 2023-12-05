<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\categoryFormRequest;
use App\Http\Requests\Admin\productFormRequest;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' => product::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new product();
        return view('admin.products.productForm',[
            'product' => new product()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productFormRequest $request)
    {
        $product = product::create($request->validated())
        ->with('success', 'Le produit a été ajouté avec succés'); 
        return to_route('admin.product.index');       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('admin.products.productForm',[
                'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(productFormRequest $request, product $product)
    {
        $product->update($request->validated());
        return to_route('admin.product.index')
        ->with('success', 'Le produit a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return to_route('admin.product.index')
        ->with('success', 'Le produit a bien été supprimé');

    }
}
