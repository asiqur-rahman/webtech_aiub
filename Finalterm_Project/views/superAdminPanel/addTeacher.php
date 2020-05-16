<?php
  include ('../../controllers/superAdminController.php');
?>


<div class="container">
<form method="post" action="">
	<div class="row">
		<div class="col-25">
			<label for="teacherName">Teacher Name</label>
		</div>
		<div class="col-75">
			<input type="text" id="teacherName" name="teacherName" placeholder="Teacher name..">
		</div>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="teacherId">Teacher ID</label>
		</div>
		<div class="col-75">
			<input type="text" id="teacherId" name="teacherId" onkeyup="uniqueTest()" placeholder="Teacher Id..">
		</div>
	</div>
  <script>
    function uniqueTest()
    {
      // alert('called');
      http=new XMLHttpRequest();
      var sec=document.getElementById('teacherId').value;
      http.onreadystatechange=function()
      {
        if(http.readyState==4 && http.status==200)
        {
          //alert(http.responseText);
          if(http.responseText != "")
          {
            document.getElementById('error').innerHTML="This TeacherID already used : "+http.responseText;
          }
          else {
            document.getElementById('error').innerHTML="";
          }
        }
      }
      http.open("GET","unique_Test.php?idname="+sec,true);
      http.send();

  }
  </script>
  <div class="row">
		<div class="col-25">
			<label for="department">Department</label>
		</div>
		<div class="col-75">
			<input type="text" id="department" name="department" placeholder="Department..">
		</div>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="password">Login Password</label>
		</div>
		<div class="col-75">
			<input type="text" id="password" name="password" placeholder="Login Password..">
		</div>
	</div>

	</div>
	<div class="row">
		<center><input type="submit" name="add-teacher" value="Add Teacher"></center>
	</div>
</form>
</div>
