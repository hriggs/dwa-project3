<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class IndexController extends Controller {
	
  /**
	* Construct function
	*/
    public function __construct() {
    }
    
    /**
    * Responds to requests to GET /
    */
    public function getIndex() {
        return view("index.index");
    }
}