<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\productsModel;

class productsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = productsModel::select(
            // columnas
                'products.*',
                'packings.detail AS packings_detail',
                'brands.detail AS brands_detail',
                'categories.detail AS categories_detail'
            )
            // relaciones con otras tablas
                ->leftJoin('packings', 'products.packings_id', '=', 'packings.id')
                ->leftJoin('brands', 'products.brands_id', '=', 'brands.id')
                ->leftJoin('categories', 'products.categories_id', '=', 'categories.id')
                ->where('products.flagstate', '1') // si esta eliminado no lo considera
                ->orderBy('products.id', 'DESC');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result
                ->where('products.detail', 'LIKE', "%$request->search%")
                ->orWhere('products.barcode', 'LIKE', "%$request->search%")
                ->orWhere('packings.detail', 'LIKE', "%$request->search%")
                ->orWhere('categories.detail', 'LIKE', "%$request->search%")
                ->orWhere('brands.detail', 'LIKE', "%$request->search%");
        }
        // enviar el resultado
        return $result->paginate(15);
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
        $registro = new productsModel;
        
        $registro->detail = $request->detail;
        $registro->barcode = $request->barcode;
        $registro->minstock = $request->minstock;
        $registro->brands_id = $request->brands_id;
        $registro->categories_id = $request->categories_id;
        $registro->measurements_id = $request->measurements_id;
        $registro->packings_id = $request->packings_id;
        $registro->level = $request->level;
        $registro->units = $request->units;
        $registro->user_id = $request->user_id;

        // $registro->user_id = \Auth::user()->id;s

        $registro->save();

        // return print_r($registro, true);
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
