<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/19
 * Time: 上午11:41
 */

class ArrayChunkTest extends PHPUnit_Framework_TestCase {

	static public $arr1 = [
		'a' => 1,
		'b' => 2,
		'1' => '1',
		'2' => '2',
		3 	=> '3'
	];
	/**
	 * 输入长度小于array大小
	 */
	public function test1() {
		$actual = array_chunk(self::$arr1, 2);
		$this->assertEquals(
			[
				[1, 2],
				['1', '2'],
				['3'],
			],
			$actual
		);
	}

	/**
	 * 输入长度大于array大小
	 */
	public function test2() {
		$actual = array_chunk(self::$arr1, 100);
		$this->assertEquals(
			[
				[1, 2, '1', '2', '3']
			],
			$actual
		);
	}

	/**
	 * 输入长度小于array大小,保留key
	 */
	public function test3() {
		$actual = array_chunk(self::$arr1, 2, true);
		$this->assertEquals(
			[
				['a' => 1, 'b' => 2,],
				['1' => '1','2' => 2,],
				[ 3 => '3'],
			],
			$actual
		);
	}

	/**
	 * array_chunk后顺序不变
	 */
	public function test4() {
		$actual = array_chunk(self::$arr1, 2, true);
		$this->assertEquals(
			[
				['a' => 1, 'b' => 2,],
				['2' => 2,'1' => '1'],
				[ 3 => '3'],
			],
			$actual
		);
		$actual = array_chunk(self::$arr1, 2);
		$exp = [
			[1, 2],
			['2', '1'],
			['3'],
		];
		$this->assertNotEquals($exp[1], $actual[1]);
		$this->assertEquals($exp[0], $actual[0]);
		$this->assertEquals($exp[2], $actual[2]);
	}


	/**
	 * value不能为null
	 */
	public function test5() {
		try {
			$actual = array_chunk(null, 2);
		} catch(Exception $e) {
			$this->assertEquals(2, $e->getCode());
			return;
		}
		$this->assertFalse(true, 'test2: No exception');
	}
}