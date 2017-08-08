<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionController extends Controller
{
    public function getConfig(){
        return session()->all();
    }
    public function setConfig(Request $request){
        session($request->all());
        session()->save();
        return session()->all();
    }
}
