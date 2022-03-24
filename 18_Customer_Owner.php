<html>
<body>
<h1>Customers</h1>
<form action="18_Customer_Owner.php" method = "post">
	<div class="container">
		<input type="text" placeholder="Search for names..." name="search">
		<input type="submit" value="Search"/>
    </div>
</form>
<?php
	include "db_conn.php";
	ini_set('display_errors', 1);
	error_reporting(~0);

	$sql = "SELECT * FROM customer";

	$query = mysqli_query($conn,$sql);
?>
<table border='1'>
	<tr>
		<th>customer_id</th>
		<th>username</th>
		<th>email</th>
		<th>first_name</th>
		<th>last_name</th>
		<th>password</th>
		<th>address</th>
		<th>phone</th>
		<th></th>
	</tr>
<?php
if (empty($_POST['search'])){
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
?>
  <tr>
    <td><div align="center"><?php echo $result["customer_id"];?></div></td>
    <td><?php echo $result["username"];?></td>
    <td><?php echo $result["email"];?></td>
    <td><div align="center"><?php echo $result["first_name"];?></div></td>
    <td align="right"><?php echo $result["last_name"];?></td>
    <td align="right"><?php echo $result["password"];?></td>
	<td align="right"><?php echo $result["address"];?></td>
	<td align="right"><?php echo $result["phone"];?></td>
	<td align="center"><a href="19_Edit_Customer_Owner.php?customer_id=<?php echo $result["customer_id"];?>">Edit</a></td>
  </tr>
<?php
	}
}else{
	$searchINPUT = $_POST['search'];
	$sql = "SELECT * FROM customer WHERE username LIKE '$searchINPUT%'";

	$query = mysqli_query($conn,$sql);
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)){
?>
	<tr>
    <td><div align="center"><?php echo $result["customer_id"];?></div></td>
    <td><?php echo $result["username"];?></td>
    <td><?php echo $result["email"];?></td>
    <td><div align="center"><?php echo $result["first_name"];?></div></td>
    <td align="right"><?php echo $result["last_name"];?></td>
    <td align="right"><?php echo $result["password"];?></td>
	<td align="right"><?php echo $result["address"];?></td>
	<td align="right"><?php echo $result["phone"];?></td>
	<td align="center"><a href="19_Edit_Customer_Owner.php?customer_id=<?php echo $result["customer_id"];?>">Edit</a></td>
  </tr>
<?php
	}
	}
?>
</table>
<?php
mysqli_close($conn);
?>
</body>
</html>