<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\outputsModel as Outputs;

class OutputsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Outputs::paginate(15);
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
        $fila = new Outputs;
        $fila->user_id = $request->user_id;
        $fila->locations_id = $request->locations_id;// destino
        $fila->tickets_id = 1;
        $fila->status = 1;
        $fila->type = $request->type;
        $fila->ticket_number = 0;
        $fila->save();
        // $fila->ticket_number = sprintf("%'.09d", $fila->id);
        // $fila->save();
        return $fila;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Outputs::find($id);
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
        //
    }
}
