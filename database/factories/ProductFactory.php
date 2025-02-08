<?php

namespace Database\Factories;

use App\Models\brand;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\'product'>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Wireless Headphones', 'Gaming Laptop', 'Smartphone', 'Running Shoes', 
            'Leather Wallet', 'Bluetooth Speaker', '4K Smart TV', 'Office Chair', 
            'Smartwatch', 'Coffee Maker'
        ];

        return [
            'category_id'=>category::inRandomOrder()->value('id'),
            'brand_id'=>brand::inRandomOrder()->value('id'),
            'name'=>$name=fake()->unique()->randomElement($productNames),
            'slug'=>Str::slug($name),
            'images'=>json_encode([collect(range(1,fake()->numberBetween(1,5)))
                ->map(fn()=>fake()->imageUrl(640,480,'electronics',true,'ecommerce'))]),
            'description'=>fake()->sentence(20),
            'price'=>fake()->numberBetween(1000, 100000),
            'is_active'=>fake()->boolean(80),
            'is_featured'=>fake()->boolean(10),
            'in_stock'=>fake()->boolean(90),
            'on_sale'=>fake()->boolean(),
        ];
    }
}
