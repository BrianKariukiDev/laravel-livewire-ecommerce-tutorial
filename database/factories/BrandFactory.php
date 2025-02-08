<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\'brand'>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name'=>$name=fake()->unique()->company(),
            'slug'=>Str::slug($name),
            'image'=>fake()->imageUrl(640,480,'electronics',true,'ecommerce'),
            'is_active'=>fake()->boolean(80),
        ];
    }
}
