<?php 

DEFINE ('host','127.0.0.1');
DEFINE('user','root');
DEFINE('pass','hackEd56');
DEFINE('name','groupdata');

$conn = mysqli_connect(host,user,pass,name) or 
die ('Error in connection '.mysqli_connect_error());

?>