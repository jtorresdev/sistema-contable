<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IngresosRecurrentes as IngresosRecurrentes;
use App\EgresosRecurrentes as EgresosRecurrentes;
use App\Ingresos as Ingresos;
use App\Egresos as Egresos;
use App\Objetivos as Objetivos;

class CronController extends Controller
{
    public function recurrentes()
    {

    	$ingresos_recurrentes = IngresosRecurrentes::where(array('dia' => date('d')))->get();
    	$egresos_recurrentes = EgresosRecurrentes::where(array('dia' => date('d')))->get();
        $objetivos = Objetivos::where(array('dia' => date('d')))->get();

    	if(count($ingresos_recurrentes) > 0){

    	foreach ($ingresos_recurrentes as $ing) {

    		$ingreso = new Ingresos;

        	$ingreso->monto = $ing->monto;
        	$ingreso->concepto = $ing->concepto;

           	$ingreso->anio = date('Y');
            $ingreso->mes = date('m');
            $ingreso->dia = date('d');

        	$ingreso->fecha = date('Y-m-d');

        	$ingreso->recurrente = 1;
        	$ingreso->efectivo = $ing->efectivo;

        	$ingreso->save();

    		}

    	}

    	if(count($egresos_recurrentes) > 0){

    	foreach ($egresos_recurrentes as $egr) {

    		$egreso = new Egresos;

        	$egreso->monto = $egr->monto;
        	$egreso->concepto = $egr->concepto;

           	$egreso->anio = date('Y');
            $egreso->mes = date('m');
            $egreso->dia = date('d');

        	$egreso->fecha = date('Y-m-d');

        	$egreso->recurrente = 1;
        	$egreso->efectivo = $egr->efectivo;

        	$egreso->save();

    		}

    	}


        if(count($objetivos) > 0){

        foreach ($objetivos as $obj) {

            $egreso = new Egresos;

            $egreso->monto = $obj->monto;
            $egreso->concepto = $obj->concepto;

            $egreso->anio = date('Y');
            $egreso->mes = date('m');
            $egreso->dia = date('d');

            $egreso->fecha = date('Y-m-d');

            $egreso->recurrente = 1;

            $egreso->objetivo = $obj->id;

            $egreso->save();

            }

        }
    }
}
