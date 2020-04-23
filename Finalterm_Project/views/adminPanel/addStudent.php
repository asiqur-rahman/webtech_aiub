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
			<select id="selectCourse" name="selectCourse" onchange="selectionChange()">
      <option selected><?php echo $GLOBALS['selected'];?></option>
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
    <script>
      function selectionChange()
      {
        var e=document.getElementById('selectCourse');
        var sec=e.options[e.selectedIndex].value;
        if(sec!="-- select --")
        {
          document.getElementById("search-by-id").disabled = false;
          document.getElementById("add-student").disabled = false;
        }
        else {
          document.getElementById("search-by-id").disabled = true;
          document.getElementById("add-student").disabled = true;
        }
      }
    </script>
		</div>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="searchById">Search By ID</label>
		</div>
		<div class="col-75">
  			<input type="text" id="searchById" onkeyup="searching()" name="searchById" value="<?php echo $GLOBALS['studentID']; ?>" placeholder="Student id">
		</div>
	</div>
  <script>
    function searching()
    {
      http=new XMLHttpRequest();
      var sk=document.getElementById('searchById').value;
			var section=document.getElementById('selectCourse').value;
      document.getElementById('search_results').innerHTML="ID: "+sk+" Section: "+section;
      http.onreadystatechange = function()
			{
        // alert(http.readyState);
				if(http.readyState==4 && http.status==200)
				{
          //alert(http.responseText);
					document.getElementById('search_results').innerHTML=http.responseText;
				}
			}
			http.open("GET","search_student.php?sk="+sk+"&section="+section,true);
			http.send();
    }
  </script>
  <center><div id="search_results" style="padding:10px;"></div></center>
	<div class="row">
		<center><input type="submit" name="search-by-id" value="Search" ></center>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="studentName">Student Name</label>
		</div>
		<div class="col-75">
			<input type="text" id="studentName" name="studentName" value="<?php echo $GLOBALS['studentName'];?>" placeholder="Student name" readonly>
		</div>
	</div>
	<div class="row">
		<center><input type="submit" name="add-student" value="Add" ></center>
	</div>

</form>
</div>
