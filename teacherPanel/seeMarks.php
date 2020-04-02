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
        $id=$_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        $sql = "select * from $course[0]$course[2] where StudentId='$id'";
        $courseDetails = $conn->query($sql);
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
      <option>--Select--</option>
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
		<center><input type="submit" name="see-details" value="See Details"></center>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="searchById">Search By Id</label>
		</div>
		<div class="col-75">
			<input type="text" id="searchById" name="searchById" placeholder="Student idea">
		</div>
	</div>
	<div class="row">
		<center><input type="submit" name="search-by-id" value="Search"></center>
	</div>
</form>
</div>
<center><h1 style="color:<?php echo $color;?>"><?php echo $text;?><h1></center>
  <center>
  <table class="content-table">
  <thead>
    <tr>
      <th>Sl</th>
      <th>ID</th>
      <th>MidTerm</th>
      <th>FinalTerm</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sl=1;
    if($courseDetails){
      while($row=mysqli_fetch_array($courseDetails))
      {
        $id=$row["StudentId"];
        $midterm=$row["midterm"];
        $finalterm=$row["finalterm"];
        echo "<tr>
          <td>$sl</td>
          <td>$id</td>
          <td>$midterm</td>
          <td>$finalterm</td>
        </tr>";
        $sl=$sl+1;
      }
    }
    ?>
  </tbody>
</table>
</center>
</body>
</html>
