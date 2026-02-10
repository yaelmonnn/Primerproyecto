<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
// use App\Models\Pagina;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('hello');
    }

    public function empresa(): View{
        $datos["nombre"]="Jose Yael Mex Montero";
        $datos["fecha"]="2026-02-03";
        $datos["actividad"]="Desarrollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarrollo de sofware a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del ejemplo";

        // $usuarios = new Pagina();
        // $datos["listadousuarios"]=$usuarios->ObtenerListado();
        return view('empresa',$datos);
    }
}
