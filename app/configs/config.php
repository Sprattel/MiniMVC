<?php

/*
 * Config class
 */
 class Config extends CoreConfig {
   
   
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
 
