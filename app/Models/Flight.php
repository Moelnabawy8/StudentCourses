<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ['flight_name',"created_at","updated_at"];
    use HasFactory;
    public function destination()
    {
        return $this->hasone(Destination::class);
    }
}
