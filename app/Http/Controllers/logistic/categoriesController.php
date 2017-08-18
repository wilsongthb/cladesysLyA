<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\categoriesModel;

class categoriesController extends Controller
{
    private $titulo = 'CATEGORIAS';
    private $name = 'categories';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos = categoriesModel::where('flagstate', '1');
        $search = $request->get('search');
        if ($search) {
            $datos = $datos->Where('detail', 'LIKE', '%'.$search.'%');
        }
        $datos = $datos->paginate(10);
        return view('logistic.brands.index', [
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
        return view('logistic.brands.form', [
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
        $registro = new categoriesModel;
        $registro->detail = $request->detail;
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
        return categoriesModel::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('logistic.brands.form', [
            'titulo' => $this->titulo,
            'name' => $this->name,
            'type' => 'edit',
            'dato' => categoriesModel::find($id)
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
        $registro = categoriesModel::find($id);
        $registro->detail = $request->detail;
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
        $registro = categoriesModel::find($id);
        $registro->flagstate = false;
        $registro->save();
    }
}
