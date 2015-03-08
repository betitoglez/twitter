<?php
abstract class Db_AbstractSupport {
	
	protected $oDb;
	abstract public function toArray();
	
	function save($aForcedParams = null){
		$_auxResult = $this->oDb->search($this->id);
		if (count($_auxResult)==0){
			if (null === $aForcedParams){
				return $this->oDb->insert($this->toArray());
			}else{
				return $this->oDb->insert($aForcedParams);
			}		
		}else{
			return isset($_auxResult["id"])?$_auxResult["id"]:0;
		}
	}
}

