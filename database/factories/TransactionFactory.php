<?php

namespace Database\Factories;

use App\Models\Biller;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit_id' => Unit::factory()->create(),
            'biller_id' => Biller::factory()->create(),
            'service_number' => $this->faker->creditCardNumber(),
            'number' => $this->faker->phoneNumber(),
            'amount' => $this->faker->numberBetween(100, 500),
            'status' => $this->faker->randomElement([Transaction::PENDING, Transaction::REMMITED])
        ];
    }
}
