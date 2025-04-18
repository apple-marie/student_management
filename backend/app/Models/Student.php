<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'course_id',
        'year_level',
        'email',
        'password',
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
