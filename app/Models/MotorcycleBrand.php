<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorcycleBrand extends Model
{
    use HasFactory;

    protected $fillable = ['brand_name'];

    public function motorcycle(){
        return $this->hasMany(Motorcycle::class);
    }
}
