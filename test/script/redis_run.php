<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/18
 * Time: 下午6:01
 */
require __DIR__.'/../../common.inc.php';
use dlib\redis\Driver;
$oRedis = new Driver();
var_dump($oRedis->set('redis_test1', 'testkadna;ndas;kdnak;'));
var_dump($oRedis->get('redis_test1'));
var_dump($oRedis->del('redis_test1gi'));