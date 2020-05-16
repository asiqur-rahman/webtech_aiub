<?php
  $result=array();
  session_start();
  require_once '../../models/database.php';

  if(isset($_POST['search-by-id']))
  {
    searchByID();
  }

  if(isset($_POST['update-marks']))
  {
    updateMarks();
  }

  if(isset($_POST['see-details']))
  {
    seeDeatils();
  }

  function searchByID()
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']))
		  {
        $GLOBALS['selected']=$selected=$_POST['selectCourse'];
        $id=$GLOBALS['id'] =$_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        $sql = "select * from students where StudentId='$id'";
        $courseDetails = get($sql);
        //echo $sql;
        $GLOBALS['name'] =$courseDetails[0]["Name"];

        $sql = "select * from $course[0]$course[2] where StudentId='$id'";
        $GLOBALS['courseDetails']=$details = get($sql);
        $midterm=$details[0]["midterm"];
        $finalterm=$details[0]["finalterm"];
      }
      else
      {
        $GLOBALS['text']="You Must Fill up al *";
        $GLOBALS['color']="Red";
      }
  }

  function updateMarks()
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']) && !empty($_POST['midterm']) && !empty($_POST['finalterm']))
		  {
        $selected=$_POST['selectCourse'];
        $id=$_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        $midterm=$_POST['midterm'];
        $finalterm=$_POST['finalterm'];
        $sql = "select * from $course[0]$course[2] where StudentId='$id'";
        $sql = "UPDATE $course[0]$course[2] SET midterm = $midterm, finalterm = $finalterm WHERE StudentId = $id;";
        echo $sql;
        if (execute($sql)) {
          $GLOBALS['text']="Marks Updated Successfully ";
          $GLOBALS['color']="Green";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
      else
      {
        {
          $GLOBALS['text']="You Must Fill up all *";
          $GLOBALS['color']="Red";
        }
      }
  }

  function seeDeatils()
  {
    if($_POST['selectCourse']!="--Select--" )
		{
      $course = explode(" ", $_POST['selectCourse']);
      $sql = "select * from $course[0]$course[2]";
      $GLOBALS['courseDetails'] = get($sql);
      $sql = "select teacher from course where name='$course[0]' and section='$course[2]'";
      $courseTeacher=get($sql);
      }
      else {
        {
          $text="You Must Fill up all *";
          $color="Red";
        }
      }
  }
  ?>
