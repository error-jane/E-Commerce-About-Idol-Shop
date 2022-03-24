<!DOCTYPE html>
<html>
<body>

<h1>Login</h1>
<form action = "login.php" method = "post">
	<div class="container">
		<div>
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>
		</div><br>
		<div>
			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>
		</div><br>   
		<input type="submit" value="Log In"/>
	</div>
</form>

</body>
</html>

<?php
include "db_conn.php";
  if (isset($_POST['uname']) && isset($_POST['psw'])){
	  function validate($data){
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	  }
	  $name = validate($_POST['uname']);
	  $password = validate($_POST['psw']);
	  
	  if (empty($uname)){
		  //header("Location: 1_Get_Start.html?error=Username is required");
		  exit();
	  }else if(empty($password)){
		  //header("Location: 1_Get_Start.html?error=Password is required");
		  exit();
	  }else{
		  $sql = "SELECT * FROM customer WHERE username = '$name' AND password = '$password'";
		  
		  $result = mysqli_query($conn, $sql);
		  
		  if (mysqli_num_rows($result) === 1 ) {
			  $row = mysqli_fetch_assoc($result);
			  if($row['username'] === 'admin1'){
				  header("Menu.php")
			  }else{
				  print("not admin\n");
				  print_r($row['username']);
			  }
		  }
		  else{
				//header("Location: 1_Get_Start.html?error=Incorrect Username or password");
				exit();
		  }
	  }
  }else{

	  exit();
  }
?>
