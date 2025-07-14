<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Enrollment extends Pivot
{
    use HasFactory;
    public $table = 'enrollments';
    //por tener una tabla pivot personalizada
    public $incrementing = true;

    protected $fillable = [
        'student_id',
        'course_id',
        'enrolled_at',
    ];
}
