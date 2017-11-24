<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function lista_materiales()
    {
		$query = "select m.*, if(t.id is null, 'libre', 'prestado') as obs,
			   t.id, t.ci, t.aquien, t.fecha, t.observacion, datediff(current_date(), t.fecha) as diasPrestados
		from material m left join 
			 (
				select p.id, p.fecha, p.observacion, p.fkMaterial,e.ci, concat(e.nombre, ' ', e.apellido) as aquien
		        from prestamo p inner join estudiante e on e.id = p.fkEstudiante 
		        where p.estado = 'Prestado'
		     ) as t on m.id = t.fkMaterial
		where m.estado = ?";
        $libros = DB::select($query,[1]);
        dd($libros);
        //return view('backEnd.estudiantes.index', compact('estudiantes'));
    }
}
