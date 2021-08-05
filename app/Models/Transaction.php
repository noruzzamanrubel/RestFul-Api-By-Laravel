<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id',
    ];
    /**
     * @return mixed
     */
    public function buyers()
    {
        return $this->belongsTo( Buyer::class );
    }

    /**
     * @return mixed
     */
    public function product()
    {
        return $this->belongsTo( Product::class );
    }

}
