<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Material;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Storage;

class MaterialesController extends Controller
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

    public function validar(Request $request, $op)
    {
        $regla = ($op == 'nuevo')? 'required|min:3|unique:material' : 'required|min:3';
        $this->validate($request, 
            [
            'codigo' => $regla, 
            'titulo' => 'required|min:2', 
            'autor' => 'required|min:2', 
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

        //subir material
        $img = $request->file('portadaImg');
        
        $nombreImg = time().'_'.$img->getClientOriginalName();
        Storage::disk('imgPortadas')->put($nombreImg, 
            file_get_contents( $img->getRealPath() ) );
        
        //insertar registros
        $datos = $request->all();
        
        $datos += ['portada' => $nombreImg];

        Material::create($datos);

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
        $this->validar($request, 'editar');
        
        $datos = $request->all();        
        $materiale = Material::findOrFail($id);

         if (isset($datos['portadaImg']))
        {
           //cargando archivo al servidor
            $img = $request->file('portadaImg');
            $nombreImg = time().'_'.$img->getClientOriginalName();
            Storage::disk('imgPortadas')->put($nombreImg, 
                file_get_contents( $img->getRealPath() ) );
            
            $datos['portada'] = $nombreImg;
        }
        else
        {
            $datos['portada'] = $materiale->portada;
        }

        $materiale->update($datos);

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
