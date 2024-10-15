<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert; #usado para el sweet alert

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create_product');
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '', // Si la descripción no se proporciona, dejarla vacía
            'price' => $validated['price'],
            'stock' => $validated['stock'],
        ]);
        
        Alert::success('Producto Creado', 'El producto ha sido creado')->flash();
        return redirect()->route('products.list');
    }

    public function show(Product $product)
    {
        return view('product.show_product', compact('product'));
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('product.edit_product', compact('products'));
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        Alert::success('Producto Actualizado', 'El producto ha sido actualizado')->flash();
        return redirect()->route('products.list');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product ->delete();
        Alert::success('Producto Eliminado', 'El producto ha sido eliminado')->flash();
        return redirect()->route('products.list');
    }
    public function list(){
        $products = Product::paginate(4); 
        return view('product.list_product', compact('products'));
    }
    
}

