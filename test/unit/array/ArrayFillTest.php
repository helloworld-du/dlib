<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/19
 * Time: 上午11:41
 */

class ArrayDiffTest extends PHPUnit_Framework_TestCase {

	static public $arr1 = [
		0,1,2,3,4
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
		$actual = array_diff(0, 1, 1);
		$this->assertEquals(
			[1],
			$actual
		);

		$actual = array_diff(0, 2, 1);
		$this->assertEquals(
			[1, 2],
			$actual
		);
	}

}