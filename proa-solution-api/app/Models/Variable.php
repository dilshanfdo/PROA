<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variable extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function weather_station(): BelongsTo
    {
        return $this->belongsTo(WeatherStation::class);
    }
}
