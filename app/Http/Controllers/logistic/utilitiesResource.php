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
use App\productsModel;
use App\ProductOptions as product_optionsModel;

class utilitiesResource extends Controller
{
    public function product_options(){
        $po = DB::select(DB::raw(
        "SELECT
            l.name AS LOCALIZACION,
            c.detail AS CATEGORIA,
            p.detail AS DESCRIPCION,
            b.detail AS MARCA,
            p.detail AS 'MEDIDA DE COMPRA',
            p.units AS 'CANTIDAD',
            m.detail AS 'MEDIDA DE DISTRIBUCION',
            po.minimum AS 'STOCK MINIMO',	
            po.permanent AS 'STOCK PERMANENTE',
            po.duration AS 'ANILISIS EN MESES'
        FROM products AS p
        LEFT JOIN product_options AS po ON p.id = po.products_id
        LEFT JOIN categories AS c ON c.id = p.categories_id
        LEFT JOIN brands AS b ON b.id = p.brands_id
        LEFT JOIN measurements AS m ON m.id = p.measurements_id
        LEFT JOIN packings AS pa ON pa.id = p.packings_id 
        LEFT JOIN locations AS l ON l.id = po.locations_id"));
        return view('logistic.product-options', ['po' => $po]);
    }
    public function ffp(Request $request){
        $fila = new productsModel;
        $fila->packings_id = $request->p_packings_id;
        $fila->units = $request->p_units;
        $fila->detail = $request->p_detail;
        $fila->brands_id = $request->p_brands_id;
        $fila->categories_id = $request->p_categories_id;
        $fila->measurements_id = $request->p_measurements_id;
        $fila->user_id = $request->user_id;
        $fila->save();

        $po = new product_optionsModel;
        $po->minimum = $request->po_minimum;
        $po->permanent = $request->po_permanent;
        $po->duration = $request->po_duration;
        $po->products_id = $fila->id;
        $po->locations_id = $request->po_locations_id;
        $po->user_id = $request->user_id;
        $po->save();

        return "ok";

        // dd($request->all());
    }
    public function stock(Request $request){
        $location = "";
        if($request->locations_id){
            $locations_id = (int)$request->locations_id;
            $location = "AND i.locations_id = $locations_id";
        }
        $sql = "SELECT
                    s.*
                FROM (
                    SELECT
                        id.id AS id,
                        p.id AS products_id,
                        l.name AS ubicacion,
                        c.detail AS categoria,
                        p.detail AS product_name,
                        id.created_at AS fecha_entrada,
                        id.quantity AS cantidad_entrada,
                        SUM(IFNULL(od.quantity, 0)) AS total_salidas,
                        (id.quantity - SUM(IFNULL(od.quantity, 0))) AS stock,
                        MAX(od.created_at) AS fecha_ultima_salida
                    FROM input_details AS id
                    LEFT JOIN products AS p ON p.id = id.products_id
                    LEFT JOIN output_details AS od ON id.id = od.input_details_id
                    LEFT JOIN inputs AS i ON i.id = id.inputs_id
                    LEFT JOIN locations AS l ON l.id = i.locations_id
                    LEFT JOIN categories AS c ON c.id = p.categories_id
                    WHERE IFNULL(od.flagstate, 1) = 1
                    $location
                    GROUP BY id.id
                ) AS s
                WHERE s.stock > 0";
        return DB::select(DB::raw($sql));
    }
    public function purchase(Request $request){
        $location = "";
        if($request->locations_id){
            $locations_id = (int)$request->locations_id;
            $location = "AND i.locations_id = $locations_id";
        }
        return DB::select(DB::raw(
        "SELECT
            s.*,
            (s.total_entradas - s.total_salidas) AS stock_total
        FROM (
            SELECT
                po.id,
                p.id AS products_id,
                po.locations_id AS locations_id,
                p.detail AS products_detail,
                l.name AS locations_name,
                po.minimum AS po_minimum, 
                po.permanent AS po_permanent,
                po.duration AS po_duration,
                SUM(IFNULL(id.quantity, 0)) AS total_entradas,
                SUM(IFNULL(od.quantity, 0)) AS total_salidas,
                MAX(od.created_at) AS ultima_salida
            FROM product_options AS po
            LEFT JOIN products AS p ON p.id = po.products_id
            LEFT JOIN input_details AS id ON id.products_id = po.products_id
            LEFT JOIN inputs AS i ON i.id = id.inputs_id
            LEFT JOIN output_details AS od ON od.input_details_id = id.id
            JOIN locations AS l ON l.id = po.locations_id
            WHERE IFNULL(od.flagstate, 1) = 1
            
            AND IFNULL(i.locations_id, $locations_id) = $locations_id
            AND po.locations_id = $locations_id
            -- ORDER BY po.id DESC
            GROUP BY po.products_id
        ) AS s"));
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
        return $result->paginate(10000);
    }
    public function categories(Request $request)
    {
        $result = categoriesModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(10000);
    }
    public function measurements(Request $request)
    {
        $result = measurementsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(10000);
    }
    public function packings(Request $request)
    {
        $result = packingsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(10000);
    }
    public function locations(Request $request)
    {
        $result = locationsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('name', 'LIKE', "%$request->search%");
        }
        return $result->paginate(10000);
    }
    public function tickets(Request $request)
    {
        $result = ticketsModel::where('flagstate', '1');
        if(strlen($request->search) > 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('name', 'LIKE', "%$request->search%");
        }
        return $result->paginate(10000);
    }
}
