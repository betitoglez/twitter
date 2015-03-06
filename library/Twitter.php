<?php
class Twitter {
	
	private static $_twitterCore;
	
	
	public function __construct(){
		if (null === self::$_twitterCore){
			$oApp = App::getApp();			
			self::$_twitterCore = new Twitter_Core($oApp->getResource("twitter.consumerKey"), $oApp->getResource("twitter.consumerSecret"),
											$oApp->getResource("twitter.token"),$oApp->getResource("twitter.tokenSecret")
					);
		}
	}
	
	
	public function searchByHashTag ($hashtag){
		$sBaseUrl = "/search/tweets";	
		return self::$_twitterCore->get($sBaseUrl,array("q"=>"#$hashtag"));
	}
	
	public function searchByUsername ($username){
		$sBaseUrl = "/search/tweets";
		return self::$_twitterCore->get($sBaseUrl,array("q"=>"@$username"));
	}
	
}
