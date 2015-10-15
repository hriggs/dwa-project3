<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Faker\Factory as Faker;

class RandomUserController extends Controller {
	
    public function __construct() {
    		# Put anything here that should happen before any of the other actions
    }
    
   /**
    * Responds to requests to GET /random-user
    */
    public function getIndex() {

      	return view("user.index")->with('text', "User data will appear here.");
    }
    
   /**
    * Responds to requests to POST /random-user
    */
    public function postIndex(Request $request) {
    	
    		// create faker instance
    		$faker = Faker::create();
    	
    		$data = ""; 
    		$users = 0;
    		$options = [];
    		
    		// for every request item
    		Foreach (Request::all() as $key => $value) {
    			
    			// if key only contains alphabetical characters
				if (ctype_alpha($key)) {
					
					if ($key === "users") {
						
						// store number of users
						$users = $value;
					} else {
						
						// store option in array
						array_push($options, $key);
					}
				}
    		}
    		
    		var_dump($options);
    		
    		// generate user data
    		for ($i = 0; $i < $users; $i++) {
    			
    			// add user name
    			$data .= "<p><span class='user'>" . $faker->name . "</span></p>";
    			
    			// add extra options
    			for ($j = 0; $j < count($options); $j++) {
    				
    				echo $options[$j];
    				
    				if ($options[$j] === "birthday") {
    					
    					// add user birthday
    					$data .= "<p>" . $faker->dateTimeThisCentury->format('Y-m-d') . "</p>";
    				} elseif ($options[$j] === "text") {
    					
    					// add profile blurb
    					$data .= "<p>" . $faker->text($maxNbChars = 200) . "</p>";
    				} else {
    					
    					// add other options
    					$data .= "<p>" . $faker->$options[$j] . "</p>";
    				}
    			}
    			
    			$data .= "<br>";
    		
    		}

      	return view("user.index")->with('text', $data);
    }
    
   /**
    * Generate user data based on user input
    */
    public function generateUserData() {
    		// create faker instance
    		$faker = Faker::create();
    		// text($maxNbChars = 200)

			return $faker->dateTimeThisCentury->format('Y-m-d');
    }
}