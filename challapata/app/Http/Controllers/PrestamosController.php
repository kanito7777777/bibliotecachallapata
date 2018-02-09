<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Prestamo;
use App\Material;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PrestamosController extends Controller
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
    
    private function consultaSQL()
    {
        $query = "select m.*, if(t.id is null, 'libre', 'prestado') as obs,
               t.id as idPrestamo, t.ci, t.aquien, t.fecha, t.observacion, datediff(current_date(), t.fecha) as diasPrestados
        from material m left join 
             (
                select p.id, p.fecha, p.observacion, p.fkMaterial,e.ci, concat(e.nombre, ' ', e.apellido) as aquien
                from prestamo p inner join estudiante e on e.id = p.fkEstudiante 
                where p.estado = 'Prestado'
             ) as t on m.id = t.fkMaterial
        where t.id = ? and m.estado = ? and t.id is not null";
        return $query;
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $materiales = DB::Select($this->consultaSQL(),[$id, 1]);


        return view('backEnd.prestamos.edit', compact(['prestamo','materiales']));
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
        $prestamo = Prestamo::findOrFail($id);

        $fechaDevol = new \DateTime();
        $prestamo->observacion = $request->input('observacion').'<br/>Devuelto en Fecha: '. $fechaDevol->format('d/m/Y');
        $prestamo->estado = 'Devuelto';
        //dd($prestamo);

        $prestamo->save();


        Session::flash('message', 'Prestamo updated!');
        Session::flash('status', 'success');

        return redirect('listaprestados');
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
