<?php

namespace Sahapranta\LaravelRoadmap\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $keyType = 'string';

    public $incrementing = false;

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
