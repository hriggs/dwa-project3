<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class RandomUserController extends Controller {
	
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    
    /**
    * Responds to requests to GET /random-user
    */
    public function getIndex() {
        return "Random user generator page!";
    }
}