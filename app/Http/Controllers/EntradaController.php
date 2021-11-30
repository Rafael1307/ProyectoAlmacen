<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Pentrada;
use App\Models\Producto;
use App\Models\Userrole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class EntradaController
 * @package App\Http\Controllers
 */
class EntradaController extends Controller
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
            if($elemento->idUser == $userid AND $elemento->idRol == '3'){

                $entradas = Entrada::paginate();

                return view('entrada.index', compact('entradas'))
                    ->with('i', (request()->input('page', 1) - 1) * $entradas->perPage());
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
        $entrada = new Entrada();
        return view('entrada.create', compact('entrada'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Entrada::$rules);

        $entrada = Entrada::create($request->all());
        $ide = $entrada->id;

        $pentrada = new Pentrada();

        $productos = Producto::pluck('Nombre', 'id');
        return view('pentrada.create', compact('pentrada', 'productos', 'ide'))->with('success', 'Entrada creada correctamente.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pentradas = Pentrada::paginate();

        return view('pentrada.index', compact('pentradas', 'id'))
            ->with('i', (request()->input('page', 1) - 1) * $pentradas->perPage());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada = Entrada::find($id);

        return view('entrada.edit', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Entrada $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        request()->validate(Entrada::$rules);

        $entrada->update($request->all());

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada actualizada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $entrada = Entrada::find($id)->delete();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada eliminada');
    }
}
