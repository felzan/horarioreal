<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "horarioreal";
$con = mysqli_connect($host,$user,$pass,$db);

if(!$con)
  return($con);
return(FALSE);

?>