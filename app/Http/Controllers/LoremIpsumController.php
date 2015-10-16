<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Lipsum;

class LoremIpsumController extends Controller {
	
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    
   /**
    * Responds to requests to GET /lorem-ipsum
    */
    public function getIndex(Request $request) {
    	
        return view("lorem.index")->with("output", "Lorem ipsum will appear here.")->with("data", $this->getFormData($request));
    }
    
   /**
    * Responds to requests to POST /lorem-ipsum
    */
    public function postIndex(Request $request) {
    		
    		// Validate the request data
    		/*$this->validate($request, [
        		"para_num" => "required"
    		]);*/
    						  
    		return view("lorem.index")->with("output", eval($this->getLorem($request)))->with("data", $this->getFormData($request));
    }
    
   /**
    * Generate lorem ipsum based on user input
    */
    public function getLorem(Request $request) {
    	
    		$lorem = "return Lipsum::";
    		$para_num = "";
    		
    		// for every request item
    		Foreach ($request->all() as $key => $value) {
    			
    			// if key only contains alphabetical characters
				if (ctype_alpha($key)) {
					
					if ($key === "para") {
						
						// add number of paragraphs
						$para_num .= "html(" . $value . ");";
						
					} elseif ($key === "length") {
						
						// add length of paragraphs
						$lorem .= $value . "()->";
						
					} else {
						
						// add keys to specify which features to add
						$lorem .= $key . "()->";
					}
				}
    		}
    		
    		// add paragraph number at end
    		$lorem .= $para_num;

		return $lorem;
    }
    
   /**
    * Stores and returns the values to be displayed/checked/selected on the form based on request data
    */
    private function getFormData(Request $request) {
    	
    		$data = [];
    	
    		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    			
    			// store user input values if request is POST
    			
    			// paragraph number
    			$request->has("para") ? ($data["para"] = $request->input("para")) : ($data["para"] = "");
    		
    			// paragraph length 
				$request->input("length") === "short" ? ($data["short"] = "selected") : ($data["short"] = "");
				$request->input("length") === "medium" ? ($data["medium"] = "selected") : ($data["medium"] = ""); 
				$request->input("length") === "long" ? ($data["long"] = "selected") : ($data["long"] = "");
				$request->input("length") === "verylong" ? ($data["verylong"] = "selected") : ($data["verylong"] = ""); 
			
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
				$data = array("para" => "",
    					  "headers" => "",
    					  "short" => "selected",
    					  "medium" => "",
    					  "long" => "",
    					  "verylong" => "",
    					  "ul" => "",
    					  "ol" => "",
    					  "dl" => "",
    					  "bq" => "",
    					  "code" => "",
    					  "decorate" => "",
    					  "link" => "",
    					  "allcaps" => ""
    					  );
			}
			
			return $data;
    }
}