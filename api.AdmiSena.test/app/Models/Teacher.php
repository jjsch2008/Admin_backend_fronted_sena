<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    protected $fillable = ['name', 'email', 'area_id', 'training_center_id'];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function trainingCenter(): BelongsTo
    {
        return $this->belongsTo(TrainingCenter::class, 'training_center_id');
    }

    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class, 'course_teacher', 'course_id', 'teacher_id');
    }
}
