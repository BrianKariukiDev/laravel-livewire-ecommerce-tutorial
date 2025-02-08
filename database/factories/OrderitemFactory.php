<?php

namespace Database\Factories;

use App\Models\order;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\'orderitem'>
 */
class OrderitemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'=>order::factory(),
            'product_id'=>product::inRandomOrder()->value('id'),
            'quantity'=>fake()->numberBetween(1, 20),
            'unit_amount'=>fn(array $attributes)=>product::find($attributes['product_id'])->price,
            'total_amount'=>fn(array $attributes)=>$attributes['unit_amount']*$attributes['quantity'],
        ];
    }
}
