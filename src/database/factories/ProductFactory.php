<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word, 
            'price' => $this->faker->numberBetween(100, 10000), 
            'image' => 'default.png', 
            'description' => $this->faker->sentence, 
        ];
    }

    public function configure()
    {
    return $this->afterCreating(function (Product $product) {
        $seasonIds = App\Models\Season::pluck('id')->random(2); 
        $product->seasons()->attach($seasonIds);
    });
}
}


