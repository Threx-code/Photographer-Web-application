<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ContactModel extends Eloquent{

	protected $table = "contact";
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 
        'phone_number', 
        'email', 
        'message' 
    ];

}

?>