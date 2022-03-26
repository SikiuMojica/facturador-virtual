<?php

namespace App\Http\Livewire;


use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductController extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $selected_id,$product_name,$product_price,$product_tax;
    public $componentName = 'Productos';

    public function render()
    {

        $productData = Product::orderBy('id', 'asc')->paginate(5);

        return view('livewire.product.product-controller',[
            'productData' => $productData,
           
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Store() {
        $rules = [
        'product_name' => 'required',
        'product_price' => 'required',
        'product_tax' => 'required',
        ];
        $messages = [
            'product_name.required' => 'Nombre del Producto requerido',
            'product_price.required' => 'Precio del Producto requerido',
            'product_tax.required' => 'Impuesto del Producto requerido',
        ];
        $this->validate($rules,$messages);

        Product::create([
            
            'product_name' => $this->product_name,
            'product_price' => $this->product_price,
            'product_tax' => $this->product_tax,
        ]);

        $this->ResetData();
        $this->emit('product-add', 'Producto agregado correctamente');
    }

    public function Edit(Product $product) {

        $this->selected_id = $product->id;
        $this->product_name = $product->product_name;
        $this->product_price = $product->product_price;
        $this->product_tax = $product->product_tax;

        $this->emit('show-modal', 'show modal');
    }


    public function Update() {
        $rules = [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_tax' => 'required',
            ];
            $messages = [
                'product_name.required' => 'Nombre del Producto requerido',
                'product_price.required' => 'Precio del Producto requerido',
                'product_tax.required' => 'Impuesto del Producto requerido',
            ];
        $this->validate($rules,$messages);

        $buysUpdate = Product::find($this->selected_id);
        
        $buysUpdate->update([
            $this->product_name = $this->product_name,
            $this->product_price = $this->product_price,
            $this->product_tax = $this->product_tax,
        ]);

        $this->ResetData();
        $this->emit('product-update', 'Producto actualizado correctamente');
    }

    protected $listeners = [
        'destroy' => 'destroy'
    ];

    public function destroy(Product $buys) {
        $buys->delete();
        $this->resetData();
        $this->emit('product-delete', 'Producto eliminado correctamente');
    }

    public function ResetData() {
        $this->selected_id = 0;
        $this->product_name = '';
        $this->product_price = '';
        $this->product_tax = '';
        $this->resetValidation();
    }
}
