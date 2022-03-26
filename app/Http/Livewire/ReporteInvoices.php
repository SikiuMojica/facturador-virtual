<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use Carbon\Carbon;

class ReporteInvoices extends Component
{
    public $componentName,$buys,$buysType,$buysFrom,$buysTo,$invoiceDat;
    
    public function mount() {
        $this->componentName = 'Facturador';
        $this->invoiceData = [];
        $this->buysType = 0;
    }
    
    public function render()
    {
        $this->DatesByDate();
        return view('livewire.invoice.reporte-invoices')
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function DatesByDate() {
        // ventas del dia
        if($this->buysType == 0) {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d' . ' 00:00:00');
            $to = Carbon::parse(Carbon::now())->format('Y-m-d' . ' 23:59:59');
        } else {
            $from = Carbon::parse($this->buysFrom)->format('Y-m-d' . ' 00:00:00');
            $to = Carbon::parse($this->buysTo)->format('Y-m-d' . ' 23:59:59');
        }

        if($this->buysType == 1 && ($this->buysFrom == '' || $this->buysTo == '')) {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d' . ' 00:00:00');
            $to = Carbon::parse(Carbon::now())->format('Y-m-d' . ' 23:59:59');
        }

        if($this->buysType == 0) {
            
            $this->invoiceData = Invoice::join('buys as u', 'u.id', 'invoices.buys_id')
            ->join('users as us', 'us.id', 'invoices.userId')
            ->join('products as p', 'p.id', 'u.product_id')
            ->select('invoices.*', 'p.product_name as productName','p.product_price as productPrice','p.product_tax as productTax', 'us.name as userName', 'u.date as dateid', 'u.user_name as username', 
            'u.user_phone as userphone', 'u.product_id as productid', 'u.amount as amountid')->whereBetween('invoices.created_at', [$from,$to])->get();
           } else {
            $this->invoiceDate = Invoice::join('buys as u', 'u.id', 'invoices.buys_id')
            ->join('users as us', 'us.id', 'invoices.userId')
            ->join('products as p', 'p.id', 'u.product_id')
            ->select('invoices.*', 'p.product_name as productName','p.product_price as productPrice','p.product_tax as productTax', 'us.name as userName', 'u.date as dateid', 'u.user_name as username', 
            'u.user_phone as userphone', 'u.product_id as productid', 'u.amount as amountid')->whereBetween('invoices.created_at', [$from,$to])->get();
        }
         
          
    }
}
