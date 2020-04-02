<?php
	//session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "webtech";
  $text="";
  $color="Red";
  $course="";
  $courseTeacher="";
  $courseDetails="";
  $midterm="";
  $finalterm="";
  $selected="--Select--";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $id=$_COOKIE['loggedinuser'];
  $sql = "SELECT * FROM courseregistered WHERE studentId='$id'";
  $courses = $conn->query($sql);

  if(isset($_POST['see-details']))
  {
    if($_POST['selectCourse']!="--Select--" )
		{
      $selected=$_POST['selectCourse'];
      $course = explode(" ", $_POST['selectCourse']);

      $sql2 = "select * from $course[0]$course[2] where studentId='$id'";
      $courseResults = $conn->query($sql2);
      $courseResults = mysqli_fetch_array($courseResults);
      $midterm=$courseResults["midterm"];
      $finalterm=$courseResults["finalterm"];
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
      <option selected><?php echo $selected;?></option>
      <?php
        if($courses){
          while($row=mysqli_fetch_array($courses))
          {
						$newOption=$row["courseName"];
						$newOption1=$row["courseSection"];
            echo "<option>$newOption  --  $newOption1</option>";
          }
        }
      ?>
    </select>
		</div>
	</div>
	<div class="row">
		<center><input type="submit" name="see-details" value="See Details"></center>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="midterm">Mid Term</label>
		</div>
		<div class="col-25">
			<input type="text" id="midterm" name="midterm" value="<?php echo $midterm;?>" placeholder="Midterm" readonly>
		</div>
    <div class="col-25">
			<label for="finalterm">Final Term</label>
		</div>
		<div class="col-25">
			<input type="text" id="finalterm" name="finalterm" value="<?php echo $finalterm;?>" placeholder="FinalTerm" readonly>
		</div>
  </div>
</form>
</div>
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>
</body>
</html>
