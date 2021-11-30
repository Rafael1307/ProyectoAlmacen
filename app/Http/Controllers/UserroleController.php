<?php

namespace App\Http\Controllers;

use App\Models\Userrole;
use Illuminate\Http\Request;

/**
 * Class UserroleController
 * @package App\Http\Controllers
 */
class UserroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userroles = Userrole::paginate();

        return view('userrole.index', compact('userroles'))
            ->with('i', (request()->input('page', 1) - 1) * $userroles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userrole = new Userrole();
        return view('userrole.create', compact('userrole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Userrole::$rules);

        $userrole = Userrole::create($request->all());

        return redirect()->route('userroles.index')
            ->with('success', 'Userrole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userrole = Userrole::find($id);

        return view('userrole.show', compact('userrole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userrole = Userrole::find($id);

        return view('userrole.edit', compact('userrole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Userrole $userrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userrole $userrole)
    {
        request()->validate(Userrole::$rules);

        $userrole->update($request->all());

        return redirect()->route('userroles.index')
            ->with('success', 'Userrole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userrole = Userrole::find($id)->delete();

        return redirect()->route('userroles.index')
            ->with('success', 'Userrole deleted successfully');
    }
}
