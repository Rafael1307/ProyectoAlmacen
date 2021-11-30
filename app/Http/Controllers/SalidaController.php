<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Models\Psalida;
use App\Models\Producto;
use App\Models\Userrole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class SalidaController
 * @package App\Http\Controllers
 */
class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userid = Auth::user()->id;
        $lista = Userrole::paginate();
        foreach($lista as $elemento){
            if($elemento->idUser == $userid AND $elemento->idRol == '1'){

                $salidas = Salida::paginate();

                return view('salida.index', compact('salidas'))
                    ->with('i', (request()->input('page', 1) - 1) * $salidas->perPage());
            }
        }
        return redirect()->route('productos.index')
            ->with('success', 'Sin permiso para entrar a esta seccion.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salida = new Salida();
        return view('salida.create', compact('salida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Salida::$rules);

        $salida = Salida::create($request->all());
        $ide = $salida->id;

        $psalida = new Psalida();



        $productos = Producto::pluck('Nombre', 'id');
        return view('psalida.create', compact('psalida', 'productos', 'ide'))->with('success', 'Salida creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $psalidas = Psalida::paginate();

        return view('psalida.index', compact('psalidas', 'id'))
            ->with('i', (request()->input('page', 1) - 1) * $psalidas->perPage());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salida = Salida::find($id);

        return view('salida.edit', compact('salida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Salida $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        request()->validate(Salida::$rules);

        $salida->update($request->all());

        return redirect()->route('salidas.index')
            ->with('success', 'Salida actualizada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salida = Salida::find($id)->delete();

        return redirect()->route('salidas.index')
            ->with('success', 'Salida eliminada');
    }
}
