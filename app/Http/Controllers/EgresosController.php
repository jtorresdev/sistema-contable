<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egresos;
use App\EgresosRecurrentes;

class EgresosController extends Controller
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

    public function update_recurrente(Request $request)
    {
        $egreso = EgresosRecurrentes::where(array('id' => $request->id))->first();

        $egreso->monto = $request->monto;
        $egreso->concepto = $request->concepto;

        $egreso->dia = $request->dia;

        $egreso->efectivo = $request->efectivo;

        $egreso->save();

        return redirect('egresos/recurrentes');

    }

     public function editar_recurrente($id)
    {
        $egresos = EgresosRecurrentes::find($id);

        return view('egresos.editar_recurrentes', array('egresos' => $egresos));
    }

    public function eliminar_recurrente($id)
    {
        EgresosRecurrentes::destroy($id);

        return back();
    }

    public function store_recurrente(Request $request)
    {
        $egreso_recurrente = new EgresosRecurrentes;
        $egreso_recurrente->dia = $request->dia;
        $egreso_recurrente->monto = $request->monto;
        $egreso_recurrente->concepto = $request->concepto;
        $egreso_recurrente->efectivo = $request->efectivo;
        $egreso_recurrente->save();
  

        return redirect('egresos/recurrentes');
    }

    public function nuevo_recurrente()
    {
        return view('egresos.nuevo_recurrente');
    }

    public function egresos_recurrentes()
    {
        $egresos = EgresosRecurrentes::all();
        return view('egresos.egresos_recurrentes', array('egresos' => $egresos));
    }

    public function editar($id)
    {
        $egreso = Egresos::find($id);

        return view('egresos.editar', array('egreso' => $egreso));
    }

    public function eliminar($id)
    {
        Egresos::destroy($id);

        return back();
    }

    public function index()
    {
    	$egresos = Egresos::where(array('mes' => date('m')))->get();
        $egresos_sum = Egresos::where(array('mes' => date('m')))->sum('monto');

    	return view('egresos.index', array('egresos' => $egresos, 'egresos_sum' => $egresos_sum));
    }

    public function egresos(Request $request)
    {
    	 if(is_null($request->mes)){ $mes = date('m'); }else{ $mes = $request->mes; }


        if($request->efectivo&&$request->recurrente){
            $egresos = Egresos::where(array('mes' => $mes, 'efectivo' => 1, 'recurrente' => 1))->get();
        }elseif($request->efectivo){
            $egresos = Egresos::where(array('mes' => $mes, 'efectivo' => 1))->get();
        }elseif($request->recurrente){
            $egresos = Egresos::where(array('mes' => $mes, 'recurrente' => 1))->get();
        }elseif($request->desde&&$request->hasta&&$request->efectivo&&$request->recurrente){
            $egresos = Egresos::where(array('recurrente' => 1, 'efectivo' => 1))->whereBetween('fecha', [$request->desde, $request->hasta])->get();
        }elseif($request->desde&&$request->hasta&&$request->efectivo){
            $egresos = Egresos::where(array('efectivo' => 1))->whereBetween('fecha', [$request->desde, $request->hasta])->get();
        }elseif($request->desde&&$request->hasta&&$request->recurrente){
            $egresos = Egresos::where(array('recurrente' => 1))->whereBetween('fecha', [$request->desde, $request->hasta])->get();
        }elseif($request->desde&&$request->hasta){
            $egresos = Egresos::whereBetween('fecha', [$request->desde, $request->hasta])->get();
        }else{
            $egresos = Egresos::where(array('mes' => $mes))->get();
        }


        return view('egresos.index1', array('egresos' => $egresos, 'efectivo' => $request->efectivo, 'recurrente' => $request->recurrente, 'mes' => $mes, 'desde' => $request->desde, 'hasta' => $request->hasta));
    }

    public function nuevo()
    {
    	return view('egresos.nuevo');
    }

        public function store(Request $request)
    {
    	$egresos = new Egresos;
    	$egresos->monto = $request->monto;
    	$egresos->concepto = $request->concepto;

    	$fecha = explode('-', $request->fecha);

    	foreach ($fecha as $f) {
    		$egresos->anio = $fecha[2];
    		$egresos->mes = $fecha[1];
    		$egresos->dia = $fecha[0];
    	}

        $egresos->fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

    	$egresos->recurrente = $request->recurrente;

        if($request->recurrente == 1){
            $egreso_recurrente = new EgresosRecurrentes;

            $fecha = explode('-', $request->fecha);

            foreach ($fecha as $f) {
                $egreso_recurrente->dia = $fecha[0];
            }

            $egreso_recurrente->monto = $request->monto;
            $egreso_recurrente->concepto = $request->concepto;
            $egreso_recurrente->efectivo = $request->efectivo;

            $egreso_recurrente->save();
        }

    	$egresos->save();

    	return redirect('egresos');
    }

    public function update(Request $request)
    {
        $egreso = Egresos::where(array('id' => $request->id))->first();

        $egreso->monto = $request->monto;
        $egreso->concepto = $request->concepto;

        $fecha = explode('-', $request->fecha);

        foreach ($fecha as $f) {
            $egreso->anio = $fecha[2];
            $egreso->mes = $fecha[1];
            $egreso->dia = $fecha[0];
        }

        $egreso->fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

        $egreso->recurrente = $request->recurrente;

        $egreso->save();

        return redirect('egresos');

    }
}
