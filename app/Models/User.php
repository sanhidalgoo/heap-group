<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user password (encrypted)
     * $this->attributes['role'] - string - contains the user role
     * $this->attributes['birthdate'] - Date - contains the user birthdate
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['cash_available'] - string - contains the user cash available
     * $this->attributes['created_at'] - Date - is the user creation date
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'birthdate',
        'address',
        'cash_available',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
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

    public static function validate($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'cash_available' => 'required',
        ]);
    }

    public function favoriteBeers()
    {
        return $this->belongsToMany(Beer::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
