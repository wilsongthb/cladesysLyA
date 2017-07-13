<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\inputsModel;

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
                'inputs.*',
                'tickets.name AS tickets_name',
                'locations.name AS locations_name',
                'suppliers.company_name AS suppliers_company_name'
            )
            // relaciones con otras tablas
                ->leftJoin('tickets', 'inputs.tickets_id', '=', 'tickets.id')
                ->leftJoin('locations', 'inputs.locations_id', '=', 'locations.id')
                ->leftJoin('suppliers', 'inputs.suppliers_id', '=', 'suppliers.id')
                ->where('inputs.flagstate', '1') // si esta eliminado no lo considera
                ->orderBy('inputs.id', 'DESC');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result
                ->where('inputs.type', 'LIKE', "%$request->search%")
                ->orWhere('inputs.ticketnumber', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.company_name', 'LIKE', "%$request->search%")
                ->orWhere('tickets.name', 'LIKE', "%$request->search%")
                ->orWhere('locations.name', 'LIKE', "%$request->search%");
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
