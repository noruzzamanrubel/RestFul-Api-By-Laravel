<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    const AVAILABLE_PRODUCT   = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
        'category_id',
    ];

    /**
     * @return mixed
     */
    public function isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    /**
     * @return mixed
     */
    public function categories()
    {
        return $this->belongsToMany( Category::class );
    }

    /**
     * @return mixed
     */
    public function seller()
    {
        return $this->belongsTo( Seller::class );
    }

    /**
     * @return mixed
     */
    public function transactions()
    {
        return $this->hasMany( Transaction::class );
    }
}
