<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\locationsModel;

class locationsController extends Controller
{
    private $titulo = 'LOCALIZACIONES';
    private $name = 'locations';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos = locationsModel::where('flagstate', '1');
        $search = $request->get('search');
        if ($search) {
            $datos = $datos->Where('name', 'LIKE', '%'.$search.'%');
        }
        $datos = $datos->paginate(10);
        return view('logistic.locations.index', [
            'titulo' => $this->titulo,
            'name' => $this->name,
            'datos' => $datos,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logistic.locations.form', [
            'titulo' => $this->titulo,
            'name' => $this->name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new locationsModel;
        $registro->name = $request->name;
        $registro->type = $request->type;
        $registro->utility = $request->utility;
        $registro->flagstate = true;
        $registro->user_id = \Auth::user()->id;
        $registro->save();
        return redirect('logistic/'.$this->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return locationsModel::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('logistic.locations.form', [
            'titulo' => $this->titulo,
            'name' => $this->name,
            'type' => 'edit',
            'dato' => locationsModel::find($id)
        ]);
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
        $registro = locationsModel::find($id);
        $registro->name = $request->name;
        $registro->type = $request->type;
        $registro->utility = $request->utility;
        $registro->user_id = \Auth::user()->id;
        $registro->save();
        return redirect('logistic/'.$this->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $registro = locationsModel::find($id);
        $registro->flagstate = false;
        $registro->save();
    }
}
