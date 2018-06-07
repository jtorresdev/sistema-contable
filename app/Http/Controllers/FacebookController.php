<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Publicaciones as Publicaciones;
use App\Clientes as Clientes;
use App\Informes as Informes;
use PDF;

class FacebookController extends Controller
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

    public function publicaciones($id)
    {
    	$publicaciones = Publicaciones::where(array('cliente' => $id, 'informe' => 0))->get();
        $cliente = Clientes::where('id', $id)->first();

        $informes = Informes::where('cliente', $id)->get();

        if(count($informes) != 0){
            foreach ($informes as $inf) {
                $informes_ar[$inf->id]['publicaciones'] = Publicaciones::where('informe', $inf->id)->get();
                $informes_ar[$inf->id]['fecha'] = $inf->fecha;
                $informes_ar[$inf->id]['id'] = $inf->id;
                $informes_ar[$inf->id]['estado'] = $inf->estado;
            }
        }else{
            $informes_ar = 0;
        }

       

        return view('facebook.publicaciones', array('publicaciones' => $publicaciones, 'cliente' => $cliente->nombre, 'cliente_id' => $cliente->id, 'informes' => $informes_ar));
    }

    public function clientes()
    {
        $clientes = Clientes::all();
        

        foreach ($clientes as $cl) {
            $publicaciones = Publicaciones::where('cliente', $cl->id)->get();
            $clientes_arr[$cl->id]['publicaciones'] = count($publicaciones);
            $clientes_arr[$cl->id]['nombre'] = $cl->nombre;
            $clientes_arr[$cl->id]['id'] = $cl->id;
        }

        return view('facebook.clientes', array('clientes' => $clientes_arr));
    }

    public function agregar($id = null)
    {
        $clientes = DB::table('clientes')->get();

        $cliente = Clientes::where('id', $id)->first();

        return view('facebook.agregar', array('clientes' => $clientes, 'cliente' => $cliente));
    }

    public function store(request $request)
    {

    $cliente = new Clientes;
    $publicacion = new Publicaciones;

    $buscar_cliente = Clientes::where('nombre', $request->cliente)->first();

    if(!$buscar_cliente){
        $cliente->nombre = $request->cliente;
        $cliente->save();
        $publicacion->cliente = $cliente->id;
    }else{
        $publicacion->cliente = $buscar_cliente->id;
    }

    
    $publicacion->titulo = $request->titulo;
    $publicacion->desde = $request->desde;
    $publicacion->hasta = $request->hasta;
    $publicacion->precio = $request->precio;
  

    $imageName = str_random(10) . '.' . 
        $request->file('imagen')->getClientOriginalExtension();

    $request->file('imagen')->move(public_path("capturas"), $imageName);

    $publicacion->imagen = $imageName;

    $publicacion->save();

    return redirect('facebook/agregar')->with('message', 'Product added!'); 

      
    }

    public function eliminar($id)
    {
        Publicaciones::destroy($id);

        return back();
    }

    public function editar($id)
    {
        $publicacion = Publicaciones::find($id);

        $clientes = DB::table('clientes')->get();

        return view('facebook.editar', array('publicacion' => $publicacion, 'clientes' => $clientes));
    }

    public function update(Request $request)
    {
        $cliente = new Clientes;
        $publicacion = Publicaciones::where('id', $request->id)->first();

        $buscar_cliente = Clientes::where('nombre', $request->cliente)->first();

        if(!$buscar_cliente){
            $cliente->nombre = $request->cliente;
            $cliente->save();
            $publicacion->cliente = $cliente->id;
        }else{
            $publicacion->cliente = $buscar_cliente->id;
        }

        $publicacion->titulo = $request->titulo;
        $publicacion->desde = $request->desde;
        $publicacion->hasta = $request->hasta;
        $publicacion->precio = $request->precio;

        if($request->file('imagen')){
        $imageName = str_random(10) . '.' . 
        $request->file('imagen')->getClientOriginalExtension();

        $request->file('imagen')->move(public_path("capturas"), $imageName);

        $publicacion->imagen = $imageName;
        }

       $publicacion->save();

       return redirect('facebook/publicaciones/' . $publicacion->cliente);
    }

    public function informe(Request $request)
    {
        $informe = new Informes;

        $informe->fecha = date('Y-m-d');
        $informe->cliente = $request->cliente;
        $informe->estado = 0;

        $informe->save();

        foreach ($request->publicaciones_ar as $pub) {
            $publicacion = Publicaciones::where('id', $pub)->first();
            $publicacion->informe = $informe->id;
            $publicacion->save();
        }

        return back();
    }

    public function generarpdf($id)
    {
        $publicaciones = Publicaciones::where('informe', $id)->get();
        $informe = Informes::where('id', $id)->first();
        $cliente = Clientes::where('id', $informe->cliente)->first();
        return view('facebook.informe', array('publicaciones' => $publicaciones, 'informe' => $informe, 'cliente' => $cliente));
        
    }

    public function informepagado($id)
    {
        $informe = Informes::where('id', $id)->first();

        $informe->estado = 1;

        $informe->save();

        return back();
    }

    public function informeborrar($id)
    {
        Informes::destroy($id);

        $publicaciones = Publicaciones::where('informe', $id)->get();

        foreach ($publicaciones as $pub) {
            $publicacion = Publicaciones::where('id', $pub->id)->first();
            $publicacion->informe = null;
            $publicacion->save();
        }

        return back();
    }

    public function clienteborrar($id)
    {
        Clientes::destroy($id);
        $publicaciones = Publicaciones::where('cliente', $id)->delete();

        return redirect('facebook/clientes');
    }

    public function agregarcliente()
    {
        return view('facebook.clientes.agregar');
    }

    public function storecliente(Request $request)
    {
        $cliente = new Clientes;
        $cliente->nombre = $request->cliente;
        $cliente->save();

        return redirect('facebook/clientes');
    }
}
