<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    public $table = "car_models";
    public $timestamps = true;

    public function car_body()
    {
        return $this->belongsTo(CarBody::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
