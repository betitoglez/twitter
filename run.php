<?php
  require_once 'app/bootstrap.php';
  
 $oCon = new Twitter_Core("sCWy7FemISav2vlOOgwfHZx6g", "tVgoEALo9a2iK8M3Z9GchXAZyJ42xc1Br1wzleeQaOfpacpU1m",
"703201675-3WYFdRelRx9mTJ6Ri0C3jwN4HnfH40fVByskQ4rD","rVtNZxzMrva5wxr9bbe29fuxB8qInkRXffiJ4DGMrPm2m");
 
 var_dump($oCon->get("account/verify_credentials"));