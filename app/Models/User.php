<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{

    use HasFactory, Notifiable;

    const VARIFIED_USER   = '1';
    const UNVARIFIED_USER = '0';

    const ADMIN_USER   = 'true';
    const REGULAR_USER = 'false';

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'varification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'varification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User varified
     *
     * @return void
     */
    public function isVarified()
    {
        return $this->varified == User::VARIFIED_USER;
    }

    /**
     * Admin Varified
     *
     * @return void
     */
    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }

    /**
     * Generates a 6 digit random code and saves to user column.
     * @return int|mixed
     */
    public function generateVerificationCode()
    {
        $this->varification_token = mt_rand( 100000, 999999 );
        $this->save();

        return $this->varification_token;
    }

    /**
     * Mark user account email verified.
     */
    public function markEmailAsVerified()
    {
        $this->email_verified_at  = Carbon::now();
        $this->varification_token = null;
        $this->save();
    }

    /**
     * Change user password.
     *
     * @param $password
     */
    public function changePassword( $password )
    {
        $this->password = Hash::make( $password );
        $this->save();
    }

    /**
     * mutator function add for name field
     *
     * @param  mixed $name
     * @return void
     */
    public function setNameAttribute( $name )
    {
        $this->attributes['name'] = strtolower( $name );
    }

    /**
     * accessor function add for name field
     *
     * @param  mixed $name
     * @return void
     */
    public function getNameAttribute( $name )
    {
        return ucwords( $name );
    }

    /**
     * mutator function add email field
     *
     * @param  mixed $email
     * @return void
     */
    public function setEmailAttribute( $email )
    {
        $this->attributes['email'] = strtolower( $email );
    }

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
