<?php
  require_once 'app/bootstrap.php';
  
  $oTwitter = new Twitter();
  
  $aResult = $oTwitter->searchByHashTag("Atlético de Madrid");
  
  var_dump($aResult["statuses"][0]);die();
  
  $aTweets = Twitter_Tweet::getCollection($aResult["statuses"]);
  

  
  var_dump($aTweets[0]);