<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\input_detailsModel;
use DB;
use Datetime;

class input_detailsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filas = DB::table('input_details AS i_d')
            ->select('i_d.*', 'p.detail', 's.company_name')
            ->where('i_d.flagstate', 1)
            ->where('i_d.inputs_id', $request->id)
            ->leftJoin('products AS p', 'i_d.products_id', '=', 'p.id')
            ->leftJoin('suppliers AS s', 's.id', '=', 'i_d.suppliers_id')
            ->get();
            // ->toSql();
        // dd($filas);

        return $filas;
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
        // return $request->all();
        $fila = new input_detailsModel;
        
        
        
        $fila->inputs_id = $request->inputs_id;
        $fila->expiration = new Datetime($request->expiration);
        $fila->products_id = $request->products_id;
        $fila->quantity = $request->quantity;
        $fila->suppliers_id = $request->suppliers_id;
        $fila->ticket_number = $request->ticket_number;
        $fila->tickets_id = $request->tickets_id;
        $fila->unit_price = $request->unit_price;
        $fila->user_id = $request->user_id;


        // CAMPOS OPCIONALES
        // lot
        // fabrication
        if($request->lot)
            $fila->lot = $request->lot;
        if($request->fabrication)
            $fila->fabrication = $request->fabrication;

        $fila->save();
        return "ok";
        // return var_dump(isset($request->lote), true);
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
        input_detailsModel::destroy($id);
        // $fila = input_detailsModel::find($id);
        // $fila->flagstate = 0;
        // $fila->save();
        return "ok";
    }
}
