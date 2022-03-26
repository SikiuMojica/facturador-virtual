<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
			'product_name' => $this->faker->name,
			'product_price' => $this->faker->name,
			'product_tax' => $this->faker->name,
        ];
    }
}
