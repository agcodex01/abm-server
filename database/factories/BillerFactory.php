<?php

namespace Database\Factories;

use App\Models\Biller;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Biller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->randomElement([
                Biller::WATER,
                Biller::INTERNET,
                Biller::ELECTRICITY
            ])
        ];
    }
}
