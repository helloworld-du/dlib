<?php
/**
 * Created by PhpStorm.
 * User: dushengchen
 * Date: 15/5/18
 * Time: 下午6:49
 */
namespace dlib;

class redis_driver {


	protected $_oMaster = null;
	protected $_aAddr = null;

	public function __construct ($sKey = 'default') {
		$this->_aAddr = $sKey;
		$this->_oMaster = new \Redis();
		$this->_connect();
	}

	public function getAddr() {
		if (is_array($this->_aAddr)) {
			return $this->_aAddr;
		}
		if (is_string($this->_aAddr)) {
			$conf = confs_loader::get('redis.'.$this->_aAddr);
			if ($conf && is_array($conf)) {
				return $this->_aAddr = $conf;
			}
			throw new \Exception('Unkonw conf key: '.$this->_aAddr);
		}
		throw new \Exception('Unkonw conf key: '.$this->_aAddr);
	}

	public function __call($name, $arguments) {
		if (is_callable([$this->_oMaster, $name])) {
			return call_user_func_array(
				[$this->_oMaster, $name],
				$arguments
			);
		} else {
			throw new \Exception('Can not call : '.$name);
		}

	}

	protected function _connect() {
		$aAddr = $this->getAddr();
		try{
			if (empty($aAddr["socket"])) {
				$this->_oMaster->connect(
					$aAddr['host'],
					$aAddr['port'],
					$aAddr['timeout'] ? 0 : $aAddr['timeout']
				);
			} else {
				$this->_oMaster->connect($aAddr["socket"]);
			}
		} catch (\Exception $e){
			Throw new \Exception(sprintf('REDIS_CNN_ERR host:%s port:%d. Msg: %s', $aAddr['host'], $aAddr['port'], $e->getTraceAsString()));
		}
	}
}