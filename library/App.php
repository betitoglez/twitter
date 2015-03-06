<?php
class App {
	
	private static $_app;
	
	private $_aConfig;
	
	/**
	 * @return array $_aConfig
	 */
	public function getConfig() {
		return $this->_aConfig;
	}

	/**
	 * @param array  $_aConfig
	 */
	public function setConfig(Array $_aConfig) {
		$this->_aConfig = $_aConfig;
	}

	public function __construct()
	{
		$this->_aConfig = array();
	}
	
	public static function getApp()
	{
		if (!isset(self::$_app)){
			self::$_app = new self;
		}
		return self::$_app;
	}
	
	public function getResource ($resource){
		return array_key_exists($resource, $this->_aConfig)?$this->_aConfig[$resource]:false;
	}
	
}