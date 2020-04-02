<?php
$GLOBALS['pageName']="../dashboard.php";
	//session_start();
	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../index.html");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-120);
		header("Location:../index.html");
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <link rel="stylesheet" href="../css/dashboardstyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header><?php echo $_COOKIE['loggedinuser'];?></header>
      <ul>
        <li><a href="?page=addCourseTeacher"><i class="fas fa-link"></i>Assign Course Teacher</a></li>
        <li><a href="?page=addStudent"><i class="fas fa-stream"></i>Add Student</a></li>
        <li><a href="?page=addNewSection"><i class="fas fa-calendar-week"></i>Add New Section</a></li>
				<li><a href="?page=seeDetails"><i class="fas fa-calendar-week"></i>See Course Details</a></li>
      </ul>
      <form action="" method="post">
				<!-- <input class="logout" type="submit" name="logout" value="Log out" style="padding: 7px; width: 100px;"> -->
				<div class="logout">
						<input id="logout" type="submit" name="logout" value="Log out" style="padding: 7px; width: 100px;">
				</div>
			</form>
    </div>
 <section>
   <div class="mainbody">
     <div class="header">
       <?php
        if (isset($_GET['page'])) {
          if($_GET['page']=="addCourseTeacher"){
            echo "<h1>add Course Teacher</h1>";
            $GLOBALS['pageName']="assignCourseTeacher.php";
          }
          else if($_GET['page']=="addStudent"){
            echo "<h1>add Student</h1>";
						$GLOBALS['pageName']="addStudent.php";
          }
          else if($_GET['page']=="addNewSection"){
            echo "<h1>add New Section</h1>";
						$GLOBALS['pageName']="addNewSection.php";
          }
					else if($_GET['page']=="seeDetails"){
            echo "<h1>See Details</h1>";
						$GLOBALS['pageName']="seeCourseDetails.php";
          }
        }
       ?>
    </div>
    <iframe src="<?php echo $GLOBALS['pageName']?>" height="100%" width="100%"></iframe>
   </div>
 </section>

  </body>
</html>
