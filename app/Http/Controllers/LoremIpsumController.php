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
    public function getIndex() {
    	
    	$data = array("para" => "",
    					  "headers" => "",
    					  "ul" => "",
    					  "ol" => "",
    					  "dl" => "",
    					  "bq" => "",
    					  "code" => "",
    					  "decorate" => "",
    					  "link" => "",
    					  "allcaps" => ""
    					  );
    	
        return view("lorem.index")->with("output", "Lorem ipsum will appear here.")->with("data", $data);
    }
    
   /**
    * Responds to requests to POST /lorem-ipsum
    */
    public function postIndex(Request $request) {
    		
    		//return $request["para_num"];
    		// Validate the request data
    		/*$this->validate($request, [
        		"para_num" => "required"
    		]);*/
    		
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
    		
    		$data = [];
    		
    		$request->has("para") ? ($data["para"] = $request->input("para")) : ($data["para"] = ""); 
			// para length
			/*$this->test($request, "ol", $data);
			print_r($data);*/
    		$request->has("headers") ? ($data["headers"] = "checked") : ($data["headers"] = ""); 
    		$request->has("ul") ? ($data["ul"] = "checked") : ($data["ul"] = ""); 
    		$request->has("ol") ? ($data["ol"] = "checked") : ($data["ol"] = ""); 
    		$request->has("dl") ? ($data["dl"] = "checked") : ($data["dl"] = ""); 
    		$request->has("bq") ? ($data["bq"] = "checked") : ($data["bq"] = ""); 
    		$request->has("code") ? ($data["code"] = "checked") : ($data["code"] = ""); 
    		$request->has("decorate") ? ($data["decorate"] = "checked") : ($data["decorate"] = ""); 
    		$request->has("link") ? ($data["link"] = "checked") : ($data["link"] = ""); 
    		$request->has("allcaps") ? ($data["allcaps"] = "checked") : ($data["allcaps"] = ""); 
    		
    		print_r($data);
    						  
    		return view("lorem.index")->with("output", eval($lorem))->with("data", $data);
    }
    
    public function test(Request $request, $name, $array) {
    		return $request->has($name) ? ($array[$name] = $request->input($name)) : ($array[$name] = "");
    }
    
   /**
    * Generate lorem ipsum based on user input
    */
    public function generateLorem() {

		return "";
    }
}