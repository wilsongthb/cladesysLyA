<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ordersModel;
use Datetime;

class requerimentsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ordersModel::
            where('flagstate', 1)
            ->orderBy('id', 'DESC')
            ->paginate(80);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fila = new ordersModel;
        // user_id
        // locations_id
        // shipping
        $fila->user_id = $request->user_id;
        $fila->locations_id = $request->locations_id;
        $fila->shipping = new Datetime($request->shipping);
        $fila->status = 1; // default
        $fila->save();

        return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fila = ordersModel::find($id);
        $fila->flagstate = 0;
        $fila->save();
        return "ok";
    }
}
