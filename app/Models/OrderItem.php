<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function affiliate()
    {
        return $this->belongsTo(User::class, 'affiliate_id')->withDefault();
    }

    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id')->withDefault();
    }
}
