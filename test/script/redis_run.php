<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/18
 * Time: 下午6:01
 */
require __DIR__.'/../../Commen.inc.php';
use dlib\redis_driver;
$oRedps = new redis_driver();
var_dump($oRedps->del('test1'));