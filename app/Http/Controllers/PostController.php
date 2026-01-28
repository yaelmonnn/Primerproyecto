<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function Mensaje(): string{
        return "Hola desde el controlador PostController";
    }

    public function About($param = null, $nombre = null): View{
        $datos = ['parametro' => $param,
                  'nombre' => $nombre
        ];
        return view('about', $datos);
        //return view('about', compact('param', 'nombre'));
    }

    public function Contacto(): View{
        return view('contacto', ['mensaje' => "Esto es un mensaje"]);
    }

}
