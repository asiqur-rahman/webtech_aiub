<?php
if(!isset($_COOKIE['loggedinuser']))
{
	header("Location:../index.php");
}
if(isset($_POST['logout']))
{
	setcookie("loggedinuser","",time()-120);
	header("Location:../index.php");
}
 ?>
<html>
	<head>
		<title><?php $_COOKIE['loggedinuser']; ?></title>
		<link rel="stylesheet" href="styles/headerStyle.css">
	</head>
	<body>
		<div >
				<form class="" action="" method="post">
					<!-- <input class="btn btn-success" type="submit" name="home" value="Home"> -->
					<input class="logout_btn" type="submit" name="logout" value="Logout">
				</form>
		</div>
