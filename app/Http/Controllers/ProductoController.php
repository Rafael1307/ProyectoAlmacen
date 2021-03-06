<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();

        $categorias = Categoria::pluck('tipo', 'id');

        return view('producto.create', compact('producto', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $producto = $request->all();

        if($request->hasFile('foto')){
            $producto['foto']=$request->file('foto')->store('uploads','public');
        }
        Producto::create($producto);
        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        $categorias = Categoria::pluck('tipo', 'id');


        return view('producto.edit', compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $id = $producto->id;
        $temp = request()->except(['_token','_method']);
        if($request->hasFile('foto')){
           
            Storage::delete('public/'.$producto->foto);
             
            $temp['foto'] = $request->file('foto')->store('uploads','public');
            
        }

        Producto::where('id','=',$id)->update($temp);;

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        Storage::delete('public/'.$producto->foto);
        Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado');
    }
}
