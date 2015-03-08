<?php
abstract class Db {
	
	private static $_oAdapter;
	
	protected $table;
	
	abstract function exists($id);
	abstract function search($id);
	
	protected function getAdapter() {
		if (!isset(self::$_oAdapter)){
			$oApp = App::getApp();
			$sDsn = sprintf('mysql:host=%s;port=%s;dbname=%s',
					$oApp->getResource("database.host"),$oApp->getResource("database.port"),$oApp->getResource("database.dbname"));
			self::$_oAdapter = new PDO($sDsn, $oApp->getResource("database.admin"), $oApp->getResource("database.password"));
		}
		return self::$_oAdapter;
	}
	
	public function getAll(){
		$oStament = $this->getAdapter()->prepare("SELECT * FROM ".$this->table);
		$oStament->execute();
		return $oStament->fetchAll();
	}
	
	public function insert (Array $aParams){
		
		$sColumns = "(". implode(",", array_keys($aParams))  .")";
		$sPlaceholders = "(".str_repeat("?,", count($aParams)-1)."?".")";
		
		$oAdapter = $this->getAdapter();
		$oStament = $oAdapter->prepare("INSERT INTO ".$this->table." ".$sColumns." VALUES " . $sPlaceholders);
		$oStament->execute(array_values($aParams));
		
		return $oAdapter->lastInsertId();
	}
	
	public function basicSearch ($id,$field){
		$oStament = $this->getAdapter()->prepare("SELECT * FROM ". $this->table . " WHERE $field = :id");
		$oStament->bindParam(":id", $id);
		$oStament->execute();
		return $oStament->fetchAll();
	}
	
	public function lastInsertedId ()
	{
		return $this->getAdapter()->lastInsertId();
	}
	
}
 
