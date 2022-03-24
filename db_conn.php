<?php
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_store";

$conn = mysqli_connect($sname, $uname, $password, $db_name);
$selected = mysqli_select_db($conn,$db_name)or die("database does not exsist.");

if(!$conn)
{
	echo "Connection failed!";
}
