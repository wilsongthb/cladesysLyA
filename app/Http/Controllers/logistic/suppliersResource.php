<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suppliersModel;

class suppliersResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = suppliersModel::select(
            // columnas
                'suppliers.*',
                'tickets.name AS tickets_name',
                'locations.name AS locations_name'
            )
            // relaciones con otras tablas
                ->leftJoin('tickets', 'suppliers.tickets_id', '=', 'tickets.id')
                ->leftJoin('locations', 'suppliers.locations_id', '=', 'locations.id')
                ->where('suppliers.flagstate', '1') // si esta eliminado no lo considera
                ->orderBy('suppliers.id', 'DESC');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result
                ->where('suppliers.company_name', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.contact_name', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.identity', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.address', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.phone', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.postal_code', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.country', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.region', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.home_page', 'LIKE', "%$request->search%")
                ->orWhere('suppliers.email', 'LIKE', "%$request->search%")
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
        $registro = new suppliersModel;
        $registro->company_name = $request->company_name;
        $registro->contact_name = $request->contact_name;
        $registro->identity = $request->identity;
        $registro->address = $request->address;
        $registro->phone = $request->phone;
        $registro->postal_code = $request->postal_code;
        $registro->country = $request->country;
        $registro->region = $request->region;
        $registro->home_page = $request->home_page;
        $registro->email = $request->email;
        // $registro->flagstate = $request->flagstate;
        $registro->flagstate = 1;
        $registro->tickets_id = $request->tickets_id;
        $registro->locations_id = $request->locations_id;
        $registro->user_id = $request->user_id;
        $registro->save();
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
