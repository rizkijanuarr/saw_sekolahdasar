<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kriterium;
use App\Models\SubKriteria;

class SubKriteriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubKriteria::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'kriteria_id' => Kriterium::factory(),
            'sub_kriteria_nama' => $this->faker->word(),
            'sub_kriteria_bobot' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
