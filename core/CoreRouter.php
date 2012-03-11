<?php

class CoreRouter {
  var $controller = null;
  var $method = null;
  var $args = null;
  
  function __construct() {
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    //remove empty element
    array_shift($uri);
    
    $this->controller = array_shift($uri);
    $this->method = array_shift($uri);
    $this->args = $uri;
  }

  /**
   * Get the current controller in url
   * @return string
   */
  function getController() {
    if(!empty($this->controller))
      return $this->controller;
    return CoreConfig::defaultController();
  }

  /**
   * Get the current method in url
   * @return string
   */
  function getMethod() {
    if(!empty($this->method))
      return $this->method;
    return CoreConfig::defaultMethod();
  }

  /**
   * Get the current arguments in url
   * @return array
   */
  function getArgs() {
    return $this->args;
  }


}