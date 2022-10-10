<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'txid';
    protected $fillable = ['txid', 'user_customer_id', 'motorcycle_id', 'start_at', 'end_at', 'information', 'total', 'status'];

    public function user_customer(){
        return $this->belongsTo(UserCustomer::class);
    }

    public function motorcycle(){
        return $this->belongsTo(Motorcycle::class);
    }
}
