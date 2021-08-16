<?php

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('administrator', function($table){
	$table->id();
	$table->string('firstname');
	$table->string('lastname');
	$table->string('email')->unique();
	$table->string('profile_image');
	$table->string('priority');
	$table->rememberToken();
	$table->timestamps();
});


Capsule::schema()->create('images', function($table){
	$table->id();
	$table->string('images');
	$table->string('image_title');
	$table->text('description');
	$table->timestamps();
});

Capsule::schema()->create('contact', function($table){
	$table->id();
	$table->string('fullname');
	$table->string('phone_number');
	$table->string('email');
	$table->text('message');
	$table->timestamps();
});

Capsule::schema()->create('booking', function($table){
	$table->id();
	$table->string('fullname');
	$table->string('phone_number');
	$table->string('booking_email');
	$table->string('type_of_booking');
	$table->string('booking_date');
	$table->string('state');
	$table->string('lcda');
	$table->string('decision');
	$table->timestamps();
});


Capsule::schema()->create('states', function($table){
	$table->id();
	$table->string('states');
	$table->string('lcda');
	$table->timestamps();
});


?>