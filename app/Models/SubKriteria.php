<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubKriteria extends Model
{
    use HasFactory;

    public function asessments(): HasMany
    {
        return $this->hasMany(\App\Models\Asessment::class);
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Kriteria::class);
    }
}
