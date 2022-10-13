<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $fillable = ['user_owner_id', 'motorcycle_type_id', 'motorcycle_brand_id', 'motorcycle_name', 'production_year', 'police_number', 'motorcycle_photo', 'vehicle_registration', 'description', 'status'];

    public function motorcycle_type(){
        return $this->belongsTo(MotorcycleType::class);
    }

    public function motorcycle_brand(){
        return $this->belongsTo(MotorcycleBrand::class);
    }

    public function user_owner(){
        return $this->belongsTo(UserOwner::class);
    }
}
