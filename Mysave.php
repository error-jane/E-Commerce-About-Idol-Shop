<html>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "root";
	$dbName = "my_store";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "UPDATE customer SET 
			first_name = '".$_POST["txtFname"]."' ,
			last_name = '".$_POST["txtLname"]."' ,
			email = '".$_POST["txtEmail"]."' ,
			address = '".$_POST["txtAddress"]."' ,
			username = '".$_POST["txtUsername"]."',
			phone = '".$_POST["phone"]."'
			WHERE customer_id = '".$_POST["txtCustomerID"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "Record update successfully";
	}

	mysqli_close($conn);
?>
</body>
</html>