<?php
$GLOBALS['pageName']="../dashboard.php";
$GLOBALS['text']="";
$GLOBALS['color']="";
$GLOBALS['studentName'] ="";
$GLOBALS['studentID'] ="";
$GLOBALS['selected'] ="-- select --";
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
		<script>
		function searching()
		{
			alert("called");
			http=new XMLHttpRequest();
			var sk=document.getElementById('search_word').value;
			var section=document.getElementById('selectCourse').value;
			http.onreadystatechange = function()
			{
				if(http.readyState==4 && http.status==200)
				{
					//alert(http.responseText);
					document.getElementById('search_results').innerHTML=http.responseText;
				}
			}
			http.open("GET","search_product.php?sk="+sk"&",true);
			http.send();
		}
		</script>
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
        <li><a href="?page=addCourseTeacher"><i class="fas fa-link"></i>Assign Course Teacher</a></li>
        <li><a href="?page=addStudent"><i class="fas fa-stream"></i>Add Student</a></li>
        <li><a href="?page=addNewSection"><i class="fas fa-calendar-week"></i>Add New Section</a></li>
				<li><a href="?page=seeDetails"><i class="fas fa-calendar-week"></i>See Course Details</a></li>
      </ul>
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
		<?php
			 include $GLOBALS['pageName'];
    ?>

   </div>
 </section>
 <center><h1 style="color:<?php echo $GLOBALS['color'];?>"><?php echo $GLOBALS['text'];?><h1></center>
<?php include '../main_footer.php'; ?>
  </body>
</html>
