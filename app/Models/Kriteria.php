<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    public function subKriterias(): HasMany
    {
        return $this->hasMany(SubKriteria::class);
    }

    public function listAsessments(): HasMany
    {
        return $this->hasMany(ListAsessment::class);
    }

    public function normalisasiAsessments(): HasMany
    {
        return $this->hasMany(NormalisasiAsessment::class);
    }

    public function perhitunganNormalisasiAsessments(): HasMany
    {
        return $this->hasMany(\App\Models\PerhitunganNormalisasi::class);
    }

    public function perangkinganNormalisasiAsessments(): HasMany
    {
        return $this->hasMany(PerangkinganNormalisasiAsessment::class);
    }
}
