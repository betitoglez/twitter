<?php
class Twitter_Tweet {
	private $id;
	private $user;
	private $text;
	private $retweeted;
	private $created;
	
	
	
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

		if (! in_array ( "id", $aAttrs ))
			throw new Exception ( "El ID del tweet es obligatorio" );
		
		$this->user = in_array ( "user", $aAttrs ) ? new Twitter_User($aAttrs["user"]) : null;
		
		$this->id = ( int ) $aAttrs ["id"];
		$this->text = in_array ( "text", $aAttrs ) ? $aAttrs ["text"] : "";
		$this->retweeted = in_array ( "retweeted", $aAttrs ) ? ( bool ) $aAttrs ["retweeted"] : FALSE;
		$this->created = in_array ( "created_at", $aAttrs ) ? strtotime($aAttrs ["created_at"]) : time();
	}
	

	
	public function toArray() {
		return array (
				"id" => $this->id,
				"user" => $this->user->toArray(),
				"text" => $this->text,
				"created" => $this->created,
				"retweeted" => $this->retweeted 
		);
	}
	public function __toString() {
		return json_encode ( $this->toArray () );
	}
}
