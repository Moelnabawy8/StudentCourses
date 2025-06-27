<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
        'country_id',
        'created_at',
        'updated_at'
    ];
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
   public function country()
{
    return $this->belongsTo(Country::class, 'country_id');
}


}
