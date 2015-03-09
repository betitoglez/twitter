<?php
  require_once 'app/bootstrap.php';
  
  $aArguments = $_SERVER["argv"];
  
  if (count ($aArguments)<2)
  	die("Falta el Hashtag!");
  
  $oTwitter = new Twitter();  
  $aResult = $oTwitter->searchByHashTag($aArguments[1]); 
  $aTweets = Twitter_Tweet::getCollection($aResult["statuses"]);
    
  foreach ($aTweets as $oTweet){
  	$oTweet->save();
  }

  

  
  