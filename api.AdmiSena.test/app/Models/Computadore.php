<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computadore extends Model
{
    protected $fillable = ['marca', 'numero'];

    public function aprendices(): HasMany
    {
        return $this->hasMany(Aprendice::class, 'computer_id');
    }
}
