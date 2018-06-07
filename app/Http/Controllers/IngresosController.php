<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingresos as Ingresos;
use App\IngresosRecurrentes as IngresosRecurrentes;
 
class IngresosController extends Controller
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

    public function update(Request $request)
    {
        $ingreso = Ingresos::where(array('id' => $request->id))->first();

        $ingreso->monto = $request->monto;
        $ingreso->concepto = $request->concepto;

        $fecha = explode('-', $request->fecha);

        foreach ($fecha as $f) {
            $ingreso->anio = $fecha[2];
            $ingreso->mes = $fecha[1];
            $ingreso->dia = $fecha[0];
        }

        $ingreso->fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

        $ingreso->recurrente = $request->recurrente;
        $ingreso->efectivo = $request->efectivo;

        $ingreso->save();

        return redirect('ingresos');

    }

    public function update_recurrente(Request $request)
    {
        $ingreso = IngresosRecurrentes::where(array('id' => $request->id))->first();

        $ingreso->monto = $request->monto;
        $ingreso->concepto = $request->concepto;

        $ingreso->dia = $request->dia;

        $ingreso->efectivo = $request->efectivo;

        $ingreso->save();

        return redirect('ingresos/recurrentes');

    }

    public function editar_recurrente($id)
    {
        $ingreso = IngresosRecurrentes::find($id);

        return view('ingresos.editar_recurrentes', array('ingreso' => $ingreso));
    }

    public function eliminar_recurrente($id)
    {
        IngresosRecurrentes::destroy($id);

        return back();
    }

    public function editar($id)
    {
        $ingreso = Ingresos::find($id);

        return view('ingresos.editar', array('ingreso' => $ingreso));
    }

    public function eliminar($id)
    {
        Ingresos::destroy($id);

        return back();
    }

    public function ingresos(Request $request)
    {
        if(is_null($request->mes)){ $mes = date('m'); }else{ $mes = $request->mes; }

        if($request->efectivo&&$request->recurrente){
            $ingresos = Ingresos::where(array('mes' => $mes, 'efectivo' => 1, 'recurrente' => 1))->get();
        }elseif($request->efectivo){
            $ingresos = Ingresos::where(array('mes' => $mes, 'efectivo' => 1))->get();
        }elseif($request->recurrente){
            $ingresos = Ingresos::where(array('mes' => $mes, 'recurrente' => 1))->get();
        }elseif($request->desde&&$request->hasta&&$request->efectivo&&$request->recurrente){
            $ingresos = Ingresos::where(array('recurrente' => 1, 'efectivo' => 1))->whereBetween('fecha', [$request->desde, $request->hasta])->get();
        }elseif($request->desde&&$request->hasta&&$request->efectivo){
            $ingresos = Ingresos::where(array('efectivo' => 1))->whereBetween('fecha', [$request->desde, $request->hasta])->get();
        }elseif($request->desde&&$request->hasta&&$request->recurrente){
            $ingresos = Ingresos::where(array('recurrente' => 1))->whereBetween('fecha', [$request->desde, $request->hasta])->get();
        }elseif($request->desde&&$request->hasta){
            $ingresos = Ingresos::whereBetween('fecha', [$request->desde, $request->hasta])->get();
        }else{
            $ingresos = Ingresos::where(array('mes' => $mes))->get();
        }

        return view('ingresos.index1', array('ingresos' => $ingresos, 'efectivo' => $request->efectivo, 'recurrente' => $request->recurrente, 'mes' => $mes, 'desde' => $request->desde, 'hasta' => $request->hasta));
    }

    public function index()
    {
    	$ingresos = Ingresos::where(array('mes' => date('m')))->get();
        $ingresos_sum = Ingresos::where(array('mes' => date('m')))->sum('monto');

    	return view('ingresos.index', array('ingresos' => $ingresos, 'ingresos_sum' => $ingresos_sum));
    }

    public function nuevo()
    {
    	return view('ingresos.nuevo');
    }

    public function nuevo_recurrente()
    {
        return view('ingresos.nuevo_recurrente');
    }

    public function store(Request $request)
    {
    	$ingreso = new Ingresos;
    	$ingreso->monto = $request->monto;
    	$ingreso->concepto = $request->concepto;

    	$fecha = explode('-', $request->fecha);

    	foreach ($fecha as $f) {
    		$ingreso->anio = $fecha[2];
    		$ingreso->mes = $fecha[1];
    		$ingreso->dia = $fecha[0];
    	}

        $ingreso->fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

    	$ingreso->recurrente = $request->recurrente;
    	$ingreso->efectivo = $request->efectivo;

        if($request->recurrente == 1){
            $ingreso_recurrente = new IngresosRecurrentes;

            $fecha = explode('-', $request->fecha);

            foreach ($fecha as $f) {
                $ingreso_recurrente->dia = $fecha[0];
            }

            $ingreso_recurrente->monto = $request->monto;
            $ingreso_recurrente->concepto = $request->concepto;
            $ingreso_recurrente->efectivo = $request->efectivo;
            $ingreso_recurrente->save();
        }

    	$ingreso->save();

    	return redirect('ingresos');
    }

    public function store_recurrente(Request $request)
    {
        $ingreso_recurrente = new IngresosRecurrentes;
        $ingreso_recurrente->dia = $request->dia;
        $ingreso_recurrente->monto = $request->monto;
        $ingreso_recurrente->concepto = $request->concepto;
        $ingreso_recurrente->efectivo = $request->efectivo;
        $ingreso_recurrente->save();
  

        return redirect('ingresos/recurrentes');
    }

    public function ingresos_recurrentes()
    {
        $ingresos = IngresosRecurrentes::all();
        return view('ingresos.ingresos_recurrentes', array('ingresos' => $ingresos));
    }
}
