<?php
	session_start();
	$priusername = $_POST['Username'];
	$password  = $_POST['Password'];
	
	if ($priusername&&$password)
	{
		$connect = mysqli_connect("localhost","root","") or die("Couldn't Connect");
		mysqli_select_db($connect,"revised") or die("Cant find DB");
		
		$query = mysqli_query($connect,"SELECT * FROM prilogin WHERE Username = '$priusername'");
		
		$numrows = mysqli_num_rows($query);
		
		if ($numrows!=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row['Username'];
				$dbpassword = $row['Password'];
			}
			if ($priusername == $dbusername && $password == $dbpassword)
			{
				  echo "<center>Login Successfull..!! <br/>Redirecting you to HomePage! </br>If not Goto <a href='index.php'> Here </a></center>";
			  echo "<meta http-equiv='refresh' content ='3; url=index.php'>";
				$_SESSION['priusername'] = $priusername;
			} else{
				$message = "Username and/or Password incorrect.";
  			echo "<script type='text/javascript'>alert('$message');</script>";
			  echo "<center>Redirecting you back to Login Page! If not Goto <a href='index.php'> Here </a></center>";
			  echo "<meta http-equiv='refresh' content ='1; url=index.php'>";}
			
		}else
			die("User not exist");
		
	}
	else
	die("Please enter Username and Password");
	?>