<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorcycleType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    public function motorcycle(){
        return $this->hasMany(Motorcycle::class);
    }
}
