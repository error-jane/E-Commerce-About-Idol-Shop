
<?php
	include "db_conn.php";
	#Receive data from the previous form
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = trim($_POST['confirmpassword']);
	$email = $_POST['email'];
	$first = $_POST['first'];
	$last = $_POST['last'];
	$address = $_POST['address'];
	$phone = $_POST['phone']; 
	
	mysqli_set_charset($conn, "utf8");
	#Connected successfully
	if($password == $confirmpassword){
	mysqli_query($conn, "INSERT INTO customer (customer_id, username, password, email, first_name, last_name,address,phone) VALUES
			('NULL', '$username', '$password', '$email', '$first', '$last', '$address','$phone')");
	
	}else{
		echo("$password != $confirmpassword");
	}
?>
<?php
mysqli_close($conn);
?>