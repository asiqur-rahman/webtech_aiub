<?php
include ('../../controllers/adminController.php');
 $sql = "select * from course";
 $courses = get($sql);
?>

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
          for($i=0; $i<count($courses); $i++)
          {
						$newOption=$courses[$i]["Name"];
						$newOption1=$courses{$i}["Section"];
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
		<center><input type="submit" name="add-section" value="Create"></center>
	</div>
</form>
</div>
