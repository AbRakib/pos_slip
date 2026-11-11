<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_no' => fake()->unique()->bothify('INV-########'),
            'customer_id' => Customer::factory(),
            'user_id' => User::factory(),
            'subtotal' => 100,
            'discount' => 0,
            'total' => 100,
            'paid_amount' => 100,
            'payment_method' => 'cash',
        ];
    }
}
