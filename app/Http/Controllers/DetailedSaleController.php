<?php

namespace App\Http\Controllers;

use App\Detailed_sale;
use Illuminate\Http\Request;

class DetailedSaleController extends Controller
{
    
    public function index()
    {
        $detailed = Detailed_sale::orderBy('id', 'DESC')->paginate(15);
        return view('admin.detailed.index', compact('detailed'));
    }

  
    public function create()
    {
        return view('admin.detailed.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => ['required', 'max:30'],
            'cantidad' => ['required', 'max:10'],
            'total' => ['required', 'max:10'],
        ]);
        $detailed = new Detailed_sale();
        $detailed->nombre_producto = e($request->nombre_producto);
        $detailed->cantidad = e($request->cantidad);
        $detailed->total = e($request->total);
        $detailed->save();
        return redirect()->route('detailed.index')->with('info', 'Producto agregado correctamente');
    }

    
    public function show(Detailed_sale $detailed_sale)
    {
        //
    }

   
    public function edit($id)
    {
        $detailed = Detailed_sale::where('id', $id)->firstOrFail();
        return view('admin.detailed.edit', compact('detailed'));
    }

    
    public function update(Request $request, Detailed_sale $detailed_sale)
    {
        $request->validate([
            'nombre_producto' => ['required', 'max:30'],
            'cantidad' => ['required', 'max:10'],
            'total' => ['required', 'max:10'],
        ]);
        $detailed = new Detailed_sale();
        $detailed->nombre_producto = e($request->nombre_producto);
        $detailed->cantidad = e($request->cantidad);
        $detailed->total = e($request->total);
        $detailed->save();
        return redirect()->route('detailed.index')->with('info', 'Producto actualizado correctamente');
    }

    
    public function destroy($id)
    {
      /*   $detailed = Detailed_sale::findOrFail($id)->delete();
        return back()->with('info', 'Factura eliminada correctamente'); */
    }
}
