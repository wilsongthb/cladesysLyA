<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function index($view){
        // return view(str_replace('-', '.', $view));
        return view($view);
    }
}
