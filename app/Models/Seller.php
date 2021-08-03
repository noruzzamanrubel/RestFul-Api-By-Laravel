<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends User
{

    use HasFactory;
    /**
     * @return mixed
     */
    public function products()
    {
        return $this->hasMany( Product::class );
    }
}
