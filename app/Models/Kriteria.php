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
        return $this->hasMany(\App\Models\SubKriteria::class);
    }

    public function asessments(): HasMany
    {
        return $this->hasMany(\App\Models\Asessment::class);
    }
}
