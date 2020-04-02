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
  $selected="--Select--";
  $midterm="";
  $finalterm="";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $teacherId=$_COOKIE['loggedinuser'];
  $sql = "select * from course where teacherId='$teacherId'";
  $courses = $conn->query($sql);


  if(isset($_POST['search-by-id']))
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']))
		  {
        $selected=$_POST['selectCourse'];
        $id=$_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        $sql = "select * from students where StudentId='$id'";
        $courseDetails = $conn->query($sql);
        $courseDetails=mysqli_fetch_array($courseDetails);
        $studentName=$courseDetails["Name"];

        $sql = "select * from $course[0]$course[2] where StudentId='$id'";
        $details = $conn->query($sql);
        $details=mysqli_fetch_array($details);
        $midterm=$details["midterm"];
        $finalterm=$details["finalterm"];

      }
      else
      {
        {
          $text="You Must Fill up all *";
          $color="Red";
        }
      }
  }

  if(isset($_POST['update-marks']))
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']))
		  {
        $selected=$_POST['selectCourse'];
        $id=$_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        $midterm=$_POST['midterm'];
        $finalterm=$_POST['finalterm'];
        $sql = "select * from $course[0]$course[2] where StudentId='$id'";
        $sql = "UPDATE ninea SET midterm = $midterm, finalterm = $finalterm WHERE StudentId = $id;";
        if ($conn->query($sql) === TRUE) {
          $text="Marks Updated Successfully ";
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
		<div class="col-25">
			<label for="midterm">Mid Term</label>
		</div>
		<div class="col-25">
			<input type="text" id="midterm" name="midterm" value="<?php echo $midterm;?>" placeholder="Midterm" >
		</div>
    <div class="col-25">
			<label for="finalterm">Final Term</label>
		</div>
		<div class="col-25">
			<input type="text" id="finalterm" name="finalterm" value="<?php echo $finalterm;?>" placeholder="FinalTerm" >
		</div>
	</div>
	<div class="row">
		<input type="submit" name="update-marks" value="Update">
	</div>

</form>
</div>
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>

</body>
</html>
