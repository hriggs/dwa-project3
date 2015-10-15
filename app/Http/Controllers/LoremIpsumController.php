<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request as req;
use Illuminate\Support\Facades\Request;
use Lipsum;

class LoremIpsumController extends Controller {
	
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    
   /**
    * Responds to requests to GET /lorem-ipsum
    */
    public function getIndex() {
        return view("lorem.index")->with('text', "Your lorem ipsum will appear here.");
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
    		Foreach (Request::all() as $key => $value) {
    			
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
    		
    		return view("lorem.index")->with("text", eval($lorem));
    }
    
   /**
    * Generate lorem ipsum based on user input
    */
    public function generateLorem() {
    	
    	
    	
    	//$lorem = "Lipsum::headers()->link()->ul()->html(3);";
    	$lorem = "Lipsum::";
    	$lorem .= "headers()->link()->code()->ul()->html(1);";

		return $lorem;
    }
}