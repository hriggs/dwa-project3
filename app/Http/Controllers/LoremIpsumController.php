<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
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
    
    public function getShow() {
    $lorem = "Lipsum::html()";

		echo eval($lorem);
    }
    
    /**
    * Create paragraphs
    */
    public function generateLorem() {
    	
    	$lorem = "Lipsum::headers()->link()->ul()->html(3);";

			/*ob_start();
eval($lorem);
$this_string = ob_get_contents();
ob_end_clean();*/

echo is_callable($lorem);

return $lorem;
    		//return eval($lorem);
    }
}