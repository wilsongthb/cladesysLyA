<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class purchaseOrderController extends Controller
{
    public function pdfPurchaseOrder($orders_id, $suppliers_id){
        return [$orders_id, $suppliers_id];
    }
}
