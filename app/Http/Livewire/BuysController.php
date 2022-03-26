<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Buys;
use App\Models\Invoice;
use App\Models\Product;
use Livewire\WithPagination;

class BuysController extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $selected_id,$product_id,$date,$user_name,$buys,$user_phone,$amount,$product_price,$product_tax,$product_name;
    public $componentName = 'Compras';

    public function render()
    {  
        $buysData = Buys::join('products as u', 'u.id', 'buys.product_id')
            ->select('buys.*', 'u.product_name as productname','u.product_price as productprice','u.product_tax as producttax')
            ->paginate(10);
         
            
        $products = Product::all();

        return view('livewire.buys.buys-controller',[
            'products' => $products,
            'buysData' => $buysData

           
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Store() {
        $rules = [
            'date' => 'required',
            'user_name' => 'required',
            'user_phone' => 'required',
            'product_id' => 'required',
            'amount' => 'required',
        ];
        $messages = [
            'date.required' => 'Fecha requerida',
            'user_name.required' => 'Nombre del Comprador requerido',
            'user_phone.required' => 'Numero Telefonico requerido',
            'product_id.required' => 'Nombre del Producto requerido',
            'amount.required' => 'Cantidad requerida',
        ];
        $this->validate($rules,$messages);

        $buys = Buys::create([
            'date' => $this->date,
            'user_name' => $this->user_name,
            'user_phone' => $this->user_phone,
            'product_id' => $this->product_id,
            'amount' => $this->amount,
        ]);

        if($buys) {
                Invoice::create([
                    'buys_id' => $buys->id,
                    'userId' => Auth()->user()->id
                ]);
        }

        

        $this->ResetData();
        $this->emit('buys-add', 'Compra Realizada con exito');
    }

    public function Edit(Buys $buys) {

        $this->selected_id = $buys->id;
        $this->date = $buys->date;
        $this->user_name = $buys->user_name;
        $this->user_phone = $buys->user_phone;
        $this->product_id = $buys->product_id;
        $this->amount = $buys->amount;

        $this->emit('show-modal', 'show modal');
    }


    public function Update() {
        $rules = [
            'date' => 'required',
            'user_name' => 'required',
            'user_phone' => 'required',
            'product_id' => 'required',
            'amount' => 'required',
        ];
        $messages = [
            'date.required' => 'Fecha requerida',
            'user_name.required' => 'Nombre del Comprador requerido',
            'user_phone.required' => 'Numero Telefonico requerido',
            'product_id.required' => 'Nombre del Producto requerido',
            'amount.required' => 'Cantidad requerida',
        ];
        $this->validate($rules,$messages);

        $buysUpdate = Buys::find($this->selected_id);
        
        $buysUpdate->update([
            'date' => $this->date,
            'user_name' => $this->user_name,
            'user_phone' => $this->user_phone,
            'product_id' => $this->product_id,
            'amount' => $this->amount,
        ]);

        $this->ResetData();
        $this->emit('buys-update', 'Compra actualizada con exito');
    }

    protected $listeners = [
        'destroy' => 'destroy'
    ];

    public function destroy(Buys $buys) {
        $buys->delete();
        $this->resetData();
        $this->emit('buys-delete', 'Compra eliminada correctamente');
    }

    public function ResetData() {
        $this->selected_id = 0;
        $this->date = '';
        $this->user_name = '';
        $this->user_phone = '';
        $this->product_id = '';
        $this->amount = '';
        $this->resetValidation();
    }
}
