<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'image',
        'country',
        'phone',
        'address',
        'notes',
        'email',
        'password',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_professor', 'professor_id', 'course_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'professor_id', 'id');
}
}