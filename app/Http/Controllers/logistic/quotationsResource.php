<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\quotationsModel;
use App\ordersModel;
use App\order_detailsModel;
use DB;

class quotationsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        return [
            // 'data' => order_detailsModel::
            //     select(
            //         'p.detail AS products_detail',
            //         'od.*'
            //     )
            //     ->from('order_details AS od')
            //     ->leftJoin('products AS p', 'p.id', '=', 'od.products_id')
            //     ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
            //     ->where('o.id', $id)
            //     ->get(),
            'quotations' => quotationsModel::
                select(
                    // 'od.id AS order_details_id',
                    // 'p.detail',
                    // 'od.quantity',
                    // 's.company_name',
                    'q.*'
                )
                ->from('quotations AS q')
                ->leftJoin('order_details AS od', 'od.id', '=', 'q.order_details_id')
                ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
                ->leftJoin('suppliers AS s', 's.id', '=', 'q.suppliers_id')
                ->leftJoin('products AS p', 'p.id', '=', 'od.products_id')
                ->where('o.id', $id)
                ->get(),
            'suppliers' => quotationsModel::
                select(
                    // 's.id',
                    // 's.company_name',
                    // 's.contact_name'
                    's.*'
                )
                ->from('quotations AS q')
                ->leftJoin('order_details AS od', 'od.id', '=', 'q.order_details_id')
                ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
                ->leftJoin('suppliers AS s', 's.id', '=', 'q.suppliers_id')
                ->where('o.id', $id)
                ->groupBy('id')
                ->get(),
        ];
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
        $fila = new quotationsModel;
        $fila->user_id = $request->user_id;
        $fila->order_details_id = $request->order_details_id;
        $fila->unit_price = $request->unit_price;
        $fila->suppliers_id = $request->suppliers_id;
        $fila->save();

        $detail = order_detailsModel::find($request->order_details_id);
        $order = ordersModel::find($detail->orders_id);
        if($order->status == "1"){
            $order->status = "2";
            $order->save();
        }
        return $fila;
        // return "ok";
        
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
        return [
            'data' => order_detailsModel::
                select(
                    'p.detail AS products_detail',
                    'od.*'
                )
                ->from('order_details AS od')
                ->leftJoin('products AS p', 'p.id', '=', 'od.products_id')
                ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
                ->where('o.id', $id)
                ->get(),
            'quotations' => quotationsModel::
                select(
                    'od.id AS order_details_id',
                    // 'p.detail',
                    'od.quantity',
                    's.company_name',
                    'q.*'
                )
                ->from('quotations AS q')
                ->leftJoin('order_details AS od', 'od.id', '=', 'q.order_details_id')
                ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
                ->leftJoin('suppliers AS s', 's.id', '=', 'q.suppliers_id')
                ->leftJoin('products AS p', 'p.id', '=', 'od.products_id')
                ->where('o.id', $id)
                ->get(),
            'suppliers' => quotationsModel::
                select(
                    's.id',
                    's.company_name',
                    's.contact_name'
                )
                ->from('quotations AS q')
                ->leftJoin('order_details AS od', 'od.id', '=', 'q.order_details_id')
                ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
                ->leftJoin('suppliers AS s', 's.id', '=', 'q.suppliers_id')
                ->where('o.id', $id)
                ->groupBy('id')
                ->get(),
        ];
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
        $fila = quotationsModel::find($id);
        $fila->unit_price = $request->unit_price;
        $fila->user_id = $request->user_id;
        $fila->status = $request->status;
        $fila->save();
        return $fila;
        // return "ok";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        quotationsModel::destroy($id);
    }
    
    public function masBaraPe(Request $request){
        DB::table('quotations AS q')
            ->leftJoin('order_details AS od', 'od.id', '=', 'q.order_details_id')
            ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
            ->where('o.id', $request->id)
            ->update(
                ['q.status' => 0]
            );

        $quotations = quotationsModel::
        select(
            'od.id AS order_details_id',
            // 'p.detail',
            'od.quantity',
            's.company_name',
            'q.*'
        )
        ->from('quotations AS q')
        ->leftJoin('order_details AS od', 'od.id', '=', 'q.order_details_id')
        ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
        ->leftJoin('suppliers AS s', 's.id', '=', 'q.suppliers_id')
        ->leftJoin('products AS p', 'p.id', '=', 'od.products_id')
        ->where('o.id', $request->id)
        ->get();

        // dd($quotations);
        
        $qs = [];

        foreach($quotations as $key => $val){
            if(!isset($qs[$val->order_details_id])){
                $qs[$val->order_details_id] = [];
                $qs[$val->order_details_id][$val->suppliers_id] = $val;
            }else{
                $qs[$val->order_details_id][$val->suppliers_id] = $val;
            }
        }

        // dd($qs);
        $mins = [];

        foreach ($qs as $key => $value) {
            $min = -1;
            foreach ($value as $ll => $vals) {
                $vals->status = 0;
                // $vals->save();
                if($min === -1){$min = $vals;}
                $min = ($min->unit_price > $vals->unit_price) ? $vals : $min;
            }
            // $mins[] = $min->id;
            $min->status = 1;
            $min->save();
        }
        
        // foreach ($mins as $key => $value) {
            
        // }

        dd($qs);
    }
}
