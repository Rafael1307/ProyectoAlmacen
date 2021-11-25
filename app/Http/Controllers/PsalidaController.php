<?php

namespace App\Http\Controllers;

use App\Models\Psalida;
use App\Models\Producto;
use App\Models\Salida;

use Illuminate\Http\Request;

/**
 * Class PsalidaController
 * @package App\Http\Controllers
 */
class PsalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psalidas = Psalida::paginate();

        return view('psalida.index', compact('psalidas'))
            ->with('i', (request()->input('page', 1) - 1) * $psalidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $psalida = new Psalida();
        $productos = Producto::pluck('Nombre', 'id');

        return view('psalida.create', compact('psalida', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Psalida::$rules);

        $psalida = Psalida::create($request->all());

        return redirect()->route('psalidas.index')
            ->with('success', 'Psalida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $psalida = Psalida::find($id);

        return view('psalida.show', compact('psalida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $psalida = Psalida::find($id);
        $productos = Producto::pluck('Nombre', 'id');

        return view('psalida.edit', compact('psalida', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Psalida $psalida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Psalida $psalida)
    {
        request()->validate(Psalida::$rules);

        $psalida->update($request->all());

        return redirect()->route('psalidas.index')
            ->with('success', 'Psalida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $psalida = Psalida::find($id)->delete();

        return redirect()->route('psalidas.index')
            ->with('success', 'Psalida deleted successfully');
    }
}
