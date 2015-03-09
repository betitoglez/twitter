<?php
final class Cache {
	
	private static $_oCache;
	
	private $oCache;
	
	private function __construct(){
		$this->oCache = new Memcache();
	}
	
	public function addServer ($host,$port){
		$this->oCache->addserver($host,$port);
	}
	
	public function get ($key){
		$_return = $this->oCache->get($key);	
		return $_return!==false?unserialize($_return):false;
	}
	
	public function set ($key,$value){
		return $this->oCache->set($key, serialize($value));
	}
	
	
	public static function getInstance()
	{
		if(!isset(self::$_oCache)){
			self::$_oCache = new self();
		}
		return self::$_oCache;
	}
	
	
	
	
}
