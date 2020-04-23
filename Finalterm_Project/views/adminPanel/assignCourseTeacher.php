<?php
  include ('../../controllers/adminController.php');
   $sql = "select * from course";
   $courses = get($sql);
   $sql = "select * from teacher";
   $teachers = get($sql);

?>

<div class="container">
<form method="post" action="">
	<div class="row">
		<div class="col-25">
			<label for="selectCourse">Select Course</label>
		</div>
		<div class="col-75">
			<!-- <input type="text" id="fname" name="firstname" placeholder="Your name.."> -->
			<select id="selectCourse" name="selectCourse" onchange="seeTeacher()">
      <option>--Select--</option>
      <?php
        if($courses){
          for($i=0; $i<count($courses); $i++)
          {
						$newOption=$courses[$i]["Name"];
            echo $newOption;
						$newOption1=$courses[$i]["Section"];
            echo "<option>$newOption  --  $newOption1</option>";
          }
        }
      ?>
    </select>
    <script>
      function seeTeacher()
      {
        // alert('called');
        http=new XMLHttpRequest();
        var e=document.getElementById('selectCourse');
        var sec=e.options[e.selectedIndex].value;
        http.onreadystatechange=function()
        {
          if(http.readyState==4 && http.status==200)
          {
            //alert(http.responseText);
            if(http.responseText != "")
            {
              document.getElementById('error').innerHTML="This Course already assigned to "+http.responseText;
            }
            else {
              document.getElementById('error').innerHTML="";
            }
          }
        }
        http.open("GET","search_teacher.php?section="+sec,true);
  			http.send();

    }
    </script>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="newSection">Enter Course Teacher</label>
		</div>
		<div class="col-75">
      <select id="selectTeacher" name="selectTeacher">
      <option>--Select--</option>
      <?php
        if($teachers){
          for($i=0; $i<count($teachers); $i++)
          {
						$newOption=$teachers[$i]["Name"];
						$newOption1=$teachers[$i]["Department"];
            echo "<option>$newOption  --  $newOption1</option>";
          }
        }
      ?>
    </select>
		</div>

	</div>
	<div class="row">
		<center><input type="submit" name="create-section" value="Create"></center>
	</div>
  <div class="row">
  <center><input type="submit" name="seeAllAssignedCourse" value=" See All Assigned Courses"></center>
  </div>
  <div class="row">
  <center><input type="submit" name="seeAllUnAssignedCourse" value=" See All Unassigned Courses"></center>
  </div>
</form>

<center>
  <table class="content-table">

  <?php

    if(count($GLOBALS['array'])>0)
    {
      echo "<thead>
              <tr>
                <th>Course Name</th>
                <th>Section</th>
                <th>teacher Name</th>
              </tr>
            </thead>
          <tbody>";
      for($i=0; $i<count($GLOBALS['array']); $i++)
      {
        $course=$GLOBALS['array'][$i]["Course_Name"];
        $section=$GLOBALS['array'][$i]["section"];
        $name=$GLOBALS['array'][$i]["Teacher_Name"];
        echo "<tr>
              <td>$course</td>
              <td>$section</td>
              <td>$name</td>
              </tr>";
      }
    }
   ?>
   </tbody>
   </table>
</center>
</div>
