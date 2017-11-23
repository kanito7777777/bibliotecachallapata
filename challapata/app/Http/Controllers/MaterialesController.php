<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Material;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class MaterialesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $materiales = Material::all();

        return view('backEnd.materiales.index', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['codigo' => 'required', 'titulo' => 'required', 'autor' => 'required', ]);

        Material::create($request->all());

        Session::flash('message', 'Materiale added!');
        Session::flash('status', 'success');

        return redirect('materiales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materiale = Material::findOrFail($id);

        return view('backEnd.materiales.show', compact('materiale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materiale = Material::findOrFail($id);

        return view('backEnd.materiales.edit', compact('materiale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['codigo' => 'required', 'titulo' => 'required', 'autor' => 'required', ]);

        $materiale = Material::findOrFail($id);
        $materiale->update($request->all());

        Session::flash('message', 'Materiale updated!');
        Session::flash('status', 'success');

        return redirect('materiales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materiale = Material::findOrFail($id);

        $materiale->delete();

        Session::flash('message', 'Materiale deleted!');
        Session::flash('status', 'success');

        return redirect('materiales');
    }

}
