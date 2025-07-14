<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;


    protected $fillable = [
       'title',
       'description',
       'start_date',
       'end_date',

    ];


    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->using(Enrollment::class);
    }
}


