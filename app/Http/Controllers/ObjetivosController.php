<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objetivos;
use App\Egresos;

class ObjetivosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$objetivos = Objetivos::all();

        $objetivos_egresos = Egresos::where('objetivo', '>', '0')->get();

        foreach ($objetivos as $obj) {
            foreach ($objetivos_egresos as $obj_egr) {
                if ($obj->id == $obj_egr->objetivo) {
                    $obj->progreso += $obj_egr->monto;
                }
            }
        }

    	return view('objetivos.index', array('objetivos' => $objetivos));
    }

    public function nuevo()
    {
    	return view('objetivos.nuevo');
    }

    public function store(Request $request)
    {
    	$objetivo = new Objetivos;

    	$objetivo->monto = $request->monto;
    	$objetivo->concepto = $request->concepto;
    	$objetivo->dia = $request->dia;
    	$objetivo->anio = date('Y');
    	$objetivo->mes = date('m');
    	$objetivo->dia = date('d');
        $objetivo->fecha = date('Y-m-d');
        $objetivo->total = $request->total;

    	$objetivo->save();

    	return redirect('objetivos');
    }

    public function update(Request $request)
    {
    	$objetivo = Objetivos::where(array('id' => $request->id))->first();

    	$objetivo->monto = $request->monto;
    	$objetivo->concepto = $request->concepto;
    	$objetivo->dia = $request->dia;
        $objetivo->total = $request->total;

    	$objetivo->save();

    	return redirect('objetivos');
    }

    public function editar($id)
    {
    	$objetivo = Objetivos::find($id);

    	return view('objetivos.editar', array('objetivo' => $objetivo));
    }

     public function eliminar($id)
    {
        Objetivos::destroy($id);

        return back();
    }

}
