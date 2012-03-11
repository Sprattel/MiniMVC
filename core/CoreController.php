<?php


/**
 * 
 */
class CoreController {
  
  private $viewPage = null;
  private $layout = null;
  private $viewVar = array();
  private $layoutVar = array();
  protected $router = array();
  protected $db = null;
  function __construct() {
    
  }
  
  /*
   * 
   */
  function setRouter($router) {
    $this->router = $router;
  }
  
  function setDb($database) {
    $this->db = $database;
  }
  
  function setPage($page) {
    $pagePath = ROOT_PATH.'/app/theme/'.Config::getTheme().'/pages/'.strtolower(get_class($this)).'/'.$page.'.php';
    if(!file_exists($pagePath))
      throw new Exception("Page not exists");
    
    ob_start();
    if(!empty($this->viewVar))
      extract($this->viewVar);    
    include $pagePath;
    $this->viewPage = ob_get_clean();    
  }
  
  function setLayout(){
    $layoutPath = ROOT_PATH.'/app/theme/'.Config::getTheme().'/'.Config::getLayout().'.php';
    if(!file_exists($layoutPath))
      throw new Exception("Layout not exists");    

    $this->layoutVar['page'] = $this->viewPage;

    ob_start();
    if(!empty($this->layoutVar))
      extract($this->layoutVar);    
    include $layoutPath;
    $this->layout = ob_get_clean();
  }
  
  function viewVar($var, $value) {
    $this->viewVar[$var] = $value;
  }
  
  function layoutVar($var, $value) {
    $this->layoutVar[$var] = $value;
  }
 
  
  function renderPage() {      
    $this->setLayout();
    return $this->layout;
  }
}
