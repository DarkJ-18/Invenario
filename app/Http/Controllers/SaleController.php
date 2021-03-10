<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
   
    public function index()
    {
        $sales = Sale::orderBy('id', 'DESC')->paginate(15);
        return view('admin.sales.index', compact('sales'));
    }

    
    public function create()
    {
        return view('admin.sales.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'total' => ['required', 'max:10'],
        ]);
        $sales = new Sale;
        $sales->total = e($request->total);
        $sales->save();
        return redirect()->route('sales.index')->with('info', 'Producto agregado correctamente');
    }

   
    public function show(Sale $sale)
    {
        //
    }

    
    public function edit($id)
    {
        $sales = Sale::where('id', $id)->firstOrFail();
        return view('admin.sales.edit', compact('sales'));
    }

   
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'total' => ['required', 'max:10'],
        ]);
        $sales = new Sale;
        $sales->total = e($request->total);
        $sales->save();
        return redirect()->route('sales.index')->with('info', 'Producto actualizado correctamente');
    }

    
    public function destroy(Sale $id)
    {
        $sales = Sale::findOrFail($id)->delete();
        return back()->with('info', 'Producto eliminado correctamente');
    }
}
