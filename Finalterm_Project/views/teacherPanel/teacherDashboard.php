<?php
$GLOBALS['pageName']="../dashboard.php";
$GLOBALS['text']="";
$GLOBALS['color']="";
$GLOBALS['midterm'] ="";
$GLOBALS['finalterm'] ="";
$GLOBALS['selected'] ="-- select --";
$GLOBALS['courseDetails'] ="";
$GLOBALS['id'] ="";
$GLOBALS['name'] ="";
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
    <title>Teacher Panel</title>
		<link rel="stylesheet" href="../styles/headerStyle.css">
    <link rel="stylesheet" href="../styles/dashboardstyle.css">
		<link rel="stylesheet" href="../styles/adminStyle.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
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
        <li><a href="?page=giveMarks"><i class="fas fa-link"></i>Give marks</a></li>
        <li><a href="?page=seeMarks"><i class="fas fa-link"></i>See marks</a></li>
        <li><a href="?page=todayClass"><i class="fas fa-link"></i>Today Class</a></li>
        <li><a href="?page=seeAccounts"><i class="fas fa-link"></i>See Accounts</a></li>
      </ul>
    </div>
 <section>
   <div class="mainbody">
     <div class="header">
       <?php
        if (isset($_GET['page']))
        {
          if($_GET['page']=="giveMarks"){
            echo "<h1>Give Students Result</h1>";
            $GLOBALS['pageName']="giveMarks.php";
          }
        }
        if (isset($_GET['page']))
        {
          if($_GET['page']=="seeMarks"){
            echo "<h1>See Course Result</h1>";
            $GLOBALS['pageName']="seeMarks.php";
          }
        }
        if (isset($_GET['page']))
        {
          if($_GET['page']=="todayClass"){
            echo "<h1>Todays Classes</h1>";
            $GLOBALS['pageName']="todayClass.php";
          }
        }
        if (isset($_GET['page']))
        {
          if($_GET['page']=="seeAccounts"){
            echo "<h1>See Accounts Details</h1>";
            $GLOBALS['pageName']="seeAccounts.php";
          }
        }
       ?>
    </div>
		<?php
			 include $GLOBALS['pageName'];
    ?>
   </div>
 </section>
 <center><h1 style="color:<?php echo $GLOBALS['color'];?>"><?php echo $GLOBALS['text'];?><h1></center>
 <?php include '../main_footer.php'; ?>
