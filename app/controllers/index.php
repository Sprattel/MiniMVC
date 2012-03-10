<?php


/**
 * 
 */
class Index extends CoreController {
  
  function __construct() {
    parent::__construct();
  }
	
  function index() {
    $this->viewVar('var', 'hej');
    
    $this->setPage(__FUNCTION__);
  }
}
