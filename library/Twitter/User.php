<?php
class Twitter_User {
	private $name;
	private $location;
	private $image;
	private $tweets;
	private $friends;
	private $screenName;
	
	
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
		if (! in_array ( "id", $aAttrs ))
			throw new Exception ( "El ID del usuario es obligatorio" );
		
		$this->id  = (int) $aAttrs ["id"];
		
		$this->name = in_array ( "name", $aAttrs ) ? $aAttrs ["name"] : "";
		$this->image = in_array ( "image", $aAttrs ) ? $aAttrs ["image"] : "";
		$this->location = in_array ( "location", $aAttrs ) ? $aAttrs ["location"] : "";
		$this->screenName = in_array ( "screen_name", $aAttrs ) ? $aAttrs ["screen_name"] : "";
		
		$this->tweets = in_array ( "statuses_count", $aAttrs ) ? (int) $aAttrs ["statuses_count"] : 0;
		$this->friends = in_array ( "friends_count", $aAttrs ) ? (int) $aAttrs ["friends_count"] : 0;
		
	}
	
	public function toArray (){
		return array(
				"name"=> $this->name,
				"location"=>$this->location,
				"image"=>$this->image,
				"tweets"=>$this->tweets,
				"friends"=>$this->friends,
				"screenName"=>$this->screenName
		);
	}
}