<html>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$sname = "localhost";
	$uname = "root";
	$password = "root";
	$dbName = "my_store";

	$conn = mysqli_connect($sname,$uname,$password,$db_name);

	$sql = "UPDATE customer SET 
			Fname = '".$_POST["txtFname"]."' ,
			Lname = '".$_POST["txtLname"]."' ,
			email = '".$_POST["txtemail"]."' ,
			username = '".$_POST["txtUname"]."' ,
			address = '".$_POST["txtaddress"]."' 
			WHERE customer_id = '".$_POST["txtid"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "Record update successfully";
	}

	mysqli_close($conn);
?>
</body>
</html>