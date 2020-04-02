<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "webtech";
  $text="";
  $color="Red";
  $course="";
  $courseTeacher="";
  $courseDetails="";
  $id="";
  $studentName="";
  $selected="--select--";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $teacherId=$_COOKIE['loggedinuser'];
  $sql = "select * from course where teacherId='$teacherId'";
  $courses = $conn->query($sql);

  if(isset($_POST['see-details']))
  {
    if($_POST['selectCourse']!="--Select--" )
		{
      $selected=$_POST['selectCourse'];
      $course = explode(" ", $_POST['selectCourse']);
      $sql = "select * from $course[0]$course[2]";
      $courseDetails = $conn->query($sql);
      $sql = "select teacher from course where name='$course[0]' and section='$course[2]'";
      $courseTeacher=$conn->query($sql);
      }
      else {
        {
          $text="You Must Fill up all *";
          $color="Red";
        }
      }
  }

  if(isset($_POST['search-by-id']))
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']))
		  {
        $selected=$_POST['selectCourse'];
        $id=$_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        // $sql = "select * from $course[0]$course[2] where StudentId='$id'";
        $sql = "select * from students where StudentId='$id'";
        $courseDetails = $conn->query($sql);
        $courseDetails=mysqli_fetch_array($courseDetails);
        $studentName=$courseDetails["Name"];
      }
      else
      {
        {
          $text="You Must Fill up all *";
          $color="Red";
        }
      }
  }

  if(isset($_POST['take-attendance']))
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']))
		  {
        $selected=$_POST['selectCourse'];
        $id=$_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        $sql = "select * from $course[0]$course[2]";
        // $sql = "INSERT INTO $course[0]$course[2] (id,StudentId) VALUES ('','$id')";
        if ($conn->query($sql) === TRUE) {
          $text="New Student $id added ";
          $color="Green";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
      }
      else
      {
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
      <option selected><?php echo $selected;?></option>
      <?php
        if($courses){
          while($row=mysqli_fetch_array($courses))
          {
            // $newOption=$row["$coloumName"];
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
		<center><input type="submit" name="take-attendance" value="Take Attendance"></center>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="studentName">Student Name</label>
		</div>
		<div class="col-25">
			<input type="text" id="studentName" name="studentName" value="<?php echo $id?>" placeholder="Student Name" readonly>
		</div>
    <div class="col-25">
			<label for="studentName">Student Id</label>
		</div>
		<div class="col-25">
			<input type="text" id="studentName" name="studentName" value="<?php echo $studentName?>" placeholder="Student Id" readonly>
		</div>

    <div class="row">
      <div class="col-50">
  		<center><input type="submit" name="present" value="Present"></center>
      </div>
      <div class="col-50">
      <center><input type="submit" name="absent" value="Absent"></center>
      </div>
  	</div>

	</div>
</form>
</div>
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>

</body>
</html>
