<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_amount',
        'shipping_method',
        'notes'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function orderitems(){
        return $this->hasMany(Orderitem::class);
    }
}
