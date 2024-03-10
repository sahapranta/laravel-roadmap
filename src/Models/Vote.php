<?php

namespace Sahapranta\LaravelRoadmap\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}
