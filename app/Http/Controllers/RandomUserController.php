<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class RandomUserController extends Controller {
	
    public function __construct() {
    		# Put anything here that should happen before any of the other actions
    }
    
   /**
    * Responds to requests to GET /random-user
    */
    public function getIndex(Request $request) {

      	return view("user.index")->with('text', "User data will appear here.")->with('data', $this->getFormData($request));
    }
    
   /**
    * Responds to requests to POST /random-user
    */
    public function postIndex(Request $request) {
    	
    	   // custom error messages
    		$messages = [
    			'required' => 'User field is required',
    			'numeric' => 'User field must only contain a number',
    			'min' => 'User number must be between 1 and 9',
    			'max' => 'User number must be between 1 and 9'
			];
    		
    		// validate the request data
    		$this->validate($request, 
    							["users" => "required|numeric|min:1|max:9"], 
    							$messages);

      	return view("user.index")->with('text', $this->getUserData($request))->with('data', $this->getFormData($request));
    }
    
   /**
    * Generate user data based on user input
    */
    private function getUserData(Request $request) {
    	
    		// create faker instance
    		$faker = Faker::create();
    	
    		$data = ""; 
    		$users = 0;
    		$options = [];
    		
    		// for every request item
    		Foreach ($request->all() as $key => $value) {
    			
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

    		// generate user data
    		for ($i = 0; $i < $users; $i++) {
    			
    			// add user name
    			$data .= "<p><span class='user'>" . $faker->name . "</span></p><ul>";
    			
    			// add extra options
    			for ($j = 0; $j < count($options); $j++) {
    				
    				if ($options[$j] === "birthday") {
    					
    					// add user birthday
    					$data .= "<li>" . $faker->dateTimeThisCentury->format('Y-m-d') . "</li>";
    				} elseif ($options[$j] === "text") {
    					
    					// add profile blurb
    					$data .= "<li>Profile: " . $faker->text($maxNbChars = 200) . "</li>";
    				} else {
    					
    					// add other options
    					$data .= "<li>" . $faker->$options[$j] . "</li>";
    				}
    			}
    			
    			$data .= "</ul>";
    			
    			// do not add 2 breaks after last user data
    			if ($i < $users - 1) {
    				$data .= "<br><br>";
    			}
    		
    		}
    	
			return $data;
    }
    
   /**
    * Stores and returns the values to be displayed/checked/selected on the form based on request data
    */
    private function getFormData(Request $request) {
    	
    		$data = [];
    	
    		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    			
    			// store user input values if request is POST
    			
    			// user number
    			$request->has("users") ? ($data["users"] = $request->input("users")) : ($data["users"] = "");
    		
    			// optional values
				$request->has("address") ? ($data["address"] = "checked") : ($data["address"] = ""); 
				$request->has("phoneNumber") ? ($data["phoneNumber"] = "checked") : ($data["phoneNumber"] = ""); 
				$request->has("freeEmail") ? ($data["freeEmail"] = "checked") : ($data["freeEmail"] = ""); 
				$request->has("birthday") ? ($data["birthday"] = "checked") : ($data["birthday"] = ""); 
				$request->has("text") ? ($data["text"] = "checked") : ($data["text"] = ""); 
    			
			} elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
				
				// store blank/default values if request is GET
				$data = array("users" => "",
    					  "address" => "",
    					  "phoneNumber" => "",
    					  "freeEmail" => "",
    					  "birthday" => "",
    					  "text" => ""
    					  );
			}
			
			return $data;
    }
}