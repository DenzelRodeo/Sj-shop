<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'reference', 'total_amount', 'status', 'payment_method'];

    // Une commande appartient à un utilisateur
    public function user() {
        return $this->belongsTo(User::class);
    }
}
