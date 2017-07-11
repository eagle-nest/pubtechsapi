<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Users extends Model 
{
    const ROLE_SUPER_ADMIN = 'superadmin';
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    protected $table = 'users';
    protected $fillable = [
      'name','email','password','phone', 'city', 'address', 'user_role', 'seller_type',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}