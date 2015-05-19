<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/18
 * Time: 下午5:52
 */
define('LIB_ROOT', __DIR__ . '/');
require LIB_ROOT.'vendor/autoload.php';



//$loader = new \Composer\Autoload\ClassLoader();
//$loader->add('dlib\\', __DIR__);
//// activate the autoloader
//$loader->register();
//// to enable searching the include path (eg. for PEAR packages)
//$loader->setUseIncludePath(true);




//spl_autoload_register(function ($class) {
//
//	if (strpos($class, 'dlib\\') === 0) {
//		$class = str_replace('dlib\\', '',$class);
//	}
//	$class = str_replace('\\', '/',$class);
//
//	$sRealPath = ROOT.str_replace('_', '/',$class).'.php';
//	if (file_exists($sRealPath)) {
//		require $sRealPath;
//	}
//}, true, true);