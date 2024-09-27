<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kriterium;
use App\Models\PerhitunganNormalisasi;
use App\Models\Sekolah;
use App\Models\SubKriterium;

class PerhitunganNormalisasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerhitunganNormalisasi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sekolah_id' => Sekolah::factory(),
            'kriteria_id' => Kriterium::factory(),
            'sub_kriteria_id' => SubKriterium::factory(),
            'nilai_normalisasi_asessment' => $this->faker->randomFloat(2, 0, 999.99),
        ];
    }
}
