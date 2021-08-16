<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class SignupModel extends Eloquent{

	 protected $fillable = [
        'firstname', 
        'lastname', 
        'email', 
        'email_verified_at', 
        'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token', 
    ];

      protected $table = 'administrator';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}

?>