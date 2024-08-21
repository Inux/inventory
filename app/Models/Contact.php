<?php

namespace App\Models;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model
{
    use HasFactory;
    use Taggable;

    public function address(): HasOne {
        return $this->hasOne(Address::class);
    }

    public function image(): HasOne {
        return $this->hasOne(Image::class);
    }
}
