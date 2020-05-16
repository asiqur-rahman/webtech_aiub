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
		<center><input type="submit" name="see-details" value="See Details"></center>
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
</form>
</div>
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
    $courseDetails=$GLOBALS['courseDetails'];
    if($courseDetails){
      for($i=0; $i<count($courseDetails); $i++)
      {
        $id=$GLOBALS['courseDetails'][$i]["StudentId"];
        $midterm=$courseDetails[$i]["midterm"];
        $finalterm=$courseDetails[$i]["finalterm"];
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
