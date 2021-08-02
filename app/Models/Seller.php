<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends User {

    use HasFactory;
    public function produts() {
        return $this->hasMany( Product::class );
    }
}
