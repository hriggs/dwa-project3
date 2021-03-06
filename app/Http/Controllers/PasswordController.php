<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller {
	
  /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /password
    * 
    * @param $request request object
    */
    public function getIndex(Request $request) {
    	
        return view("password.index")->with("output", $this->getPassword($request))->with("data", $this->getFormData($request));
    }
    
   /**
    * Responds to requests to POST /password
    * 
    * @param $request request object
    */
    public function postIndex(Request $request) {
    	
    	   // custom error messages
    		$messages = [
    			'required' => 'Field is required',
    			'numeric' => 'Field must only contain a number',
    			'min' => 'Field input must be between 1 and 9',
    			'max' => 'Field input must be between 1 and 9'
			];
    		
    		// validate the request data
    		$this->validate($request, 
    							["word_num" => "required|numeric|min:1|max:9",
    							 "number_num" => "numeric|min:1|max:9",
    							 "symbol_num" => "numeric|min:1|max:9"
    							], 
    							$messages);
    	
        return view("password.index")->with("output", $this->getPassword($request))->with("data", $this->getFormData($request));
    }
    
   /**
    * Generates and returns a random password based on user input
    * 
    * @param $request request object
    */
    private function getPassword(Request $request) {
    	
    		// array of symbols
			$symbols = Array("~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "+", "=");
			
			// create word array from file
			$words = file(storage_path() . "/app/words/words.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
			
			// if user has not tried to generate a password yet, show nothing
    		if (!$request->has("word_num")) {
    			return "Password will appear here.";
    		}
    	
    		// store initial values
    		$password = ""; 
    		$num_count = $request->input("number_num");
    		$symbol_count = $request->input("symbol_num");
    		$separator = "";
    	
    		// set up how words are separated
   	 	if ($request->input("separator") == "hyphens") { 
    			$separator = "-";
   	 	} elseif($request->input("separator") == "spaces") { 
    			$separator = " ";
   	 	}
    	
    		// loop as many times as number of words that user requested 
    		for ($i = 0; $i < $request->input("word_num"); $i++) {
    		
    			// if numbers to be added randomly and still numbers to be added
    			if ($request->input("number_loc") == "num_random" && $num_count > 0) {
    				
    				// 50% chance of adding number
    				if (rand(0, 1) == 1) {
    					
    					// add random number
    					$password .= rand(0, 9);
    					$num_count--; 
    				}
    			}
    		
    			// if symbols to be added randomly and still symbols to be added
    			if ($request->input("symbol_loc") == "sym_random" && $symbol_count > 0) {
    			
    				// 50% chance of adding symbol
    				if (rand(0, 1) == 1) {
    				
    					// add random symbol to password
    					$password .= $symbols[rand(0, count($symbols) - 1)];
    					$symbol_count--; 
    				}
    			}
    		
    			// set case of words
    			if ($request->input("cases") == "lower") {
    			
    				// add random lower case word
    				$password .= strtolower($words[rand(0, count($words) - 1)]);

    			} elseif ($request->input("cases") == "upper"){
    			
    				// add random upper case word 
    				$password .= strtoupper($words[rand(0, count($words) - 1)]);
    			} else {
    			
    				// add random word with only 1st letter upper case
    				$password .= ucfirst($words[rand(0, count($words) - 1)]);
    			}

    			// do not add separator to end of password
    			if ($i != $request->input("word_num") - 1) {
    			
    				// add separator to password
    				$password .= $separator; 
    			
    			} else {
    			
    				// if numbers to be added at end or not all randomly placed numbers used up, add numbers to end
    				for ($j = 0; $j < $num_count; $j++) {
    					
    					// add random number to password
    					$password .= rand(0, 9);
    				}

    				// if symbols to be added at end or not all randomly placed symbols used up, add symbols to end
    				for($j = 0; $j < $symbol_count; $j++) { 
    				
    					// add random symbol to password
    					$password .= $symbols[rand(0, count($symbols) - 1)]; 
    				}
    			}
    		}
    	
    		return $password; 
    }
    
   /**
    * Stores and returns the values to be displayed/checked/selected on the form based on request data
    * 
    * @param $request request object
    */
    private function getFormData(Request $request) {
    	
    		// to hold all form data
    		$data = [];
    	
    		// text field, drop-down, radio button names
    		$textField = array("word_num","number_num","symbol_num");			  
    		$dropDown = array("hyphens","spaces","nospace","start","upper","lower");		  
    		$radio = array("num_end","num_random","sym_end","sym_random");
    	
    		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    			
    			// store user input values if request is POST
    			// store text field data if given
    			for ($i = 0; $i < count($textField); $i++) {
    				$request->has($textField[$i]) ? ($data[$textField[$i]] = $request->input($textField[$i])) : ($data[$textField[$i]] = "");
    			}
    			
    			// store drop-down data if given
    			for ($i = 0; $i < count($dropDown); $i++) {
    				
    				if ($i < 3) {
    					
    					// separator drop-down
    					$request->input("separator") === $dropDown[$i] ? ($data[$dropDown[$i]] = "selected") : ($data[$dropDown[$i]] = "");
    				
    				} else {
    					
    					// cases drop-down
    					$request->input("cases") === $dropDown[$i] ? ($data[$dropDown[$i]] = "selected") : ($data[$dropDown[$i]] = "");
    				}
    			}
    			
    			// store radio button data if given
    			for ($i = 0; $i < count($radio); $i++) {
    				
    				if ($i < 2) {
    					
    					// number location radio buttons
    					$request->input("number_loc") === $radio[$i] ? ($data[$radio[$i]] = "checked") : ($data[$radio[$i]] = "");
    				
    				} else {
    					
    					// symbol location radio buttons
    					$request->input("symbol_loc") === $radio[$i] ? ($data[$radio[$i]] = "checked") : ($data[$radio[$i]] = "");
    				}
    			}
    			
			} elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
				
				// store blank values if request is GET
				// add text field values
				for ($i = 0; $i < count($textField); $i++) {
					$data[$textField[$i]] = "";
				}
				
				// add blank drop-down values
				for ($i = 0; $i < count($dropDown); $i++) {
					$data[$dropDown[$i]] = "";
				}
				
				// add blank radio button values
				for ($i = 0; $i < count($radio); $i++) {
					$data[$radio[$i]] = "";
				}
			}
			
			return $data;
    }
}