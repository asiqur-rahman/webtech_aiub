<?php include 'main_header.php';?>
<script>
	function submitt()
	{
		document.getElementsById("error").innerHTML="uname";
		var uname=document.getElementsById("uname").value;
		var upass=document.getElementsById("upass").value;
		var sbt=document.getElementsById("submit");
		document.getElementById("error").value=uname;
		if(!(uname=="" && upass==""))
		{
			sbt.style.display = "block";
		}
		else {
			sbt.style.display = "none";
		}
	}
</script>
</head>
<body>

	<div class="header-index">
		<a class="btn"><b class="text-white name">Webtech Final Project</b></a>
		<div class="pull-right">
			<a class="btn btn-danger" href="signup.php">SignUp</a>
		</div>

	</div>
<!--login starts -->
<div class="center-login">
	<h1 class="text text-center">Login</h1>
	<form action="dashboard.php" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Username</h4>
			<input type="text" class="form-control" id="uname" onkeyup="submitt()">
		</div>
		<div class="form-group">
			<h4 class="text">Password</h4>
			<input type="password" class="form-control" id="upass" onkeyup="submitt()">
		</div>
		<div class="form-group text-center">
			<p id="error">

			</p>
			<input type="submit" id="submit" class="btn btn-danger" value="Login" class="form-control">
		</div>
		<div class="form-group text-center">

			<a href="signup.php" >Not registered yet? Sign Up</a>
		</div>
</div>

<!--login ends -->
<?php include 'main_footer.php';?>
