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
    	
    		$data = [];
    	
    		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    			
    			// store user input values if request is POST
    			// text fields
    			$request->has("word_num") ? ($data["word_num"] = $request->input("word_num")) : ($data["word_num"] = "");
    			$request->has("number_num") ? ($data["number_num"] = $request->input("number_num")) : ($data["number_num"] = "");
    			$request->has("symbol_num") ? ($data["symbol_num"] = $request->input("symbol_num")) : ($data["symbol_num"] = "");
    		
    			// dropdowns 
				$request->input("separator") === "hyphens" ? ($data["hyphens"] = "selected") : ($data["hyphens"] = "");
				$request->input("separator") === "spaces" ? ($data["spaces"] = "selected") : ($data["spaces"] = ""); 
				$request->input("separator") === "nospace" ? ($data["nospace"] = "selected") : ($data["nospace"] = "");
 				$request->input("cases") === "start" ? ($data["start"] = "selected") : ($data["start"] = "");
				$request->input("cases") === "upper" ? ($data["upper"] = "selected") : ($data["upper"] = ""); 
				$request->input("cases") === "lower" ? ($data["lower"] = "selected") : ($data["lower"] = "");
				
				// radio buttons
				$request->input("number_loc") === "num_end" ? ($data["num_end"] = "checked") : ($data["num_end"] = "");
				$request->input("number_loc") === "num_random" ? ($data["num_random"] = "checked") : ($data["num_random"] = ""); 
				$request->input("symbol_loc") === "sym_end" ? ($data["sym_end"] = "checked") : ($data["sym_end"] = "");
				$request->input("symbol_loc") === "sym_random" ? ($data["sym_random"] = "checked") : ($data["sym_random"] = ""); 
				
			
				// optional values
    			$request->has("headers") ? ($data["headers"] = "checked") : ($data["headers"] = ""); 
    			$request->has("ul") ? ($data["ul"] = "checked") : ($data["ul"] = ""); 
    			$request->has("ol") ? ($data["ol"] = "checked") : ($data["ol"] = ""); 
    			$request->has("dl") ? ($data["dl"] = "checked") : ($data["dl"] = ""); 
    			$request->has("bq") ? ($data["bq"] = "checked") : ($data["bq"] = ""); 
    			$request->has("code") ? ($data["code"] = "checked") : ($data["code"] = ""); 
    			$request->has("decorate") ? ($data["decorate"] = "checked") : ($data["decorate"] = ""); 
    			$request->has("link") ? ($data["link"] = "checked") : ($data["link"] = ""); 
    			$request->has("allcaps") ? ($data["allcaps"] = "checked") : ($data["allcaps"] = ""); 
    			
			} elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
				
				// store blank/default values if request is GET
				$data = array("word_num" => "",
    					  "number_num" => "",
    					  "symbol_num" => "",
    					  "hyphens" => "",
    					  "spaces" => "",
    					  "nospace" => "",
    					  "start" => "",
    					  "upper" => "",
    					  "lower" => "",
    					  "num_end" => "",
    					  "num_random" => "",
    					  "sym_end" => "",
    					  "sym_random" => ""
    					  );
			}
			
			return $data;
    }
}