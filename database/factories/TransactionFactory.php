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
        $biller = Biller::factory()->create();
        $serviceNumber = $this->faker->creditCardNumber();
        $number = $this->faker->phoneNumber();

        return [
            'unit_id' => Unit::factory()->create(),
            'biller_id' => $biller->id,
            'account_id' => $biller->accounts()->create([
                'biller_id' => $biller->id,
                'service_number' => $serviceNumber,
                'number' => $number
            ]),
            'service_number' => $serviceNumber,
            'number' => $number,
            'amount' => $this->faker->numberBetween(100, 500),
            'status' => Transaction::PENDING
        ];
    }
}
