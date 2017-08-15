<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\output_detailsModel as OutputDetails;

class OutputDetailsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return OutputDetails::
            select(
                'od.*',
                'p.detail'
            )
            ->from('output_details AS od')
            ->leftJoin('input_details AS id', 'id.id', '=', 'od.input_details_id')
            ->leftJoin('products AS p', 'p.id', '=', 'id.products_id')
            ->where('od.outputs_id', $request->id)
            ->where('od.flagstate', 1)
            ->get();
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
        $fila = new OutputDetails;
        $fila->user_id = $request->user_id;
        $fila->input_details_id = $request->input_details_id;
        $fila->quantity = $request->quantity;
        $fila->utility = $request->utility;
        $fila->unit_price = $request->unit_price;
        $fila->outputs_id = $request->outputs_id;
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
        //
    }
}
