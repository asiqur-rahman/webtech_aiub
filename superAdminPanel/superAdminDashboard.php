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
        <li><a href="?page=addTeacher"><i class="fas fa-link"></i>Add New Teacher</a></li>
        <li><a href="?page=addCourse"><i class="fas fa-stream"></i>Add New Course</a></li>
        <li><a href="?page=addAdmin"><i class="fas fa-calendar-week"></i>Add New Admin</a></li>
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
          if($_GET['page']=="addTeacher"){
            echo "<h1>Add Teacher</h1>";
            $GLOBALS['pageName']="addTeacher.php";
          }
          else if($_GET['page']=="addCourse"){
            echo "<h1>add Course</h1>";
						$GLOBALS['pageName']="addCourse.php";
          }
          else if($_GET['page']=="addAdmin"){
            echo "<h1>add Admin</h1>";
						$GLOBALS['pageName']="addAdmin.php";
          }
        }
       ?>
    </div>
    <iframe src="<?php echo $GLOBALS['pageName']?>" height="100%" width="100%"></iframe>
   </div>
 </section>

  </body>
</html>
