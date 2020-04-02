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
    if(!empty($_POST['teacherName']) && !empty($_POST['teacherId']) && !empty($_POST['password']))
		{
      $name=$_POST['teacherName'];
      $id=$_POST['teacherId'];
      $pass=$_POST['password'];

      $sql = "INSERT INTO users (username, password, usertype, permission) VALUES ('$id', '$pass', 'admin', 1)";
      if ($conn->query($sql) === TRUE) {
        $text="$name assingned as new Admin (default password = $pass)";
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
		<center><input type="submit" name="add-teacher" value="Add Admin"></center>
	</div>
</form>
</div>
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>
</body>
</html>
