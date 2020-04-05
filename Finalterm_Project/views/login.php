<?php
		require_once ('../controllers/loginController.php');
		if(isset($_GET["error"]))
		{
			$error=$_GET["error"];
		}
		else {
			$error="";
		}

?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<title>Login</title>
		<script>

			function signup()
			{
				alert("Unfortunately! Sign up in unavailable ");
				return false;
			}
		</script>
	</head>
	<body>
<!--login starts -->
<div class="center-login">
	<h1 class="text text-center">User Login</h1>
	<hr>
	<p>Sign in with your username.</p>
	<hr>
	<form action="#" method="post" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Username</h4>
			<input type="text" class="form-control" id="uname" name="uname" onkeyup="keypress()" placeholder="your username ...">
		</div>
		<div class="form-group">
			<h4 class="text">Password</h4>
			<input type="password" class="form-control" id="upass" name="upass" onkeyup="keypress()" placeholder="your password ...">
		</div>
		<div class="form-group text-center" >
			<div id="error" style="color:red; font-weight:bold;">
				<?php echo $error; ?>
			</div>
			<div id="btn">
				<input type="submit" id="submit" name="login-submit" class="btn btn-danger" value="Login" class="form-control" style=" width:100%;">
			</div>
		</div>
	</form>
		<div class="form-group text-center">

			<a href="#" onclick="signup()">Not registered yet? Sign Up</a>
		</div>
</div>

<!--login ends -->
<?php include 'main_footer.php';?>
