<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/19
 * Time: 上午11:41
 */

class ArrayDiffTest extends PHPUnit_Framework_TestCase {

	static public $arr1 = [
		'a' => 1,
		'b' => 3,
		'c' => 5,
	];
	static public $arr2 = [
		2 => 2,
		3 => 3,
		5 => 5,
	];
	static public $arr3 = [
		2 => 2,
		4 => 4,
		5 => 5,
	];
	/**
	 * array diff but not list
	 */
	public function test1() {
		$actual = array_diff(self::$arr1, self::$arr2);
		$this->assertEquals(
			['a' => 1,],
			$actual
		);
		$actual = array_diff(self::$arr1, self::$arr3);
		$this->assertEquals(
			[
				'a' => 1,
				'b' => 3,
			],
			$actual
		);
		$actual = array_diff(self::$arr1, []);
		$this->assertEquals(
			self::$arr1,
			$actual
		);
		$actual = array_diff([], self::$arr1);
		$this->assertEquals(
			[],
			$actual
		);
	}

	/**
	 * list diff后变为array,key不变
	 */
	public function test2() {
		$actual = array_diff([1,2,3,4], [2]);
		$this->assertEquals(
			[
				0 => 1,
				2 => 3,
				3 => 4,
			],
			$actual
		);

		$actual = array_diff([1,2,3,4], [1=> 2, 2=>3]);
		$this->assertEquals(
			[
				0 => 1,
				3 => 4
			],
			$actual
		);
	}

	/**
	 * 作为key的array内元素还是array,报错
	 */
	public function test3() {
		try {
			$actual = array_diff([[1],[2]], [[2]]);
		} catch(Exception $e) {
			$this->assertEquals(8, $e->getCode());
			return;
		}
		$this->assertFalse(true, 'test2: No exception');
	}
}