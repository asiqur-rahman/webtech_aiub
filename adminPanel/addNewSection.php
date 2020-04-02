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

  if(isset($_POST['create-section']))
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['newSection']))
		{
      $course = explode(" ", $_POST['selectCourse']);
      $sec=$_POST['newSection'];
      $sql1 = "INSERT INTO course (name, section) VALUES ('$course[0]', '$sec')";
      $sql2 = "CREATE TABLE $course[0]$sec (
              id int primary key,
              studentId varchar(20),
              midterm int,
              finalterm int
              );";
      if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        $text="New Section $sec for course $course[0] created ";
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
			<label for="newSection">Enter New Section</label>
		</div>
		<div class="col-75">
			<input type="text" id="newSection" name="newSection" placeholder="New Section..">
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
