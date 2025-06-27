<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use SoftDeletes;
    protected $fillable = ['country_name',"status","created_at","updated_at"];
    use HasFactory;
     public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeOrder($query)
    {
        return $query->orderby("id", "desc");
    }
    public function cities()
{
    return $this->hasMany(City::class);
}

public function people()
{
    return $this->hasManyThrough(Person::class, City::class);
}
    public function flight()
    {
        return $this->hasMany(Flight::class);
    }
    public function destination()
{
    return $this->hasOne(Destination::class, 'country_id');
}




}
