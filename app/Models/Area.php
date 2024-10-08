<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;

    public function rooms(): HasMany {
        return $this->hasMany(Room::class);
    }

    public function locations(): HasMany {
        return $this->hasMany(Location::class);
    }
}
