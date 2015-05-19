<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/18
 * Time: 下午5:50
 */
namespace dlib;

class confs_loader {

	static protected $_sBaseDir;
	static protected $_cache = [];

	static protected function init () {
		if (!self::$_sBaseDir) {
			self::$_sBaseDir = __DIR__.'/';
		}
	}
	static public function get($sKey) {
		self::init();
		return self::_get($sKey);
	}

	static protected function _get($sKey) {
		$lPath = explode('.', $sKey, 2);
		if (isset(self::$_cache[$lPath[0]])) {
			return self::$_cache[$lPath[0]];
		}
		self::$_cache[$lPath[0]] = \Noodlehaus\Config::load(self::$_sBaseDir.$lPath[0].'.php');
		if (count($lPath) === 2) {
			return self::$_cache[$lPath[0]][$lPath[1]];
		}
		return self::$_cache[$lPath[0]];
	}

	public function setBaseDir($sBaseDir) {
		self::$_sBaseDir = $sBaseDir;
	}
}