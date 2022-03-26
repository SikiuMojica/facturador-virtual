<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Invoice;
use Carbon\Carbon;

class ExportController extends Controller
{
    
    // REPORTES PARA CITAS
    public function reportPDF($buysType,$buysFrom = null,$buysTo = null) {
        $invoiceData = [];
        

        if($buysType == 0) {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d' . ' 00:00:00');
            $to = Carbon::parse(Carbon::now())->format('Y-m-d' . ' 23:59:59');
            $invoiceData = Invoice::join('buys as u', 'u.id', 'invoices.buys_id')
            ->join('users as us', 'us.id', 'invoices.userId')
            ->join('products as p', 'p.id', 'u.product_id')
            ->select('invoices.*', 'p.product_name as productName','p.product_price as productPrice','p.product_tax as productTax', 'us.name as userName', 'u.date as dateid', 'u.user_name as username', 
            'u.user_phone as userphone', 'u.product_id as productid', 'u.amount as amountid')->whereBetween('invoices.created_at', [$from,$to])->get();
        } else {
            $from = Carbon::parse($buysFrom)->format('Y-m-d' . ' 00:00:00');
            $to = Carbon::parse($buysTo)->format('Y-m-d' . ' 23:59:59');
            $invoiceDate = Invoice::join('buys as u', 'u.id', 'invoices.buys_id')
            ->join('users as us', 'us.id', 'invoices.userId')
            ->join('products as p', 'p.id', 'u.product_id')
            ->select('invoices.*', 'p.product_name as productName','p.product_price as productPrice','p.product_tax as productTax', 'us.name as userName', 'u.date as dateid', 'u.user_name as username', 
            'u.user_phone as userphone', 'u.product_id as productid', 'u.amount as amountid')->whereBetween('invoices.created_at', [$from,$to])->get();
        }

        $pdf = PDF::loadView('pdf.reportee-invoices', compact('invoiceData','buysType','buysFrom','buysTo'));

        return $pdf->stream('reportefactura.pdf'); // visualizar
        return $pdf->download('reportefactura.pdf'); // descargar
    }

}
