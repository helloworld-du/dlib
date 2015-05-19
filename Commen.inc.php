<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/18
 * Time: 下午5:52
 */
require 'vendor/autoload.php';

define('ROOT', __DIR__ . '/');




spl_autoload_register(function ($class) {

	if (strpos($class, 'dlib\\') === 0) {
		$class = str_replace('dlib\\', '',$class);
	}
	$class = str_replace('\\', '/',$class);

	$sRealPath = ROOT.str_replace('_', '/',$class).'.php';
	if (file_exists($sRealPath)) {
		require $sRealPath;
	}
}, true, true);