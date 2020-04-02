<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "webtech";
  $text="";
  $color="Red";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "select * from course";
  $courses = $conn->query($sql);
  $sql = "select * from teacher";
  $teachers = $conn->query($sql);

  if(isset($_POST['add-teacher']))
  {
    if(!empty($_POST['teacherName']) && !empty($_POST['teacherId']) && !empty($_POST['department']) && !empty($_POST['password']))
		{
      $name=$_POST['teacherName'];
      $id=$_POST['teacherId'];
      $dept=$_POST['department'];
      $pass=$_POST['password'];

      $sql1 = "INSERT INTO teacher (name, department, teacherId) VALUES ('$name', '$dept', '$id')";
      $sql2 = "INSERT INTO users (username, password, usertype, permission) VALUES ('$id', '$pass', 'teacher', 1)";
      if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        $text="$name assingned as new teacher (default password = $pass)";
        $color="Green";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
      else {
        {
          $text="You Must Fill up all *";
          $color="Red";
        }
      }
  }
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
			<label for="teacherName">Teacher Name</label>
		</div>
		<div class="col-75">
			<input type="text" id="teacherName" name="teacherName" placeholder="Teacher name..">
		</div>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="teacherId">Teacher ID</label>
		</div>
		<div class="col-75">
			<input type="text" id="teacherId" name="teacherId" placeholder="Teacher Id..">
		</div>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="department">Department</label>
		</div>
		<div class="col-75">
			<input type="text" id="department" name="department" placeholder="Department..">
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
		<center><input type="submit" name="add-teacher" value="Add Teacher"></center>
	</div>
</form>
</div>
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>
</body>
</html>
