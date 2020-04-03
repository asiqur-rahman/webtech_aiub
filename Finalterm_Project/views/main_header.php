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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/style.css">
	</head>
	<body>

		<div class="header-index">
			<div class="pull-right">
				<form class="" action="" method="post">
					<!-- <input class="btn btn-success" type="submit" name="home" value="Home"> -->
					<input class="btn btn-danger" type="submit" name="logout" value="Logout">
				</form>
			</div>
		</div>
