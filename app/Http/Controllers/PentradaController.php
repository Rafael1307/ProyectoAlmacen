<?php

namespace App\Http\Controllers;

use App\Models\Pentrada;
use App\Models\Producto;
use App\Models\Entrada;

use Illuminate\Http\Request;
use PDF;

/**
 * Class PentradaController
 * @package App\Http\Controllers
 */
class PentradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pentradas = Pentrada::paginate();

        return view('pentrada.index', compact('pentradas'))
            ->with('i', (request()->input('page', 1) - 1) * $pentradas->perPage());
    }

    public function pdf()
    {
        $pentradas = Pentrada::paginate();

        return view('psalida.show');

        //return view('pentrada.index', compact('pentradas'))
          //  ->with('i', (request()->input('page', 1) - 1) * $pentradas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pentrada = new Pentrada();

        $productos = Producto::pluck('Nombre', 'id');
        return view('pentrada.create', compact('pentrada', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pentrada::$rules);

        $pentradaa = Pentrada::create($request->all());

        $ide = $pentradaa->idEntrada;

        $pentrada = new Pentrada();

        $productos = Producto::pluck('Nombre', 'id');
        return view('pentrada.create', compact('pentrada', 'productos', 'ide'))->with('success', 'Producto agregado a la entrada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $entrada = Entrada::find($id);


        $pentradas = Pentrada::paginate();

        $pdf = PDF::loadView('pentrada.show', ['pentradas'=>$pentradas, 'id'=>$id, 'fecha'=>$entrada->fecha]);
        return $pdf->stream();
        //return view('pentrada.show', compact('pentrada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pentrada = Pentrada::find($id);
        $productos = Producto::pluck('Nombre', 'id');

        return view('pentrada.edit', compact('pentrada','productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pentrada $pentrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pentrada $pentrada)
    {
        request()->validate(Pentrada::$rules);

        $pentrada->update($request->all());

        return redirect()->route('pentradas.index')
            ->with('success', 'Producto en entrada actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pentrada = Pentrada::find($id)->delete();

        return redirect()->route('pentradas.index')
            ->with('success', 'Producto eliminado de entrada');
    }
}
