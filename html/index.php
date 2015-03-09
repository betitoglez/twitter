<?php
require_once '../app/bootstrap.php';

$bFetchedFromCache = false;
if (($aTweetsFromCache = Cache::getInstance()->get("tweets"))!==false &&
   $aTweetsFromCache["time"]>time()){
	$bFetchedFromCache = true;
	$aTweets = $aTweetsFromCache["tweets"];
}else{
	$oTweets = new Db_Tweet();
	$aTweets = $oTweets->getTweets();
	Cache::getInstance()->set("tweets", array("tweets"=>$aTweets,"time"=>time()+900));
}


echo Twig::getInstance()->render("index.tmpl",array(
		"tweets" => $aTweets ,
		"fromCache" => $bFetchedFromCache
));