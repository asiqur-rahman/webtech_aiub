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
			<label for="courseName">Course Name</label>
		</div>
		<div class="col-75">
			<input type="text" id="courseName" name="courseName" placeholder="Teacher name..">
		</div>
	</div>

	</div>
	<div class="row">
		<center><input type="submit" name="add-course" value="Add Course"></center>
	</div>
</form>
</div>
</body>
</html>
