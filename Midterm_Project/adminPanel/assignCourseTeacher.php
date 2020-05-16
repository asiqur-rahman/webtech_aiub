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

  if(isset($_POST['create-section']))
  {
    if($_POST['selectCourse']!="--Select--" && $_POST['selectTeacher']!="--Select--")
		{
      $course = explode(" -- ", $_POST['selectCourse']);
      $teacher=explode(" -- ",$_POST['selectTeacher']);
      $sql="select * from teacher WHERE name='$teacher[0]'";
      $teacherId=$conn->query($sql);
      $teacherId=mysqli_fetch_array($teacherId);
      $teacherId=$teacherId["teacherId"];
      echo $teacherId;
      $sql = "UPDATE course SET TeacherId = '$teacherId' WHERE name = '$course[0]' and Section='$course[1]';";
      if ($conn->query($sql) === TRUE) {
        $text="$teacher[0] assingned as course teacher for $course[0] section $course[1]";
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
			<label for="selectCourse">Select Course</label>
		</div>
		<div class="col-75">
			<!-- <input type="text" id="fname" name="firstname" placeholder="Your name.."> -->
			<select id="selectCourse" name="selectCourse">
      <option>--Select--</option>
      <?php
        if($courses){
          while($row=mysqli_fetch_array($courses))
          {
						$newOption=$row["Name"];
						$newOption1=$row["Section"];
            echo "<option>$newOption  --  $newOption1</option>";
          }
        }
      ?>
    </select>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="newSection">Enter Course Teacher</label>
		</div>
		<div class="col-75">
      <select id="selectTeacher" name="selectTeacher">
      <option>--Select--</option>
      <?php
        if($courses){
          while($row=mysqli_fetch_array($teachers))
          {
						$newOption=$row["Name"];
						$newOption1=$row["Department"];
            echo "<option>$newOption  --  $newOption1</option>";
          }
        }
      ?>
    </select>
		</div>

	</div>
	<div class="row">
		<center><input type="submit" name="create-section" value="Create"></center>
	</div>
</form>
</div>
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>
</body>
</html>
