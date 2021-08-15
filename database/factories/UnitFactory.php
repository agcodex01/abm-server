<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'fund' => $this->faker->numberBetween(10,1000),
            'postal_code' => $this->faker->postcode(),
            'province' => $this->faker->state(),
            'city' => $this->faker->cityPrefix(),
            'municipality' => $this->faker->citySuffix(),
            'barangay' => $this->faker->streetSuffix(),
            'street' => $this->faker->streetAddress()
        ];
    }
}
