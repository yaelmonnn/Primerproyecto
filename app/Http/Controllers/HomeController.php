<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function empresa(){
        $datos["nombre"]="Jose Yael Mex Montero";
        $datos["fecha"]="2026-02-03";
        $datos["actividad"]="Desarollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarrollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";

        $usuarios=new Pagina();
        $datos["listadousuarios"]=$usuarios->ObtenerListados();
        return view('empresa',$datos);
    }

    public function __invoke(){
        return view('hello');
    }

    public function update(Request $request){
        $usuarios=new Pagina();
        $respuesta=$usuarios->BuscarId($request->id);
        if(!empty($respuesta)){
            $respuesta->name=$request->name;
            $respuesta->calle=$request->calle;
            $respuesta->save();
        }
        return $respuesta;
    }

    public function eliminarLogico($id){
        $usuario = Pagina::find($id);
        if($usuario){
            $usuario->is_active = 0; // Cambiamos el estatus a 0
            $usuario->save();
            return response()->json(['mensaje' => 'Eliminación lógica exitosa']);
        }
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }

    public function eliminarFisico($id){
        $usuario = Pagina::find($id);
        if($usuario){
            $usuario->delete(); // Elimina el registro por completo de la BD
            return response()->json(['mensaje' => 'Eliminación física exitosa']);
        }
        return response()->json(['error' => 'Registro no encontrado'], 404);
    }

}
