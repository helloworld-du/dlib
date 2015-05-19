<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/18
 * Time: 下午6:01
 */
require __DIR__.'/../../common.inc.php';
$loader = new \Composer\Autoload\ClassLoader();
var_dump($loader->getPrefixes(), $loader->getClassMap());