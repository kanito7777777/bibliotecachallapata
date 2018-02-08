<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Prestamo;
use App\Material;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PrestamosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $prestamos = Prestamo::all();

        return view('backEnd.prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $materiale = Material::findOrFail($id);

        return view('backEnd.prestamos.create', compact('materiale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
            [
                'fkEstudiante' => 'required', 
            ]);

        //Prestamo::create($request->all());
        $datos = $request->all();
        $datos += ['fecha' => new \DateTime()];
        $datos += ['estado' => 'Prestado'];

        //dd($datos);
        Prestamo::create($datos);

        Session::flash('message', 'Prestamo registrado correctamente!');
        Session::flash('status', 'success');

        return redirect('listamateriales');
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
        $prestamo = Prestamo::findOrFail($id);

        return view('backEnd.prestamos.show', compact('prestamo'));
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
        $prestamo = Prestamo::findOrFail($id);

        return view('backEnd.prestamos.edit', compact('prestamo'));
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
        $this->validate($request, ['fecha' => 'required', 'estado' => 'required', 'fkMaterial' => 'required', 'fkEstudiante' => 'required', ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());

        Session::flash('message', 'Prestamo updated!');
        Session::flash('status', 'success');

        return redirect('prestamos');
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
        $prestamo = Prestamo::findOrFail($id);

        $prestamo->delete();

        Session::flash('message', 'Prestamo deleted!');
        Session::flash('status', 'success');

        return redirect('prestamos');
    }

}
