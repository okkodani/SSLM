<?php
$host="localhost";
$user="root";
$password="";
$dbname="sysslm";

$connection=mysqli_connect($host,$user,$password,$dbname);
	if (!$connection) {
		die("connection failed".mysqli_connect_error());
	}
	else{
		#echo "database connect";
	}

$selectdb=mysqli_select_db($connection,$dbname);
	if (!$selectdb) {
		die("database unselect");
	}
	else{
		#echo "database select";
	}
?>