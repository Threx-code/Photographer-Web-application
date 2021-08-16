<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class PostedImagesModel extends Eloquent{

	protected $table = "images";
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'images', 
        'image_title', 
        'description' 
    ];



}

?>