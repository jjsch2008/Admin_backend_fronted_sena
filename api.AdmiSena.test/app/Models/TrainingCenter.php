<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingCenter extends Model
{
    protected $fillable = ['name', 'location'];

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }
}
