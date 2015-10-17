<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller {
	
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    
   /**
    * Responds to requests to GET /password
    */
    public function getIndex(Request $request) {
        return view("password.index")->with("data", $this->getFormData($request));
    }
    
   /**
    * Responds to requests to POST /password
    */
    public function postIndex(Request $request) {
    	
    	   // custom error messages
    		$messages = [
    			'required' => 'Word number field is required',
    			'numeric' => 'Word number field must only contain a number',
    			'min' => 'Word number must be between 1 and 9',
    			'max' => 'Word number must be between 1 and 9'
			];
    		
    		// validate the request data
    		$this->validate($request, 
    							["word_num" => "required|numeric|min:1|max:9"], 
    							$messages);
    	
        return view("password.index")->with("data", $this->getFormData($request));
    }
    
   /**
    * Stores and returns the values to be displayed/checked/selected on the form based on request data
    */
    private function getFormData(Request $request) {
    	
    		// text field names
    		$textField = array("word_num","number_num","symbol_num");
    		
    		// drop-down field names			  
    		$dropDown = array("hyphens","spaces","nospace","start","upper","lower");
    		
    		// radio button names			  
    		$radio = array("num_end","num_random","sym_end","sym_random");
    	
    		// to hold all form data
    		$data = [];
    	
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