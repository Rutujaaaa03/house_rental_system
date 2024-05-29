<?php 

$db = new mysqli('localhost','root','root@2003','renthouse');


if($db->connect_error){
	echo "Error connecting database";
}

 ?>