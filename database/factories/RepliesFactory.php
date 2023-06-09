<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
    	'user_id' 	=> function() { return factory('App\User')->create()->id; }, 	
        'comment_id' 	=> function() { return factory('App\Comment')->create()->id; },
        'body' 			=> $faker->sentence
    ];
});
