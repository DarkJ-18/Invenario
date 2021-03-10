<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $productos = Product::orderBy('id', 'DESC')->paginate(15);
        return view('admin.productos.index', compact('productos'));
    }

    
    public function create()
    {
        $productos = Product::orderBy('nombre_producto', 'ASC')->pluck('nombre_producto', 'id');
        return view('admin.productos.create', compact('productos'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => ['required', 'max:30'],
            'precio' => ['required', 'max:30'],
            'cantidad' => ['required', 'max:30'],
        ]);
        $productos = new Product;
        $productos->nombre_producto = e($request->nombre_producto);
        $productos->precio = e($request->precio);
        $productos->cantidad = e($request->cantidad);
        $productos->save();
        return redirect()->route('productos.index')->with('info', 'Producto agregado correctamente');
    }

  
    public function show(Product $product)
    {
        //
    }

    
    public function edit($id)
    {
        $productos = Product::where('id', $id)->firstOrFail();
        return view('admin.productos.edit', compact('productos'));
    }

   
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre_producto' => ['required', 'max:30'],
            'precio' => ['required', 'max:30'],
            'cantidad' => ['required', 'max:30'],
        ]);
        $productos = new Product;
        $productos->nombre_producto = e($request->nombre_producto);
        $productos->precio = e($request->precio);
        $productos->cantidad = e($request->cantidad);
        $productos->save();
        return redirect()->route('productos.index')->with('info', 'Producto actualizado correctamente');
    }

    
    public function destroy($id)
    {
        $productos = Product::findOrFail($id)->delete();
        return back()->with('info', 'Producto eliminado correctamente');
    }
}
