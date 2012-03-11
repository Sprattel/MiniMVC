<?php

/*
 * Config class
 */
 class Config extends CoreConfig {
   
   /*
    * Get current environment development, live etc...
    * @return string
    */   
   static function getEnvironment() {
     if(file_exists(APP_PATH.'/configs/current'))
      return 'development';
     return 'live';
   }
   
   static function getRoute() {
     return array(
        '/hello' => 'hello/world'
     );
   }
   
   /*
    * Google UA
    * @return string
    */
   static function getGoogleUA() {
     return 'UA-XXXXX-1';
   }
   
   /*
    * Get theme
    * @return string
    */
   static function getTheme() {
     return 'default';
   }
   
    /*
    * Get layout
     * @return string
    */
   static function getLayout() {
     return 'default';
   }
   
   
   /*
    * get database driver
    * @return string
    */
   static function getDatabaseDriver() {
     return 'mysql';
   }
   
  /*
   * Get the database login
   * @return array
   */
  static function getDatabaseConfig() {
    return array(
      'live' => array(
        'hostname' => 'localhost',
        'database' => '',
        'username' => 'root',
        'password' => ''
      ),
      'development' => array(
        'hostname' => 'localhost',
        'database' => 'minimce',
        'username' => 'root',
        'password' => 'local'
      )
    );
  }
 }
 
