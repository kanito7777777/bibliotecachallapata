<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estudiante;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class EstudiantesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();

        return view('backEnd.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.estudiantes.create');
    }

    private function validar(Request $request)
    {
        $this->validate($request, 
            [
                'ci' => 'required|min:5|max:11|unique:estudiante', 
                'nombre' => 'required|min:3|max:30', 
                'apellido' => 'max:50', 
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validar($request);        

        Estudiante::create($request->all());

        Session::flash('message', 'Estudiante added!');
        Session::flash('status', 'success');

        return redirect('estudiantes');
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
        $estudiante = Estudiante::findOrFail($id);

        return view('backEnd.estudiantes.show', compact('estudiante'));
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
        $estudiante = Estudiante::findOrFail($id);

        return view('backEnd.estudiantes.edit', compact('estudiante'));
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
        $this->validar($request);        
        
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());

        Session::flash('message', 'Estudiante updated!');
        Session::flash('status', 'success');

        return redirect('estudiantes');
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
        $estudiante = Estudiante::findOrFail($id);

        $estudiante->delete();

        Session::flash('message', 'Estudiante deleted!');
        Session::flash('status', 'success');

        return redirect('estudiantes');
    }

}
