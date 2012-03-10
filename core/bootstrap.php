<?php

function __autoload($className) {
  //Load core classes
  //if(substr($className, 0, 4) === 'Core')
  //  require_once "$className.php";

}
require_once "CoreConfig.php";
require_once "CoreElement.php";
require_once "CoreRouter.php";
require_once "CoreController.php";

require_once 'app/configs/config.php';


//env setup
if(Config::getEnvironment() == 'development') {
  ini_set('display_errors', 'On');
  ini_set('display_startup_errors', 'On');
  error_reporting(-1);
} else if(Config::getEnvironment() == 'live'){
  ini_set('display_errors', 'Off');
  ini_set('display_startup_errors', 'Off');
  error_reporting(0);
}


//page lockup

$router = new CoreRouter();
if ($router->getController() != "")
  $strController = $router->getController();
else 
  $strController = 'index';
$method = null;

//load controller
$controllerPath = ROOT_PATH.'/app/controllers/'.$strController.'.php';
if(!file_exists($controllerPath)){
  header('HTTP/1.0 404 Not Found');
  require_once ROOT_PATH.'/app/controllers/error.php';
  $strController = 'error';
  $method = 'page_404';
  
} else {  
  require_once $controllerPath;
}
$controller = new $strController;

if(!$method)
  $method = $router->getMethod();
$params = $router->getArgs();

if ((int)method_exists($controller, $method))
  call_user_func_array(array($controller, $method), $params);

echo $controller->renderPage();
