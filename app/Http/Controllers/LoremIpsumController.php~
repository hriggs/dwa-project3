<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lipsum;

class LoremIpsumController extends Controller {
	
  /**
	* Construct function
	*/
    public function __construct() {
    }
    
   /**
    * Responds to requests to GET /lorem-ipsum
    * 
    * @param $request request object
    */
    public function getIndex(Request $request) {
    	
        return view("lorem.index")->with("output", "Lorem ipsum will appear here.")->with("data", $this->getFormData($request));
    }
    
   /**
    * Responds to requests to POST /lorem-ipsum
    * 
    * @param $request request object
    */
    public function postIndex(Request $request) {
    		
    		// custom error messages
    		$messages = [
    			'required' => 'Paragraph field is required',
    			'numeric' => 'Paragraph field must only contain a number',
    			'min' => 'Paragraph number must be between 1 and 9',
    			'max' => 'Paragraph number must be between 1 and 9'
			];
    		
    		// validate the request data
    		$this->validate($request, 
    							["para" => "required|numeric|min:1|max:9"], 
    							$messages);
    						  
    		return view("lorem.index")->with("output", eval($this->getLorem($request)))->with("data", $this->getFormData($request));
    }
    
   /**
    * Generate lorem ipsum based on user input
    * 
    * @param $request request object
    */
    private function getLorem(Request $request) {
    	
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
    * 
    * @param $request request object
    */
    private function getFormData(Request $request) {
    		
    		// to hold all form data
    		$data = [];
    		
    		// drop-down, check box names		  
    		$dropDown = array("short","medium","long","verylong");		  
    		$checkBox = array("headers","ul","ol","dl","bq","code","decorate","link","allcaps");
    	
    		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    			
    			// store user input values if request is POST
    			// store text field paragraph number if given
    			$request->has("para") ? ($data["para"] = $request->input("para")) : ($data["para"] = "");
    			
    			// store drop-down data if given
    			for ($i = 0; $i < count($dropDown); $i++) {
    				$request->input("length") === $dropDown[$i] ? ($data[$dropDown[$i]] = "selected") : ($data[$dropDown[$i]] = "");
    			}
    			
    			// store check box data if given
    			for ($i = 0; $i < count($checkBox); $i++) {
    				$request->has($checkBox[$i]) ? ($data[$checkBox[$i]] = "checked") : ($data[$checkBox[$i]] = ""); 
    			}
    			
			} elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
				
				// store blank values if request is GET
				// add blank text field paragraph number value
				$data["para"] = "";				
				
				// add blank drop-down values
				for ($i = 0; $i < count($dropDown); $i++) {
					$data[$dropDown[$i]] = "";
				}
				
				// add blank check box values
				for ($i = 0; $i < count($checkBox); $i++) {
					$data[$checkBox[$i]] = "";
				}
			}
			
			return $data;
    }
}