<?php

final class Db_User extends Db {
	protected $table = "users";
	

	/* (non-PHPdoc)
	 * @see Db::exists()
	 */
	public function exists($id) {
		return count($this->basicSearch($id, "id_user"))>0?true:false;		
	}
	
	public function search($id) {
		return $this->basicSearch($id, "id_user");
	}

}
