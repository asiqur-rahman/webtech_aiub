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

  if(isset($_POST['add-course']))
  {
    if(!empty($_POST['courseName']) )
		{
      $name=$_POST['courseName'];
      $sec="a";
      $sql1 = "INSERT INTO course (name, section) VALUES ('$name','a')";
      $sql2 = "CREATE TABLE $name$sec (
              id int primary key,
              studentId varchar(20),
              midterm int,
              finalterm int
              );";
      if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        $text="$name was added as new Course)";
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
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>
</body>
</html>
