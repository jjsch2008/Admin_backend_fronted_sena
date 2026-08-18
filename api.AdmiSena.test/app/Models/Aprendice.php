<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aprendice extends Model
{
    protected $fillable = ['name', 'email', 'cell_number', 'curso_id', 'computer_id'];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    public function computador(): BelongsTo
    {
        return $this->belongsTo(Computadore::class, 'computer_id');
    }
}
