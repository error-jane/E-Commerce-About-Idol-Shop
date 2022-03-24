<html>
<body>

<h1>History</h1>
<table border='1'>
	<tr>
		<th>order_id</th>
		<th>total_price</th>
		<th>pay_time</th>
	</tr>
<form action="logout.php">
    <input type="submit" value="Log Out" />
</form>
<?php
	session_start();
	include "db_conn.php";
	if (!isset($_SESSION['username'])) {
		header('location: 1_Get_Start.html');
	}
	else {
		$user = $_SESSION['username'];
	}
	/*
	$getUser = "SELECT * FROM customer WHERE username = '$user'";
	$run_user = mysqli_query($conn,$getUser);
	$row = mysqli_fetch_array($run_user);
	echo $row['first_name']," ",$row['last_name'];
	*/
	
	$sql = "SELECT order_id,total_price,pay_time FROM customer 
			INNER JOIN order_buy ON customer.customer_id = order_buy.cid
			LEFT JOIN payment ON order_buy.order_id = payment.oid
			WHERE customer.username = '$user'";
	
	$query = mysqli_query($conn,$sql);
	while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$oid = $result["order_id"];
		$ttp = $result["total_price"];
		$time = $result["pay_time"];
		echo "<tr><td> $oid </td><td> $ttp </td><td> $time </td></tr>";
	}
?>
<?php
mysqli_close($conn);
?>
	
</table>

</body>
</html>