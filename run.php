<?php
  require_once 'app/bootstrap.php';
  
  $oTwitter = new Twitter();
  
  var_dump($oTwitter->searchByHashTag("Atlético de Madrid"));
