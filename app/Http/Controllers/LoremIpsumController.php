<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class LoremIpsumController extends Controller {
	
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    
    /**
    * Responds to requests to GET /lorem-ipsum
    */
    public function getIndex() {
        return view("lorem.index");
    }
}