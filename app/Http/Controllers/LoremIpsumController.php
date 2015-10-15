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
        return view("lorem.index")->with('text', $this->generateLorem());
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
    		
    		$lorem = "Lipsum::";
    		$para_num = "";
    		
    		Foreach (Request::all() as $key => $value) {
    			
    			echo $key;
    			
				if (ctype_alpha($key)) {
					
					if ($key === "para") {
						$para_num .= "html(" . $value . ");";
						print_r($para_num);
					} elseif ($key === "length") {
						$lorem .= $value . "()->";
						
					} else {
						$lorem .= $key . "()->";
					}
				}
    		}
    		
    		$lorem .= $para_num;
    		
    		print_r($lorem);
    		
    		return view("lorem.index")->with('text', $lorem);

    		
    		//print_r($input);
    		
    		return view("lorem.index")->with('text', $this->generateLorem());
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