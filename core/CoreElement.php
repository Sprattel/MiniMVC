<?php



/**
 * 
 */
class Element {
	
  static function render($element, $vars = array()) {
    $elementPath = ROOT_PATH.'/app/theme/'.Config::getTheme().'/elements/'.$element;
    
    ob_start();
    
    if(!empty($vars))
      extract($vars);    
    if(file_exists($elementPath))
      include $elementPath;
    
    return ob_get_clean();
  }
}
