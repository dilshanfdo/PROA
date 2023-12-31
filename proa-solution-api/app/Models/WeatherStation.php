<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeatherStation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function variable(): HasMany
    {
        return $this->hasMany(Variable::class);
    }
}
