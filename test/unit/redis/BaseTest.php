<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/19
 * Time: 上午11:41
 */
use Dlib\Redis\Driver;

class BaseTest extends PHPUnit_Framework_TestCase {

	/**
	 * 输入长度小于array大小,保留key
	 */
	public function test1() {
		$str = 'sd;abfl;sbnfl;djsfnjl;dsnlfsdl;dfnsl;dnsfl;dnsfl';
		$key = 'redis_test_key_120u34y1';
		$oRedis = new Driver();
		$this->assertNotFalse($oRedis->set($key, $str));
		$this->assertEquals($str, $oRedis->get($key));
		$this->assertNotFalse($oRedis->del($key));
		$this->assertNotTrue($str, $oRedis->get($key));
	}
}