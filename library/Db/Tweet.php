<?php


final class Db_Tweet extends Db {
	
	protected $table = "tweets";
	
	
	
	public function exists ($tweet_id){
		return count($this->basicSearch($tweet_id, "id_tweet"))>0?true:false;
	}
	
	public function search ($tweet_id){
		return $this->basicSearch($tweet_id, "id_tweet");
	}
	
	public function getTweets (){
		$sSql = "SELECT text,location,name,image FROM `tweets` LEFT JOIN users ON tweets.id_user = users.id";
		$oStament = $this->getAdapter()->prepare($sSql);
		$oStament->execute();
		return $oStament->fetchAll();		
	}
	
}
