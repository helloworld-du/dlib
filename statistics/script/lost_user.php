<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/6/8
 * Time: 下午6:19
 */
require __DIR__.'/../../common.inc.php';
use Dlib\Redis\Driver;
use FreeAgent\Bitter\Event\Week;
use FreeAgent\Bitter\Bitter;
use Tango\MQ\Export;
$oRedis = new Driver();
$bitter = new Bitter($oRedis);

$bitter->removeAll();

$bitter
	->mark('login', 123)
	->mark('open:door', 123)
	->mark('open:window', 123)
	->mark('close:door', 123);

$yesterday = new DateTime('-1day');
$bitter
	->mark('active', 234, $yesterday)
	->mark('open:door', 234, $yesterday)
	->mark('close:door', 234, $yesterday);

$currentWeek = new Week('active');
$currentWeek2 = new Week('open:window', $yesterday);

var_dump($bitter->in(123, $currentWeek));
var_dump($bitter->count($currentWeek));

$bitter->removeAll();