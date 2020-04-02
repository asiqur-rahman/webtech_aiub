<?php
	session_start();
	$dbuser="root";
	$dbpass="";
	$db="webtech";
	$link = mysqli_connect("localhost", $dbuser,$dbpass, "webtech") or die($link);

	$uname="";
	$upass="";
	$uemail="";
	$err_invalid="";
	$has_error=false;
	$all_ok=0;

	if(isset($_POST['login-submit']))
	{
		if(empty($_POST['uname']))
		{
			$has_error=true;
			$uname="";
		}
		else
		{
			$uname=stripcslashes($_POST['uname']);
			$uname=mysqli_real_escape_string($link,$uname);
		}

		if(empty($_POST['upass']))
		{
			$has_error=true;
			$upass="";
		}
		else
		{
			$upass=stripcslashes($_POST['upass']);
			$upass=mysqli_real_escape_string($link,$upass);
		}
		if(!$has_error)
		{
			mysqli_select_db($link,"webtech") or die("unable to find database");

			$result=mysqli_query($link,"select * from users where username='$uname' and password='$upass'") or die("Failed ! ".mysql_error());

			$row=mysqli_fetch_array($result);

			if($row['username'] == $uname && $row['password']==$upass)
			{
				if($row['usertype'] == "admin")
				{
				setcookie("loggedinuser",$uname,time()+120);
				header("Location:adminPanel/adminDashboard.php");
				}
				else if($row['usertype']=="student")
				{
				setcookie("loggedinuser",$uname,time()+120);
				header("Location:studentPanel/studentDashboard.php");
				}
				else if($row['usertype']=="teacher")
				{
				setcookie("loggedinuser",$uname,time()+120);
				header("Location:teacherPanel/teacherDashboard.php");
				}
				else if($row['usertype']=="superAdmin")
				{
				setcookie("loggedinuser",$uname,time()+120);
				header("Location:superAdminPanel/superAdminDashboard.php");
				}
			}

			else
			{
				$err_invalid="Invalid Username Password";
				//echo $err_invalid;
			}
		}

	}

	function checking($check)
	{
		$not=1;
		if($_GLOBALS['adminUser']==$check || $_GLOBALS['adminPass']==$check)
		{
			$not=0;
			return true;

		}
		else if($not==1)
		{
			$data = file_get_contents('admin.txt');
		if((strpos($check, "uname:".$uname )!= FALSE || strpos($check, "pass:".$pass) != FALSE))
		{
			return true;
		}
		}
		else{
			return false;
		}
	}

	// registration

	if(isset($_POST['registration-submit']))
	{

		if(!filter_var($_POST['uemail'], FILTER_VALIDATE_EMAIL))
		{
			$all_ok=1;
			$uname=test_input($_POST['uname']);
			$upass=test_input($_POST['upass']);
		}
		else
		{
			$all_ok=0;
			$uname=test_input($_POST['uname']);
			$upass=test_input($_POST['upass']);
			$email=test_input($_POST['uemail']);
		}


		if($all_ok==0)
		{
		$uname=stripcslashes($_POST['uname']);
		$uname=mysqli_real_escape_string($link,$uname);

		$pass=stripcslashes($_POST['upass']);
		$pass=mysqli_real_escape_string($link,$pass);

		mysqli_select_db($link,"webtech") or die("unable to find database");

		$result=mysqli_query($link,"INSERT INTO `users` (`id`, `username`, `password`, `usertype`) VALUES (NULL, '$uname', '$upass', 'student');") or die("Failed ! ".mysql_error());

		if($result==1)
		{
			session_start();
			session_unset();
			session_destroy();
			header("Location:index.html");
		}
		}
	}
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
?>
