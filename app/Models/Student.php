<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'image',
        'country', 'address', 'phone', 'notes',"created_at", "updated_at"
    ];
   public function courses()
{
    return $this->belongsToMany(Course::class);
}

}
