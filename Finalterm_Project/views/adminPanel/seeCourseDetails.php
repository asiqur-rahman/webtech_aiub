<?php
include ('../../controllers/adminController.php');
 $sql = "select * from course";
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
			<select id="selectCourse" name="selectCourse">
      <option>--Select--</option>
      <?php
        if($courses){
          for($i=0; $i<count($courses); $i++)
          {
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
		<center><input type="submit" name="see-coursedetails" value="See Details"></center>
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
  <center>
  <table class="content-table">

    <?php
    $sl=1;
    if(count($GLOBALS['courseDetails'])>0)
    {
      echo "<thead>
        <tr>
          <th>Sl</th>
          <th>Name</th>
          <th>ID</th>
          <th>MidTerm</th>
          <th>FinalTerm</th>
        </tr>
      </thead>
      <tbody>";
      for($i=0; $i<count($GLOBALS['courseDetails']); $i++)
      {
        $id=$GLOBALS['courseDetails'][$i]["StudentId"];
        $name=$GLOBALS['courseDetails'][$i]["name"];
        $midterm=$GLOBALS['courseDetails'][$i]["midterm"];
        $finalterm=$GLOBALS['courseDetails'][$i]["finalterm"];
        echo "<tr>
          <td>$sl</td>
          <td>$name</td>
          <td>$id</td>
          <td>$midterm</td>
          <td>$finalterm</td>
        </tr>";
        $sl=$sl+1;
      }
    }
    else {
      $GLOBALS['text']="No Student Found !!";
      $GLOBALS['color']="Red";
    }
    ?>
  </tbody>
</table>
</center>
