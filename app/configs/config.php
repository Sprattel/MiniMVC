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
     if(file_exists('current'))
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
   * Get the database login
   * @return array
   */
  static function databaseConfig() {
    return array(
      'live' => array(
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => ''
      ),
      'development' => array(
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => ''
      )
    );
  }
 }
 
