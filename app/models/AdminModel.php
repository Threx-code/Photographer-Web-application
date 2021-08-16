<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class AdminModel extends Eloquent{

	protected $table = "administrator";
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'email', 'lastname', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function setPasswordAttribute($password){
    	$this->attributes['password'] = bcypt($password);
    }*/
}

?>