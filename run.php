<?php
  require_once 'app/bootstrap.php';
  
  $oTwitter = new Twitter();
  
  var_dump($oTwitter->searchByHashTag("Atl�tico de Madrid"));
