<?php
	//session_start();
  include ('../../controllers/studentController.php');

  $id=$_COOKIE['loggedinuser'];
  $sql = "SELECT * FROM courseregistered WHERE studentId='$id'";
  $courses = get($sql);
?>

<div class="container">
<form method="post" action="">
	<div class="row">
		<div class="col-25">
			<label for="selectCourse">Select Course</label>
		</div>
		<div class="col-75">
			<select id="selectCourse" name="selectCourse">
      <option selected><?php echo $GLOBALS['selected'];?></option>
      <?php
        if($courses){
          for($i=0; $i<count($courses); $i++)
          {
						$newOption=$courses[$i]["courseName"];
						$newOption1=$courses[$i]["courseSection"];
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
			<input type="text" id="midterm" name="midterm" value="<?php echo $GLOBALS['midterm'];?>" placeholder="Midterm" readonly>
		</div>
    <div class="col-25">
			<label for="finalterm">Final Term</label>
		</div>
		<div class="col-25">
			<input type="text" id="finalterm" name="finalterm" value="<?php echo $GLOBALS['finalterm'];?>" placeholder="FinalTerm" readonly>
		</div>
  </div>
</form>
</div>
