<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estudiante;
use App\Material;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class EstudiantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    private function validar(Request $request, $op)
    {
         $regla = ($op == 'nuevo')? 'required|min:5|max:11|unique:estudiante' : 'required|min:5|max:11';

        $this->validate($request, 
            [
                'ci' => $regla, 
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

        $this->validar($request, 'nuevo');        

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
        $this->validar($request, 'editar');        
        
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

    public function abrirBuscarEstudiante()
    {
        return view('backEnd.listas.buscarEstudiante');
    }

    private function consultaSQL()
    {
        $query = "select v.*,
                (select count(p.fkEstudiante) from prestamo p where p.estado = 'Prestado' and p.fkEstudiante = v.fkEstudiante) as cantidad
                from prestamo v
                where v.fkEstudiante = ?
                order by v.id desc
                limit 1";
        return $query;
    }

    public function buscarEstudiante($id, $ci)
    {
        $estudiante = Estudiante::Where('ci', '=', $ci)->first();
        $materiale = Material::findOrFail($id);

        $idEstudiante = 0;
        if(! is_null($estudiante))
           $idEstudiante = $estudiante->id;

        $detalle = DB::SelectOne($this->consultaSQL(),[$idEstudiante]);

        //dd($detalle);
        return view('backEnd.prestamos.create', compact(['materiale','estudiante','detalle']));
    }
}
