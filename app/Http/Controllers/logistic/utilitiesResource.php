<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\brandsModel;
use App\locationsModel;
use App\measurementsModel;
use App\categoriesModel;
use App\packingsModel;
use App\ticketsModel;
use DB;

class utilitiesResource extends Controller
{
    public function stock(){
        return DB::select(DB::raw("SELECT
	s.*
FROM (
	SELECT
		id.id AS id,
		p.id AS products_id,
		pa.detail AS pa_detail,
		p.units AS products_units,
		p.detail AS products_detail,
		id.quantity AS entrada,
		id.created_at AS fecha_entrada,
		SUM(IFNULL(od.quantity, 0)) AS salidas,
		id.quantity - SUM(IFNULL(od.quantity, 0)) AS stock, 
		IFNULL(l.name, 'null') AS locations_name,
		IFNULL(po.minimum, 0) AS po_minimum,
		IFNULL(po.permanent, 0) AS po_permanent,
		IFNULL(po.duration, 0) AS po_duration
	FROM input_details AS id
	LEFT JOIN inputs AS i ON i.id = id.inputs_id
	LEFT JOIN output_details AS od ON od.input_details_id = id.id
	LEFT JOIN products AS p ON p.id = id.products_id
	LEFT JOIN product_options AS po ON p.id = po.products_id
	LEFT JOIN locations AS l ON l.id = po.locations_id
	LEFT JOIN packings AS pa ON pa.id = p.packings_id
	WHERE i.locations_id = 1 
	AND po.locations_id = 1
GROUP BY id.id
) AS s
WHERE s.stock > 0"));
    }
    public function purchase(){
        return DB::select(DB::raw("SELECT
	s.*,
	SUM(s.stock) AS stock_total
FROM (
	SELECT
		id.id AS id,
		p.id AS products_id,
		pa.detail AS pa_detail,
		p.units AS products_units,
		p.detail AS products_detail,
		id.quantity AS entrada,
		id.created_at AS fecha_entrada,
		od.created_at AS fecha_salida,
		SUM(IFNULL(od.quantity, 0)) AS salidas,
		id.quantity - SUM(IFNULL(od.quantity, 0)) AS stock, 
		IFNULL(l.name, 'null') AS locations_name,
		IFNULL(po.minimum, 0) AS po_minimum,
		IFNULL(po.permanent, 0) AS po_permanent,
		IFNULL(po.duration, 0) AS po_duration
	FROM input_details AS id
	LEFT JOIN inputs AS i ON i.id = id.inputs_id
	LEFT JOIN output_details AS od ON od.input_details_id = id.id
	LEFT JOIN products AS p ON p.id = id.products_id
	LEFT JOIN product_options AS po ON p.id = po.products_id
	LEFT JOIN locations AS l ON l.id = po.locations_id
	LEFT JOIN packings AS pa ON pa.id = p.packings_id
	WHERE i.locations_id = 1 
	AND po.locations_id = 1
	GROUP BY id.id
	ORDER BY id.created_at, od.created_at DESC
) AS s
GROUP BY s.products_id"));
    }
    public function trabajando(){ 
        return "
            <img src='./images/giphy.gif' alt='Trabajando'>
            <p><strong>En construccion...</strong></p>
        "; 
    }
    public function main(Request $request){ 
        // ruta especial, ignora los argumentos y los pasa a angular-route
        if($request->ajax() OR $request->isJson() OR $request->expectsJson()){
            dd([
                'ajax' => $request->ajax(),
                'isJson' => $request->isJson(),
                'expectsJson' => $request->expectsJson()
            ]);
        }
        return view('logistic.angular');
    }
    public function gentelella(Request $request){ 
        // ruta especial, ignora los argumentos y los pasa a angular-route
        if($request->ajax() OR $request->isJson() OR $request->expectsJson()){
            dd([
                'ajax' => $request->ajax(),
                'isJson' => $request->isJson(),
                'expectsJson' => $request->expectsJson()
            ]);
        }
        return view('logistic.gentelella');
    }
    public function brands(Request $request)
    {
        $result = brandsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(50);
    }
    public function categories(Request $request)
    {
        $result = categoriesModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(50);
    }
    public function measurements(Request $request)
    {
        $result = measurementsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(50);
    }
    public function packings(Request $request)
    {
        $result = packingsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(50);
    }
    public function locations(Request $request)
    {
        $result = locationsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('name', 'LIKE', "%$request->search%");
        }
        return $result->paginate(50);
    }
    public function tickets(Request $request)
    {
        $result = ticketsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('name', 'LIKE', "%$request->search%");
        }
        return $result->paginate(50);
    }
}
