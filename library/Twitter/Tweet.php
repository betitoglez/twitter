<?php
class Twitter_Tweet extends Db_AbstractSupport {
	protected $id;
	protected $user;
	protected $text;
	protected $retweeted;
	protected $created;
	
	protected $oDB;
	
	public static function getCollection(Array $aTweets) {
		$aCollection = array ();
		foreach ( $aTweets as $aTweet ) {
			$aCollection [] = new self ( $aTweet );
		}
		return $aCollection;
	}
	
	
	
	/**
	 * @return the $user
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @return the $created
	 */
	public function getCreated() {
		return $this->created;
	}

	/**
	 * @param Ambigous <NULL, Twitter_User> $user
	 */
	public function setUser($user) {
		$this->user = $user;
	}

	/**
	 * @param field_type $created
	 */
	public function setCreated($created) {
		$this->created = $created;
	}
	
	/**
	 *
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * @return the $text
	 */
	public function getText() {
		return $this->text;
	}
	
	/**
	 *
	 * @return the $retweeted
	 */
	public function getRetweeted() {
		return $this->retweeted;
	}
	
	/**
	 *
	 * @param number $id        	
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 *
	 * @param string $text        	
	 */
	public function setText($text) {
		$this->text = $text;
	}
	
	/**
	 *
	 * @param boolean $retweeted        	
	 */
	public function setRetweeted($retweeted) {
		$this->retweeted = $retweeted;
	}
	
	public function __construct(Array $aAttrs = array()) {

		if (! array_key_exists ( "id", $aAttrs ))
			throw new Exception ( "El ID del tweet es obligatorio" );
		
		$this->user = in_array ( "user", $aAttrs ) ? new Twitter_User($aAttrs["user"]) : null;
		
		$this->id = $aAttrs ["id"];
		$this->text = array_key_exists ( "text", $aAttrs ) ? utf8_decode($aAttrs ["text"]) : "";
		$this->retweeted = array_key_exists ( "retweeted", $aAttrs ) ? ( bool ) $aAttrs ["retweeted"] : FALSE;
		$this->created = array_key_exists ( "created_at", $aAttrs ) ? date("Y-m-d H:i:s",strtotime($aAttrs ["created_at"])) : date("Y-m-d H:i:s");
		
		$this->oDb = new Db_Tweet();
	}
	
	
	

	
	public function toArray() {
		return array (
				"id_tweet" => $this->id,
				"id_user" => $this->user->toArray(),
				"text" => $this->text,
				"created" => $this->created,
				"retweeted" => $this->retweeted 
		);
	}
	
	public function save ($aForcedParams = null)
	{
		 if (!isset($this->user)){
		 	return false;
		 }
	     $id = $this->user->save();
	     $aForcedParams = $this->toArray();
	     $aForcedParams["id_user"] = $id;
	     return parent::save($aForcedParams);
	}
	
	public function __toString() {
		return json_encode ( $this->toArray () );
	}
}
