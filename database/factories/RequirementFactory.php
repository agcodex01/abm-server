<?php

namespace Database\Factories;

use App\Models\Biller;
use App\Models\Requirement;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequirementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Requirement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'biller_id' => Biller::factory()->create(),
            'service_number' => $this->faker->unique()->uuid(),
            'number' => $this->faker->phoneNumber(),
            'other' => [ 'email' => $this->faker->unique()->safeEmail()]
        ];
    }
}
