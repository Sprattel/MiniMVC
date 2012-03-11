<?php

/**
 * 
 */
class CoreBoot {
	var $router = null;
  var $controller = null;
 
  
	function init() {
		$this->router = new CoreRouter();
    $this->controller = new CoreController();
	}
  
  function loadController() {
    $controllerPath = ROOT_PATH.'/app/controllers/'.$this->router->getController().'.php';    
    $strController = null;
    
    if(!file_exists($controllerPath)){
      header('HTTP/1.0 404 Not Found');
      require_once ROOT_PATH.'/app/controllers/error.php';
      $strController = 'error';
      $method = 'page_404';      
    } else {  
      require_once $controllerPath;
      $strController = $this->router->getController();
    }
    
    $this->controller = new $strController;
    $this->controller->setRouter($this->router);
    if (method_exists($this->controller, $this->router->getMethod()))
      call_user_func_array(array($this->controller, $this->router->getMethod()), $this->router->getArgs());
    
  }
  
  function render() {
    return $this->controller->renderPage();
  }
  
  static function loadCoreFiles() {
    require_once CORE_PATH."/CoreConfig.php";
    require_once CORE_PATH."/CoreElement.php";
    require_once CORE_PATH."/CoreRouter.php";
    require_once CORE_PATH."/CoreController.php";    
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
