<?php
  require_once '../../models/database.php';
  $result=array();
  session_start();
  if(isset($_POST['see-details']))
  {
    seeDetails();
  }

  function seeDetails()
  {
    if($_POST['selectCourse']!="--select--" )
		{
      $GLOBALS['selected']=$_POST['selectCourse'];
      $course = explode(" ", $_POST['selectCourse']);
      $id=$_COOKIE['loggedinuser'];
      $sql2 = "select * from $course[0]$course[2] where studentId='$id'";
      $courseResults = get($sql2);
      $GLOBALS['midterm']=$courseResults[0]["midterm"];
      $GLOBALS['finalterm']=$courseResults[0]["finalterm"];
      }
      else {
        {
          $text="You Must Fill up all *";
          $color="Red";
        }
      }
  }
 ?>
