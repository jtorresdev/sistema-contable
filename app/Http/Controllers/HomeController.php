<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingresos as Ingresos;
use App\Egresos as Egresos;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos_mes = Ingresos::where(array('mes' => date('m'), 'anio' => date('Y')))->sum('monto');
        $ingresos_hoy = Ingresos::where(array('mes' => date('m'), 'dia' => date('d'), 'anio' => date('Y')))->sum('monto');

        $egresos_mes = Egresos::where(array('mes' => date('m')))->sum('monto');
        $egresos_hoy = Egresos::where(array('mes' => date('m'), 'dia' => date('d'), 'anio' => date('Y')))->sum('monto');

        $egresos = Egresos::where(array('mes' => date('m')))->get();
        $ingresos = Ingresos::where(array('mes' => date('m')))->get();

        $egresos_suma_total = Egresos::all()->sum('monto');
        $ingresos_suma_total = Ingresos::all()->sum('monto');

        $monto_total = $ingresos_suma_total - $egresos_suma_total;

        foreach ($egresos as $egr) { if($egr->objetivo == 0){ $egr->tipo = 1; }else{ $egr->tipo = 3; } }
        foreach ($ingresos as $ing) {$ing->tipo = 2;}

        $todo = array_merge($egresos->toArray(), $ingresos->toArray());

        usort($todo, array($this, 'sortFunction'));

        return view('home', array('ingresos_mes' => $ingresos_mes, 'ingresos_hoy' => $ingresos_hoy, 'egresos_mes' => $egresos_mes, 'egresos_hoy' => $egresos_hoy, 'todo' => $todo, 'monto_total' => $monto_total));
}

        public function sortFunction( $a, $b ) {
            return strtotime($b["fecha"]) - strtotime($a["fecha"]);
        }
}
