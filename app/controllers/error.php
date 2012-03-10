<?php


/**
 * 
 */
class Error extends CoreController {
  
  function __construct() {
    parent::__construct();
  }
  
  function page_404() {
    $this->setPage(__FUNCTION__);
  }
}
