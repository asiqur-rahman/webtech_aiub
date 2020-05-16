<?php
 include ('../../controllers/teacherController.php');
 $teacherId=$_COOKIE['loggedinuser'];
 $sql = "select * from course where teacherId='$teacherId'";
 $courses = get($sql);
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
      <option selected><?php echo $GLOBALS['selected'];?></option>
      <?php
        if(count($courses)>0){
          for($i=0; $i<count($courses); $i++)
          {
            // $newOption=$row["$coloumName"];
						$newOption=$courses[$i]["Name"];
						$newOption1=$courses[$i]["Section"];
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
  			<input type="text" id="searchById" name="searchById" value="<?php echo $GLOBALS['id'];?>" placeholder="Student id">
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
			<input type="text" id="studentName" name="studentName" value="<?php echo $GLOBALS['name'];?>" placeholder="Student Name" readonly>
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

</body>
</html>
