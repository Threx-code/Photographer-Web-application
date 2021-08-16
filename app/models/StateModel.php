<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class StateModel extends Eloquent{

	protected $table = "states";
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'states', 
        'lcda' 
    ];

}

?>