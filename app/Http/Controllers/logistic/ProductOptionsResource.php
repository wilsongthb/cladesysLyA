<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductOptions;
use DB;

class ProductOptionsResource extends Controller
{
    public function select($locations_id, $products_id){
        $fila = ProductOptions::
        where('locations_id', $locations_id)
        ->where('products_id', $products_id)
        ->first();

        if($fila){
            return $fila;
        }else{
            $fila = new ProductOptions;
            $fila->locations_id = $locations_id;
            $fila->products_id = $products_id;
            $fila->user_id = \Auth::user()->id;
            $fila->save();
            return $fila;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $location = "";
        if($request->locations_id){
            $locations_id = (int)$request->locations_id;
            $location = "AND po.locations_id = $locations_id";
        }

        // dd($location);
        $sql = "SELECT
                po.id,
                p.id AS products_id,
                po.locations_id AS locations_id,
                p.detail,
                po.minimum,
                po.permanent,
                po.duration
            FROM product_options AS po
            LEFT JOIN products AS p ON p.id = po.products_id
            JOIN locations AS l ON l.id = po.locations_id
            $location
            AND p.detail LIKE '%$request->search%'
            ";
    // dd($sql);
        $res = DB::
            select(
                DB::raw($sql)
            );
            return $res;
            // ->where('po.locations_id', $locations_id);
        // if($request->search){
        //     // $res->query('p.detail', 'LIKE', '%'.$request->search.'%');
        // }
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
        //
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
        $fila = ProductOptions::find($id);
        $fila->user_id = $request->user_id;
        $fila->minimum = $request->minimum;
        $fila->duration = $request->duration;
        $fila->permanent = $request->permanent;

        $fila->save();

        return "ok";

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
