
<?php
session_start();
include "db_conn.php";
  if (isset($_POST['uname']) && isset($_POST['psw'])){
	  function validate($data){
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	  }
	  $uname = validate($_POST['uname']);
	  $password = validate($_POST['psw']);
	  
	  if (empty($uname)){
		  header("Location: 1_Get_Start.html?error=Username is required");
		  exit();
	  }else if(empty($password)){
		  header("Location: 1_Get_Start.html?error=Password is required");
		  exit();
	  }else{
		  $sql = "SELECT * FROM customer WHERE username = '$uname' AND password = '$password'";
		  
		  $result = mysqli_query($conn, $sql);
		  
		  if (mysqli_num_rows($result) === 1 ) {
			  $row = mysqli_fetch_assoc($result);
			  if($row['username'] === 'admin' and $row['password'] === '123' ){
				  header("Location: Menu.php");
			  }else{
				  header("Location: 11_History.php");
			  }
			  $_SESSION['username'] = $uname;
		  }
		  else{
				header("Location: 1_Get_Start.html?error=Incorrect Username or password");
				exit();
		  }
	  }
  }else{

	  exit();
  }
?>
<?php
mysqli_close($conn);
?>
