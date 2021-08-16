<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class BookingModel extends Eloquent{

	protected $table = "booking";
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 
        'phone_number', 
        'booking_email', 
        'type_of_booking', 
        'booking_date',
        'state',
        'lcda'
    ];

}

?>