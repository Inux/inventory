<?php

namespace App\Models;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;
    use Taggable;

    public function address(): HasOne {
        return $this->hasOne(Address::class);
    }

    public function contact(): HasOne {
        return $this->hasOne(Contact::class);
    }

    public function image(): HasOne {
        return $this->hasOne(Image::class);
    }

    public function buildings(): HasMany {
        return $this->hasMany(Building::class);
    }

    public function areas(): HasMany {
        return $this->hasMany(Area::class);
    }
}
