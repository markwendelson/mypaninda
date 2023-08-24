<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status',
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }
	
    public function featuredProducts()
    {
        return $this->hasMany(FeaturedProduct::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function affiliates()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function sponsors()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function encashments()
    {
        return $this->hasMany(Encashment::class);
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function userSetting()
    {
        return $this->hasOne(UserSetting::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }
}
