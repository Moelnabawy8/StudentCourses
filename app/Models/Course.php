<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status',"created_at", "updated_at", 'user_id'];
   public function students()
{
    return $this->belongsToMany(Student::class);
}
    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'course_professor', 'course_id', 'professor_id');
    }

}
