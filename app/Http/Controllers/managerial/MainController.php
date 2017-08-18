<?php

namespace App\Http\Controllers\managerial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){
        return view('managerial.index');
    }
}
