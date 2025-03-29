<?php

namespace Database\Factories;

use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'registered_address' => fake()->address(),
            'billing_address' => fake()->address(),
            'owner_name' => fake()->name(),
            'owner_phone' => fake()->regexify('(\d{3})(\d{3})(\d{4})'),
            'accountant_name' => fake()->name(),
            'delivery_phone' => fake()->regexify('(\d{3})(\d{3})(\d{4})'),
            'owner_email' => fake()->unique()->safeEmail(),
            'payment_terms' => fake()->paragraph(),
            'gst_no' => fake()->regexify('(\d{3})(\d{3})(\d{4})'),
            'gst_date' => fake()->date('Y-m-d'),
            'discount' => fake()->randomNumber(2),
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static {
    }
}
