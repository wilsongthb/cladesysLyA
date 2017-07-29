<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function index($view){

        // esta operacion se hace para servir archivos php como si fueran html

        $view_html = substr($view, 0, -5);
        return view('templates.'.$view_html);
    }
}
