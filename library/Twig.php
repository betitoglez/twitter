<?php
class Twig {
	
	private static $_oTwig;
	
	
	private $oTwig;
	
	private function __construct(){
		$loader = new Twig_Loader_Filesystem(WORKING_DIRECTORY."/html/tmpl");
		$this->oTwig = new Twig_Environment($loader, array(
				'cache' => TMP,
		));
	}
	
	public function render ($tmpl,Array $aParams = array())
	{
		return $this->oTwig->render($tmpl, $aParams);
	}
	
	public static function getInstance()
	{
		if(!isset(self::$_oTwig)){
			self::$_oTwig = new self();
		}
		return self::$_oTwig;
	}
	
}
