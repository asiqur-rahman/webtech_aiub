<?php
  $result=array();
  session_start();
  require_once '../../models/database.php';

  if(isset($_POST['create-section']))
  {
    //echo "createSection Called";
    createSection();
  }

  if(isset($_POST['seeAllAssignedCourse']))
  {
    // echo "See All Assigned Course";
     seeAllAssignedCourse();
  }

  if(isset($_POST['seeAllUnAssignedCourse']))
  {
    // echo "See All Assigned Course";
     seeAllUnAssignedCourse();
  }

  if(isset($_POST['see-details']))
  {
    //echo "seeDetails Called";
    seeDetails();
  }

  if(isset($_POST['search-by-id']))
  {
    //echo "searchById Called";
    searchById();
  }

  if(isset($_POST['add-student']))
  {
    //echo "addStudent Called";
    addStudent();
  }

  if(isset($_POST['add-section']))
  {
    //echo "addSection Called";
    addSection();
  }

  if(isset($_POST['see-coursedetails']))
  {
    seeCourseDetails();
  }

  function seeCourseDetails()
  {
    if($_POST['selectCourse']!="--Select--" )
		{
      $course = explode(" ", $_POST['selectCourse']);
      $course=$course[0].$course[2];
      $sql="SELECT students.name,$course.* from $course left join students on students.StudentId=$course.studentid";
      // echo $sql;
      $GLOBALS['courseDetails'] = get($sql);
      $sql = "select teacher from course where name='$course[0]' and section='$course[2]'";
      $courseTeacher=get($sql);
      }
      else {
        {
          $GLOBALS['text']="You Must Fill up all *";
          $GLOBALS['color']="Red";
        }
      }
  }
  function addSection()
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['newSection']))
		{
      $course = explode(" ", $_POST['selectCourse']);
      $sec=$_POST['newSection'];
      $sql1 = "INSERT INTO course (name, section) VALUES ('$course[0]', '$sec')";
      $sql2 = "CREATE TABLE $course[0]$sec (
              id int primary key,
              studentId varchar(20),
              midterm int,
              finalterm int
              );";
      $sql="select * from $course[0]$sec";
      if(count(get($sql))>0)
      {
        $GLOBALS['text']="$course[0] $sec Section Already Created !";
        $GLOBALS['color']="Red";
      }
      else {
        if (execute($sql1) && execute($sql2)) {
          $GLOBALS['text']="New Section $sec for course $course[0] created";
          $GLOBALS['color']="Green";
          }
      }
      }
      else {
        {
          $GLOBALS['text']="You Must Fill up all *";
          $GLOBALS['color']="Red";
        }
      }
  }
  function addStudent()
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']))
		  {
        $selected=$_POST['selectCourse'];
        $id=$_POST['searchById'];
        $GLOBALS['selected'] =$selected;
        $course = explode(" ", $_POST['selectCourse']);
        $sql="select * from $course[0]$course[2] where StudentId='$id'";
        if(count(get($sql))>0)
        {
          $GLOBALS['text']="This Student Already Added";
          $GLOBALS['color']="Red";
        }
        else {
          $sql1 = "INSERT INTO $course[0]$course[2] (StudentId) VALUES ('$id')";
          $sql2 = "INSERT INTO courseregistered (studentId,courseName,courseSection) VALUES ('$id','$course[0]','$course[2]')";
          if (execute($sql1) && execute($sql2)) {
            $GLOBALS['text']="New Student $id added ";
            $GLOBALS['color']="Green";
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
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
  function searchById()
  {
    if($_POST['selectCourse']!="--Select--" && !empty($_POST['searchById']))
		  {
        $id=$_POST['searchById'];
        $GLOBALS['selected'] = $_POST['selectCourse'];
        $GLOBALS['studentID'] = $_POST['searchById'];
        $course = explode(" ", $_POST['selectCourse']);
        $sql = "select * from students where StudentId='$id'";
        $courseDetails = get($sql);
        if(count($courseDetails)>0)
        {
          $GLOBALS['studentName'] = $courseDetails[0]["Name"];
        }
        else {
          $GLOBALS['text']="No Student Found !";
          $GLOBALS['color']="Red";
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
  function seeDetails()
  {
    if($_POST['selectCourse']!="--Select--" )
		{
      $selected=$_POST['selectCourse'];
      $course = explode(" ", $_POST['selectCourse']);
      $sql = "select * from $course[0]$course[2]";
      $courseDetails = get($sql);
      $sql = "select teacher from course where name='$course[0]' and section='$course[2]'";
      $courseTeacher=get($sql);
      }
      else {
        {
          $GLOBALS['text']="You Must Fill up all *";
          $GLOBALS['color']="Red";
        }
      }
  }

  function seeAllAssignedCourse()
  {
    $sql="select course.Name as Course_Name,course.section,teacher.Name as Teacher_Name from course inner join teacher on teacher.teacherId=course.teacherId";
    $GLOBALS['array']=get($sql);
    //echo $GLOBALS['courseDetails'][0]["Teacher_Name"];
  }

  function seeAllUnAssignedCourse()
  {
    $sql="select course.Name as Course_Name,course.section,teacherId as Teacher_Name from course where teacherId=''";
    $GLOBALS['array']=get($sql);
    //echo $GLOBALS['courseDetails'][0]["Teacher_Name"];
  }

  function createSection()
  {
    if($_POST['selectCourse']!="--Select--" && $_POST['selectTeacher']!="--Select--")
		{
      $course = explode(" -- ", $_POST['selectCourse']);
      $teacher=explode(" -- ",$_POST['selectTeacher']);
      $sql="select * from teacher WHERE name='$teacher[0]'";
      $teacherId=get($sql);
      $teacherId=$teacherId[0]["teacherId"];
      $sql = "UPDATE course SET TeacherId = '$teacherId' WHERE name = '$course[0]' and Section='$course[1]';";
      if (execute($sql)) {
        $GLOBALS['text']="$teacher[0] assingned as course teacher for $course[0] section $course[1]";
        $GLOBALS['color']="Green";
        } else {
          $GLOBALS['text']="Error: $sql";
          $GLOBALS['color']="Red";
        }
      }
      else {
        {
          $GLOBALS['text']="You Must Fill up all *";
          $GLOBALS['color']="Red";
        }
      }
  }
 ?>
