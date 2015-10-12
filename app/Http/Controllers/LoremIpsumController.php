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