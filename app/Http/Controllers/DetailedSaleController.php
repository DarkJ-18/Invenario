<?php

namespace App\Http\Controllers;

use App\Detailed_sale;
use Illuminate\Http\Request;

class DetailedSaleController extends Controller
{
    
    public function index()
    {
        $detailed_sales = Detailed_sale::orderBy('id', 'DESC')->paginate(15);
        return view('admin.details.index', compact('detailed_sales'));
    }

  
    public function create()
    {
        return view('admin.details.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => ['required', 'max:30'],
            'cantidad' => ['required', 'max:10'],
            'total' => ['required', 'max:10'],
        ]);
        $detailed_sales = new Detailed_sale();
        $detailed_sales->nombre_producto = e($request->nombre_producto);
        $detailed_sales->cantidad = e($request->cantidad);
        $detailed_sales->total = e($request->total);
        $detailed_sales->save();
        return redirect()->route('details.index')->with('info', 'Producto agregado correctamente');
    }

    
    public function show(Detailed_sale $detailed_sale)
    {
        //
    }

   
    public function edit($id)
    {
        $detailed_sales = Detailed_sale::where('id', $id)->firstOrFail();
        return view('admin.details.edit', compact('detailed_sales'));
    }

    
    public function update(Request $request, Detailed_sale $detailed_sale)
    {
        $request->validate([
            'nombre_producto' => ['required', 'max:30'],
            'cantidad' => ['required', 'max:10'],
            'total' => ['required', 'max:10'],
        ]);
        $detailed_sales = new Detailed_sale();
        $detailed_sales->nombre_producto = e($request->nombre_producto);
        $detailed_sales->cantidad = e($request->cantidad);
        $detailed_sales->total = e($request->total);
        $detailed_sales->save();
        return redirect()->route('details.index')->with('info', 'Producto actualizado correctamente');
    }

    
    public function destroy($id)
    {
      /*   $detailed_sales = Detailed_sale::findOrFail($id)->delete();
        return back()->with('info', 'Factura eliminada correctamente'); */
    }
}
