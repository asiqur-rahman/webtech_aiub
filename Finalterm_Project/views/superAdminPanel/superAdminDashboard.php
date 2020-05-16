<?php
$GLOBALS['pageName']="../dashboard.php";
$GLOBALS['text']="";
$GLOBALS['color']="red";
$GLOBALS['studentName'] ="";
$GLOBALS['studentID'] ="";
$GLOBALS['selected'] ="-- select --";
$GLOBALS['courseDetails'] =array();
$GLOBALS['array']=array();
	//session_start();
	if(!isset($_COOKIE['loggedinuser']))
	{
		header("Location:../../index.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("loggedinuser","",time()-120);
		header("Location:../../index.php");
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
		<link rel="stylesheet" href="../styles/headerStyle.css">
    <link rel="stylesheet" href="../styles/dashboardstyle.css">
		<link rel="stylesheet" href="../styles/adminStyle.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

  </head>
  <body>
		<form class="" action="" method="post">
			<!-- <input class="btn btn-success" type="submit" name="home" value="Home"> -->
			<input class="llogout_btn" type="submit" name="logout" value="Logout" style="background:red;">
		</form>

    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header><?php echo $_COOKIE['loggedinuser'];?></header>
      <ul>
        <li><a href="?page=addNewTeacher"><i class="fas fa-link"></i>Add New Teacher</a></li>
        <li><a href="?page=addNewCourse"><i class="fas fa-stream"></i>Add New Course</a></li>
        <li><a href="?page=addNewAdmin"><i class="fas fa-calendar-week"></i>Add New Admin</a></li>
			</ul>
    </div>
 <section>
   <div class="mainbody">
     <div class="header">
       <?php
        if (isset($_GET['page'])) {
          if($_GET['page']=="addNewTeacher"){
            echo "<h1>add New Teacher</h1>";
            $GLOBALS['pageName']="addTeacher.php";
          }
          else if($_GET['page']=="addNewCourse"){
            echo "<h1>add New Course</h1>";
						$GLOBALS['pageName']="addCourse.php";
          }
          else if($_GET['page']=="addNewAdmin"){
            echo "<h1>add New Admin</h1>";
						$GLOBALS['pageName']="addAdmin.php";
          }
        }
       ?>
    </div>
		<?php
			 include $GLOBALS['pageName'];
    ?>

   </div>
 </section>
 <center><h1 id="error" style="color:<?php echo $GLOBALS['color'];?>"><?php echo $GLOBALS['text'];?><h1></center>
<?php include '../main_footer.php'; ?>
