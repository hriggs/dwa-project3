<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class PasswordController extends Controller {
	
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    
    /**
    * Responds to requests to GET /password
    */
    public function getIndex() {
        return view("password.index");
    }
}