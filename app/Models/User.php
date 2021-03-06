<?php

// Authors: Juan Sebastián Díaz

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
     *
     * USER RELATIONSHIPS
     * reviews - Review - reviews that belong to the user
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

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setRole($role)
    {
        $this->attributes['role'] = $role;
    }

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function setBirthdate($birthdate)
    {
        $this->attributes['birthdate'] = $birthdate;
    }

    public function getBirthdate()
    {
        return $this->attributes['birthdate'];
    }

    public function setAddress($address)
    {
        $this->attributes['address'] = $address;
    }

    public function getAddress()
    {
        return $this->attributes['address'];
    }

    public function setCashAvailable($cashAvailable)
    {
        $this->attributes['cash_available'] = $cashAvailable;
    }

    public function getCashAvailable()
    {
        return $this->attributes['cash_available'];
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    /* gets the favourite beers of the user */
    public function favoriteBeers()
    {
        return $this->belongsToMany(Beer::class);
    }

    /* gets the reviews made by the user */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
