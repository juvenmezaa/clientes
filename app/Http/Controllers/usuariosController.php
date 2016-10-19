<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\usuariosModel;
use App\direccionModel;
use DB;


class usuariosController extends Controller
{
   	public function principal(){
   		return view("principal");
   	}
   	public function registrar(){
   		return view("registrarUsuarios");
   	}
   	public function guardar(Request $request){
    $regimen = $request -> input("regimen");
    $nombre = $request -> input("nombre");
		$apellidos = $request -> input("apellidos");
		$rfc = $request -> input("rfc");
		$curp = $request -> input("curp");
    
    //Guardar en BD


    $nuevo = new usuariosModel;
    $nuevo->regimen = $regimen;
    $nuevo->nombre = $nombre;
    $nuevo->apellidos = $apellidos;
    $nuevo->rfc = $rfc;
    $nuevo->curp = $curp;
    $nuevo->save();

    
    $id_p=$nuevo->id;
    $pais = $request->input("pais");
    $estado = $request -> input("estado");
    $ciudad = $request -> input("ciudad");
    $colonia = $request -> input("colonia");
    $calle = $request -> input("calle");
		
    //DB

    for ($i=0; $i < count($pais); $i++) { 
      $p=$pais[$i];
      $e=$estado[$i]; 
      $ci=$ciudad[$i]; 
      $co=$colonia[$i];
      $ca=$calle[$i]; 
      
      $nuevaD = new direccionModel;
      $nuevaD->id_persona = $id_p;
      $nuevaD->pais = $p;
      $nuevaD->estado = $e;
      $nuevaD->ciudad = $ci;
      $nuevaD->colonia = $co;
      $nuevaD->calle = $ca;
      $nuevaD->save();
    }
		return Redirect('/registrarUsuarios');
   	}
   	public function consultar(){
   		$usuarios = usuariosModel::all();
   		//$usuarios = DB::table("persona")->paginate(5);
      //{!!$usuarios->render()!!}
   		return view("consultarUsuarios", compact("usuarios"));
   	}

    public function consultarUno(Request $request){
      $id=$request->input("usuario");
      return redirect("consultar/$id");
    }
    public function consultar2($id){
      $direcciones= DB::table("direccion AS d")->join("persona AS p", "p.id","=","d.id_persona")->where("d.id_persona","=", $id)->select("d.id as did","d.pais","d.estado","d.ciudad","d.colonia","d.calle","p.*")->get();
      return view("consultarUsuario",compact("direcciones"));
    }
   	public function eliminar($id){
   		usuariosModel::find($id)->delete();
      DB::table('direccion')->where('id_persona', '=', $id)->delete();
   		return Redirect("/consultarUsuarios");
   	}
   	public function actualizar($id){
   		$usuario=usuariosModel::find($id);
      $direcciones= DB::table("direccion")->where("id_persona","=", $id)->select("*")->get();
   		return view("actualizarUsuario",compact("usuario","direcciones"));
   	}
   	public function actualiza($id, Request $request){
   		$u=usuariosModel::find($id);
      $u->nombre= $request->input("nombre");
   		$u->apellidos= $request->input("apellidos");
   		$u->regimen= $request->input("regimen");
   		$u->rfc= $request->input("rfc");
   		$u->curp= $request->input("curp");
   		$u->save();

      $pais = $request->input("pais");
      $estado = $request -> input("estado");
      $ciudad = $request -> input("ciudad");
      $colonia = $request -> input("colonia");
      $calle = $request -> input("calle");

      DB::table('direccion')->where('id_persona', '=', $id)->delete();

      
      for ($i=0; $i < count($pais); $i++) { 
        $p=$pais[$i];
        $e=$estado[$i]; 
        $ci=$ciudad[$i]; 
        $co=$colonia[$i];
        $ca=$calle[$i]; 
        
        $nuevaD = new direccionModel;
        $nuevaD->id_persona = $id;
        $nuevaD->pais = $p;
        $nuevaD->estado = $e;
        $nuevaD->ciudad = $ci;
        $nuevaD->colonia = $co;
        $nuevaD->calle = $ca;
        $nuevaD->save();
      }
		return Redirect("/consultar/$id");
   	}
      
}
