<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    use HasFactory;

    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id',
    ];
    public function buyers() {
        return $this->belongsTo( Buyer::class );
    }

    public function products() {
        return $this->belongsTo( Product::class );
    }
}
