<?php

/**
 * 
 */
class CoreBoot {
	var $router = null;
  var $controller = null;
  var $database = null;
  
	function init() {
		$this->router = new CoreRouter();
    $this->controller = new CoreController();
	}
  
  function loadDatabase() {
    $this->database = new CoreDatabase();
    $this->database->init();
  }
  
  function loadController() {
    $controllerPath = ROOT_PATH.'/app/controllers/'.$this->router->getController().'.php';    
    $strController = null;
    
    if(!file_exists($controllerPath)){
      header('HTTP/1.0 404 Not Found');
      require_once ROOT_PATH.'/app/controllers/error.php';
      $this->controller = new Error;
      $method = 'page_404';      
    } else {  
      require_once $controllerPath;
      $controller = $this->router->getController();
      $this->controller = new $controller;
      $method = $this->router->getMethod(); 
    }

    $this->controller->setRouter($this->router);
    $this->controller->setDb($this->database->getDb());
    
    if (method_exists($this->controller, $method))
      call_user_func_array(array($this->controller, $method), $this->router->getArgs());
    
  }
  
  function render() {
    return $this->controller->renderPage();
  }
  
  static function loadCoreFiles() {
    require_once CORE_PATH."/CoreConfig.php";    
    require_once CORE_PATH."/CoreDatabase.php";
    require_once CORE_PATH."/CoreRouter.php";
    require_once CORE_PATH."/CoreController.php";    
    require_once CORE_PATH."/CoreElement.php";
    require_once APP_PATH. '/configs/config.php';
  }
  
  static function setupEnvironment() {
    if(Config::getEnvironment() == 'development') {
      ini_set('display_errors', 'On');
      ini_set('display_startup_errors', 'On');
      error_reporting(-1);
    } else if(Config::getEnvironment() == 'live'){
      ini_set('display_errors', 'Off');
      ini_set('display_startup_errors', 'Off');
      error_reporting(0);
    }
  }
}
