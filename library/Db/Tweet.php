<?php


final class Db_Tweet extends Db {
	
	protected $table = "tweets";
	
	
	
	public function exists ($tweet_id){
		return count($this->basicSearch($tweet_id, "id_tweet"))>0?true:false;
	}
	
	public function search ($tweet_id){
		return $this->basicSearch($tweet_id, "id_tweet");
	}
	
}
