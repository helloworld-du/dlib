<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/19
 * Time: 上午11:41
 */

class ArrayCombineTest extends PHPUnit_Framework_TestCase {

	static public $arr1 = [
		'a' => 1,
		'b' => 2,
		'c' => 3,
	];
	static public $arr2 = [
		4 => 4,
		6 => 6,
		9 => 9,
	];
	/**
	 * 2个数组长度一样
	 */
	public function test1() {
		$actual = array_combine(self::$arr1, self::$arr2);
		$this->assertEquals(
			[
				1 => 4,
				2 => 6,
				3 => 9,
			],
			$actual
		);
	}

	/**
	 * 2个数组长度不一样
	 * @expectedExceptionCode	2
	 */
	public function test2() {
		$arr2 = self::$arr2;
		$arr2['100'] = 100;
//		$this->setExpectedException('Exception', 'array_combine(): Both parameters should have an equal number of elements', 2);

		try {
			$actual = array_combine(self::$arr1, $arr2);
		} catch(Exception $e) {
			$this->assertEquals(2, $e->getCode());
			return;
		}
		$this->assertFalse(true, 'test2: No exception');
	}

	/**
	 * 作为key的数据的value重复,后者覆盖前者
	 */
	public function test3() {
		self::$arr1['a'] = self::$arr1['b'];
		$actual = array_combine(self::$arr1, self::$arr2);
		$this->assertEquals(
			[
				2 => 6,
				3 => 9,
			],
			$actual
		);
	}

	/**
	 * value不能为null
	 */
	public function test4() {
		try {
			$actual = array_combine(self::$arr1, null);
		} catch(Exception $e) {
			$this->assertEquals(2, $e->getCode());
			return;
		}
		$this->assertFalse(true, 'test2: No exception');
	}

	/**
	 * 作为key的数据的value还是array,
	 */
	public function test5() {
		try {
			$actual = array_combine([[2], [3]], [1,2]);
		} catch(Exception $e) {
			$this->assertEquals(8, $e->getCode());
			return;
		}
		$this->assertFalse(true, 'test2: No exception');
	}
}