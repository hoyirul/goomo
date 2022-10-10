<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $fillable = ['motorcycle_type_id', 'motorcycle_brand_id', 'motorcycle_name', 'product_year', 'police_number', 'motorcycle_photo', 'vehicle_registration', 'description'];

    public function motorcycletype(){
        return $this->belongsTo(MotorcycleType::class);
    }

    public function motorcyclebrand(){
        return $this->belongsTo(MotorcycleBrand::class);
    }
}
