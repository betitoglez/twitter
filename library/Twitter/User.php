<?php
class Twitter_User extends Db_AbstractSupport {
	protected $name;
	protected $location;
	protected $image;
	protected $tweets;
	protected $friends;
	protected $screenName;
	protected $id;
	
	
	protected $oDb;
	
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param number $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return the $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * @return the $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @return the $tweets
	 */
	public function getTweets() {
		return $this->tweets;
	}

	/**
	 * @return the $friends
	 */
	public function getFriends() {
		return $this->friends;
	}

	/**
	 * @return the $screenName
	 */
	public function getScreenName() {
		return $this->screenName;
	}

	/**
	 * @param Ambigous <string, unknown> $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @param Ambigous <string, unknown> $location
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * @param field_type $image
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * @param number $tweets
	 */
	public function setTweets($tweets) {
		$this->tweets = $tweets;
	}

	/**
	 * @param number $friends
	 */
	public function setFriends($friends) {
		$this->friends = $friends;
	}

	/**
	 * @param Ambigous <string, unknown> $screenName
	 */
	public function setScreenName($screenName) {
		$this->screenName = $screenName;
	}

	public function __construct(Array $aAttrs) {

		if (! array_key_exists ( "id", $aAttrs ))
			throw new Exception ( "El ID del usuario es obligatorio" );
		
		$this->id  =  $aAttrs ["id"];
		
		$this->name = array_key_exists ( "name", $aAttrs ) ? utf8_decode($aAttrs ["name"]) : "";
		$this->image = array_key_exists ( "profile_image_url", $aAttrs ) ? $aAttrs ["profile_image_url"] : "";
		$this->location = array_key_exists ( "location", $aAttrs ) ? utf8_decode($aAttrs ["location"]) : "";
		$this->screenName = array_key_exists ( "screen_name", $aAttrs ) ? $aAttrs ["screen_name"] : "";
		
		$this->tweets = array_key_exists ( "statuses_count", $aAttrs ) ? (int) $aAttrs ["statuses_count"] : 0;
		$this->friends = array_key_exists ( "friends_count", $aAttrs ) ? (int) $aAttrs ["friends_count"] : 0;
		
		$this->oDb = new Db_User();
		
	}
	
	public function toArray (){
		return array(
				"id_user"=>$this->id,
				"name"=> $this->name,
				"location"=>$this->location,
				"image"=>$this->image,
				"tweets"=>$this->tweets,
				"friends"=>$this->friends,
				"screen"=>$this->screenName
		);
	}
	
	
}