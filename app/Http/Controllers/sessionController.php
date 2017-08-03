<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionController extends Controller
{
    public function getConfig($key, $value){
        // return session()->get('config');
        // session()->start();


        // return response()->json(session('config'));

        session([
            $key => $value
        ]);
        // session

        session()->save();

        return session()->all();
        // return session();
    }
    public function setConfig(Request $request){
        // session()->put('config', $request->config);
        // return session()->get('config');
        // session()->start();
        session([
            'config' => $request->config
        ]);
        session()->save();
        // return session('config');
        return session()->all();
    }
}
