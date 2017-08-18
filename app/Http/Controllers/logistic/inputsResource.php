<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\inputsModel;
use App\input_detailsModel;

class inputsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = inputsModel::select(
            // columnas
                'inputs.*'
            )
            // relaciones con otras tablas
                ->where('inputs.flagstate', '1') // si esta eliminado no lo considera
                ->orderBy('inputs.id', 'DESC');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result
                ->where('inputs.observation', 'LIKE', "%$request->search%")
                ->orWhere('inputs.created_at', 'LIKE', "%$request->search%")
                ->orWhere('inputs.updated_at', 'LIKE', "%$request->search%");
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
        // echo print_r($request->all(), true);
        // echo print_r($request->registro['user_id'], true);


        // // registro
        // $registro = new inputsModel;
        // $registro->observation = isset($request->registro['observation']) ? $request->registro['observation'] : '';
        // $registro->user_id = $request->registro['user_id'];
        // $registro->save();

        // // detalles
        // // echo print_r($request->detalles, true);
        // foreach ($request->detalles as $key => $value) {
        //     $detalle = new input_detailsModel;
            
        //     $detalle->products_id = $value['products_id'];
        //     $detalle->unit_price = $value['unit_price'];
        //     $detalle->quantity = $value['quantity'];
        //     $detalle->expiration = $value['expiration'];
        //     $detalle->suppliers_id = $value['suppliers_id'];
        //     $detalle->tickets_id = $value['tickets_id'];
        //     $detalle->ticket_number = $value['ticket_number'];
        //     $detalle->locations_id = $value['locations_id'];

        //     // valores no requeridos
        //     $detalle->fabrication = isset($value['fabrication']) ? $value['fabrication'] : '';
        //     $detalle->lot = isset($value['lot']) ? $value['lot'] : '';

        //     // otros
        //     $detalle->inputs_id = $registro->id;
        //     $detalle->user_id = $request->registro['user_id'];

        //     $detalle->save();
        // }

        // return "ok";
        $fila = new inputsModel;
        $fila->user_id = $request->user_id;
        $fila->locations_id = $request->locations_id;
        $fila->save();
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
        $registro = inputsModel::find($id);
        // $detalles = input_detailsModel::select(
        //         'input_details.*',
        //         'products.detail AS products_detail'
        //     )
        //     ->leftJoin('products', 'input_details.products_id', '=', 'products.id')
        //     ->where('input_details.inputs_id', $id)->get();

        return [
            'registro' => $registro,
            // 'detalles' => $detalles
        ];
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
        $fila = inputsModel::find($id);
        $fila->observation = $request->observation;
        $fila->user_id = $request->user_id;
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
        $registro = inputsModel::find($id);
        $registro->flagstate = 0;
        $registro->save();
    }
}
