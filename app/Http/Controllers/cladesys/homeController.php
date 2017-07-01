<?php

namespace App\Http\Controllers\cladesys;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function index(){
        return "CLADESYS";
    }
}
