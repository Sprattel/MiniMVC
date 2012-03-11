<?php
/*
 * Welcome to MiniMVC
 */

define('ROOT_PATH', __DIR__);
define('APP_PATH', __DIR__ . '/app');
define('CORE_PATH', __DIR__ . '/core');

require_once 'core/CoreBoot.php';

CoreBoot::loadCoreFiles();
CoreBoot::setupEnvironment();

$boot = new CoreBoot();
$boot->init();
$boot->loadController();
echo $boot->render();
