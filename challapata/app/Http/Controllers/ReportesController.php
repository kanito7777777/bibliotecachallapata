<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Material;

class ReportesController extends Controller
{
    public function historial_estudiante($idEstudiante)
    {
    	$this->middleware('auth');
    	
		$query = "select m.*, if(t.id is null, 'libre', 'prestado') as obs,t.id as idPrestamo, t.ci, t.aquien, t.fecha, t.observacion, datediff(current_date(), t.fecha) as diasPrestados, t.estado, t.ci, t.idEstudiante

		from material m left join 
			 (
				select p.id, p.fecha, p.observacion, p.fkMaterial,p.estado, e.id as idEstudiante, e.ci, concat(e.nombre, ' ', e.apellido) as aquien
		        from prestamo p inner join estudiante e on e.id = p.fkEstudiante 
		     ) as t on m.id = t.fkMaterial
		where t.idEstudiante = ? and t.id is not null
		order by t.id desc";
        $materiales = DB::select($query,[$idEstudiante]);
        return view('backEnd.reportes.rephistorialestudiante', compact('materiales'));
    }

    public function historial_material($idMaterial)
    {
    	$this->middleware('auth');
    	
		$query = "select m.*, if(t.id is null, 'libre', 'prestado') as obs,t.id as idPrestamo, t.ci, t.aquien, t.fecha, t.observacion, datediff(current_date(), t.fecha) as diasPrestados, t.estado, t.ci, t.idEstudiante

		from material m left join 
			 (
				select p.id, p.fecha, p.observacion, p.fkMaterial,p.estado, e.id as idEstudiante, e.ci, concat(e.nombre, ' ', e.apellido) as aquien
		        from prestamo p inner join estudiante e on e.id = p.fkEstudiante 
		     ) as t on m.id = t.fkMaterial
		where m.id = ?
		order by t.fecha desc";
        $materiales = DB::select($query,[$idMaterial]);
        //dd($materiales);
        return view('backEnd.reportes.rephistorialmaterial', compact('materiales'));
    }

    public function lista_material()
    {
    	$materiales = Material::all();
    	return view('backEnd.reportes.replistamateriales', compact('materiales'));
    }

    public function reporte_estadistico()
    {
        $query = "select m.*, (select count(p.id) from prestamo p where p.fkMaterial = m.id) as cant
        from material m
        order by cant desc";
        $materiales = DB::select($query);
        return view('backEnd.reportes.repestadistico', compact('materiales'));
    }
}
