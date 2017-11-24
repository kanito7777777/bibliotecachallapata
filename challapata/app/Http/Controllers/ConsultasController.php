<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function lista_materiales()
    {
    	$this->middleware('auth');
    	
		$query = "select m.*, if(t.id is null, 'libre', 'prestado') as obs,
			   t.id as idPrestamo, t.ci, t.aquien, t.fecha, t.observacion, datediff(current_date(), t.fecha) as diasPrestados
		from material m left join 
			 (
				select p.id, p.fecha, p.observacion, p.fkMaterial,e.ci, concat(e.nombre, ' ', e.apellido) as aquien
		        from prestamo p inner join estudiante e on e.id = p.fkEstudiante 
		        where p.estado = 'Prestado'
		     ) as t on m.id = t.fkMaterial
		where m.estado = ?";
        $materiales = DB::select($query,[1]);
        return view('backEnd.listas.listamateriales', compact('materiales'));
    }

    public function lista_prestados()
    {
		$query = "select m.*, if(t.id is null, 'libre', 'prestado') as obs,
			   t.id as idPrestamo, t.ci, t.aquien, t.fecha, t.observacion, datediff(current_date(), t.fecha) as diasPrestados
		from material m left join 
			 (
				select p.id, p.fecha, p.observacion, p.fkMaterial,e.ci, concat(e.nombre, ' ', e.apellido) as aquien
		        from prestamo p inner join estudiante e on e.id = p.fkEstudiante 
		        where p.estado = 'Prestado'
		     ) as t on m.id = t.fkMaterial
		where m.estado = ? and t.id is not null";
        $materiales = DB::select($query,[1]);
        return view('backEnd.listas.listadevoluciones', compact('materiales'));
    }
    public function lista_no_prestados()
    {
		$query = "select m.*, if(t.id is null, 'libre', 'prestado') as obs,
			   t.id as idPrestamo, t.ci, t.aquien, t.fecha, t.observacion, datediff(current_date(), t.fecha) as diasPrestados
		from material m left join 
			 (
				select p.id, p.fecha, p.observacion, p.fkMaterial,e.ci, concat(e.nombre, ' ', e.apellido) as aquien
		        from prestamo p inner join estudiante e on e.id = p.fkEstudiante 
		        where p.estado = 'Prestado'
		     ) as t on m.id = t.fkMaterial
		where m.estado = ? and t.id is null";
        $libros = DB::select($query,[1]);
        dd($libros);
        //return view('backEnd.estudiantes.index', compact('estudiantes'));
    }
}
