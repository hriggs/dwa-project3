<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Faker\Factory as Faker;

class RandomUserController extends Controller {
	
    public function __construct() {
    		# Put anything here that should happen before any of the other actions
    }
    
   /**
    * Responds to requests to GET /random-user
    */
    public function getIndex() {

      	return view("user.index")->with('text', $this->generateUserData());
    }
    
   /**
    * Generate user data based on user input
    */
    public function generateUserData() {
    		// create faker instance
    		$faker = Faker::create();

			return $faker->dateTimeThisCentury->format('Y-m-d');
    }
}