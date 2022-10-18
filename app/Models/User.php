<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'status',
        'image',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_address(){
        return $this->hasMany(UserAddress::class);
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    
    public function user_owner(){
        return $this->hasOne(UserOwner::class);
    }

    public function user_customer(){
        return $this->hasOne(UserCustomer::class);
    }

    public function user_operator(){
        return $this->hasOne(UserOperator::class);
    }
}
