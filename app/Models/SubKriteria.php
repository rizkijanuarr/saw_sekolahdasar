<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubKriteria extends Model
{
    use HasFactory;

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
        return $this->hasMany(PerhitunganNormalisasiAsessment::class);
    }

    public function perangkinganNormalisasiAsessments(): HasMany
    {
        return $this->hasMany(PerangkinganNormalisasiAsessment::class);
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class);
    }
}
