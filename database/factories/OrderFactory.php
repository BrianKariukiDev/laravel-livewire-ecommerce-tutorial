<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'grand_total' => $this->faker->randomFloat(2, 100, 5000),
            'payment_method' => $this->faker->randomElement(['cod', 'stripe']),
            'payment_status' => $this->faker->randomElement(['pending', 'paid', 'failed']),
            'status' => $this->faker->randomElement(['new', 'processing', 'shipped', 'delivered', 'canceled']),
            'currency' => 'KSH',
            'shipping_amount' => $this->faker->randomFloat(2, 50, 500),
            'shipping_method' => $this->faker->randomElement(['DHL', 'FedEx', 'UPS']),
            'notes' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
