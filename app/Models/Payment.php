<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['txid', 'user_operator_id', 'invoice', 'evidence_of_transafer', 'paid_date', 'pay', 'status'];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function user_operator(){
        return $this->belongsTo(UserOperator::class);
    }
}
