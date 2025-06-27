<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name', 'city_id', 'created_at', 'updated_at'];
    use HasFactory;
    public function city()
{
    return $this->belongsTo(City::class);
}

}
