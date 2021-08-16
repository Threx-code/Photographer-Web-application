<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class AdminApproveModel extends Eloquent{

	protected $table = "administrator";
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'email', 'lastname', 'password'
    ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

   
}

?>