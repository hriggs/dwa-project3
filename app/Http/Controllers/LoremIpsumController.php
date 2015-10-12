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
    * Create paragraphs
    */
    public function generateLorem() {
        return Lipsum::headers()->link()->ul()->html(5);
        //return "testing";
    }
}