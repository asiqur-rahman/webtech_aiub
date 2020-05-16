<?php
  include ('../../controllers/superAdminController.php');
?>

<html>
<head>
	<link rel="stylesheet" href="../css/adminStyle.css">
</head>
<body>
<div class="container">
<form method="post" action="">
	<div class="row">
		<div class="col-25">
			<label for="teacherName">Admin Name</label>
		</div>
		<div class="col-75">
			<input type="text" id="teacherName" name="teacherName" placeholder="Teacher name..">
		</div>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="teacherId">Admin ID</label>
		</div>
		<div class="col-75">
			<input type="text" id="teacherId" name="teacherId" placeholder="Teacher Id..">
		</div>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="password">Login Password</label>
		</div>
		<div class="col-75">
			<input type="text" id="password" name="password" placeholder="Login Password..">
		</div>
	</div>

	</div>
	<div class="row">
		<center><input type="submit" name="add-admin" value="Add Admin"></center>
	</div>
</form>
</div>
</body>
</html>
