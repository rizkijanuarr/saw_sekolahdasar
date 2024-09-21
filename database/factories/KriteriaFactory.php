<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kriteria;

class KriteriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kriteria::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'kriteria_kode' => $this->faker->word(),
            'kriteria_nama' => $this->faker->word(),
            'kriteria_tipe' => $this->faker->randomElement(["Benefit","Cost"]),
            'kriteria_bobot' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
