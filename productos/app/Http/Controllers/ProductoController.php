<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$productos = Producto::orderBy('id','desc')->paginate(5); */
        $productos = DB::table('productos')
            ->join('tipo_productos', 'tipo_productos.id', '=', 'productos.id_tipo_producto')
            ->select('productos.*', 'tipo_productos.nombre as tipo')
            ->paginate(5);
        $tipos = TipoProducto::orderBy('id','desc')->get();
        return view('productos.productos', compact('productos', 'tipos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'id_tipo_producto' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
        ]);

        Producto::create($request->post());

        return redirect()->route('productos.index')->with('success','Producto Creado.');
    }
    public function show(Producto $producto)
    {
        return view('productos.edit',compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $tipos = TipoProducto::orderBy('id','desc')->get();
        return view('productos.edit',compact('producto', 'tipos'));
    }


    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'id_tipo_producto' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
        ]);

        $producto->fill($request->post())->save();

        return redirect()->route('productos.index')->with('success','Producto actualizado');
    }

}
