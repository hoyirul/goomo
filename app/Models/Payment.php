<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['txid', 'user_operator_id', 'user_customer_id', 'invoice', 'evidence_of_transfer', 'paid_date', 'pay', 'status'];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'txid', 'txid');
    }

    public function user_operator(){
        return $this->belongsTo(UserOperator::class);
    }

    public function user_customer(){
        return $this->belongsTo(UserCustomer::class);
    }
}
