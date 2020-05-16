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
  $sql = "select * from course";
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

  if(isset($_POST['add-student']))
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']))
		  {
        $selected=$_POST['selectCourse'];
        $id=$_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        // $sql = "select * from $course[0]$course[2] where StudentId='$id'";
        $sql1 = "INSERT INTO $course[0]$course[2] (StudentId) VALUES ('$id')";
        echo $sql1;
        $sql2 = "INSERT INTO courseregistered (studentId,courseName,courseSection) VALUES ('$id','$course[0]','$course[2]')";
        echo $sql2;
        if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
          $text="New Student $id added ";
          $color="Green";
          } else {
              echo "Error: " . $sql1 . "<br>" . $conn->error;
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
	<!-- <div class="row">
		<center><input type="submit" name="see-details" value="See Details"></center>
	</div> -->

  <div class="row">
		<div class="col-25">
			<label for="searchById">Search By Id</label>
		</div>
		<div class="col-75">
			<input type="text" id="searchById" name="searchById"
  			<input type="text" id="studentName" name="studentName" value="<?php echo $id?>" placeholder="Student id">
		</div>
	</div>
	<div class="row">
		<center><input type="submit" name="search-by-id" value="Search"></center>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="studentName">Student Name</label>
		</div>
		<div class="col-75">
			<input type="text" id="studentName" name="studentName" value="<?php echo $studentName?>" placeholder="Student idea" readonly>
		</div>
	</div>
	<div class="row">
		<center><input type="submit" name="add-student" value="Add"></center>
	</div>

</form>
</div>
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>

</body>
</html>
