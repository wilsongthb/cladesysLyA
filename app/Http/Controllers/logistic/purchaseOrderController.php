<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\fpdf181\fpdf AS FPDF;
use App\ordersModel;
use App\order_detailsModel;
use App\quotationsModel;
use App\suppliersModel;

class purchaseOrderController extends Controller
{
    public function pdfPurchaseOrder($orders_id, $suppliers_id){
        // generando PDF
        // require(app_path() .  '/fpdf181/fpdf.php');
        // $pdf = new FPDF();
        // $pdf->AddPage();
        // $pdf->SetFont('Arial','B',16);
        
        // $pdf->Cell(40,14,'ORDEN DE COMPRA');
        // $pdf->Output();
        // exit;
        // return [$orders_id, $suppliers_id];
        $proveedor = suppliersModel::find($suppliers_id);
        $filas = quotationsModel::
            select(
                'p.detail',
                'od.quantity AS od_quantity',
                'q.*'
            )
            ->from('quotations AS q')
            ->leftJoin('order_details AS od', 'od.id', '=', 'q.order_details_id')
            ->leftJoin('products AS p', 'p.id', '=', 'od.products_id')
            ->leftJoin('orders AS o', 'o.id', '=', 'od.orders_id')
            ->where('q.suppliers_id', $suppliers_id)
            ->where('q.status', 1)
            ->get();

        return view('logistic.purchase_order', [
            'filas' => $filas,
            'proveedor' => $proveedor
        ]);
    }
}
