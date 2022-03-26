<?php

namespace Database\Seeders;
use App\Models\Product;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->product_name = "Producto1";
        $product->product_price = "125.45";
        $product->product_tax = "5";
        $product->save();

        $product1 = new Product();
        $product1->product_name = "Producto2";
        $product1->product_price = "45.65";
        $product1->product_tax = "15";
        $product1->save();

        $product2 = new Product();
        $product2->product_name = "Producto3";
        $product2->product_price = "39.73";
        $product2->product_tax = "12";
        $product2->save();

        $product3 = new Product();
        $product3->product_name = "Producto4";
        $product3->product_price = "250.00";
        $product3->product_tax = "8";
        $product3->save();

        $product4 = new Product();
        $product4->product_name = "Producto5";
        $product4->product_price = "59.35";
        $product4->product_tax = "10";
        $product4->save();
    }
}
