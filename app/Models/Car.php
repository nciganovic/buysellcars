<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $table = "cars";
    public $timestamps = true;

    public function car_model()
    {
        return $this->belongsTo(CarModel::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

    public function engine_emission()
    {
        return $this->belongsTo(EngineEmission::class);
    }
}
