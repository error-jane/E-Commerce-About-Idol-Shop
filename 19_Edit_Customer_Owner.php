<html>
<body>
<?php
   ini_set('display_errors', 1);
   error_reporting(~0);
   include "db_conn.php";

   $strCustomerID = null;

   if(isset($_GET["customer_id"]))
   {
	   $strCustomerID = $_GET["customer_id"];
   }
   

   $sql = "SELECT * FROM customer WHERE customer_id = '".$strCustomerID."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form action="Mysave.php" name="frmAdd" method="post">
<table width="284" border="1">
  <tr>
    <th width="120">CustomerID</th>
    <td width="238"><input type="hidden" name="txtCustomerID" value="<?php echo $result["customer_id"];?>"><?php echo $result["customer_id"];?></td>
    </tr>
  <tr>
    <th width="120">FName</th>
    <td><input type="text" name="txtFname" size="20" value="<?php echo $result["first_name"];?>"></td>
    </tr>
	<tr>
    <th width="120">LName</th>
    <td><input type="text" name="txtLname" size="20" value="<?php echo $result["last_name"];?>"></td>
    </tr>
  <tr>
    <th width="120">Email</th>
    <td><input type="text" name="txtEmail" size="20" value="<?php echo $result["email"];?>"></td>
    </tr>
  <tr>
    <th width="120">Address</th>
    <td><input type="text" name="txtAddress" size="2" value="<?php echo $result["address"];?>"></td>
    </tr>
  <tr>
    <th width="120">Password</th>
    <td><input type="hidden" name="txtPassword" size="5" value="<?php echo $result["password"];?>"><?php echo $result["password"];?></td>
    </tr>
  <tr>
    <th width="120">Username</th>
    <td><input type="text" name="txtUsername" size="5" value="<?php echo $result["username"];?>"></td>
    </tr>
	<th width="120">Phone</th>
    <td><input type="text" name="phone" size="5" value="<?php echo $result["phone"];?>"></td>
    </tr>
  </table>
  <input type="submit" name="submit" value="submit">
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>