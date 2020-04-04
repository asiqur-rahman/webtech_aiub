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
        <li><a href="?page=todayClass"><i class="fas fa-link"></i>Take Attendance</a></li>
        <li><a href="?page=giveMarks"><i class="fas fa-stream"></i>Give Marks</a></li>
        <li><a href="?page=seeMarks"><i class="fas fa-calendar-week"></i>See Marks</a></li>
				<li><a href="?page=seeSalary"><i class="fas fa-calendar-week"></i>See Salary</a></li>
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
          if($_GET['page']=="todayClass"){
            echo "<h1>Take Attendance</h1>";
            $GLOBALS['pageName']="todayClass.php";
          }
          else if($_GET['page']=="giveMarks"){
            echo "<h1>Give Marks</h1>";
						$GLOBALS['pageName']="giveMarks.php";
          }
          else if($_GET['page']=="seeMarks"){
            echo "<h1>See Marks</h1>";
						$GLOBALS['pageName']="seeMarks.php";
          }
					else if($_GET['page']=="seeSalary"){
            echo "<h1>See Details</h1>";
						$GLOBALS['pageName']="seeSalary.php";
          }
        }
       ?>
    </div>
    <iframe src="<?php echo $GLOBALS['pageName']?>" height="100%" width="100%"></iframe>
   </div>
 </section>

  </body>
</html>
