<?php
  $result=array();
  session_start();
  require_once '../../models/database.php';

  if(isset($_POST['add-admin']))
  {
    //echo "createSection Called";
    addAdmin();
  }

  if(isset($_POST['add-teacher']))
  {
    addTeacher();
  }

  if(isset($_POST['add-course']))
  {
    addCourse();
  }

  function addAdmin()
  {
    if(!empty($_POST['teacherName']) && !empty($_POST['teacherId']) && !empty($_POST['password']))
		{
      $name=$_POST['teacherName'];
      $id=$_POST['teacherId'];
      $pass=$_POST['password'];
      $sql = "SELECT * FROM users WHERE username='$id'";
      //echo $sql;
      $users=get($sql);
      if(count($users)<1)
      {
        $sql = "INSERT INTO users (username, password, usertype, permission) VALUES ('$id', '$pass', 'admin', 1)";
        if (execute($sql)) {
          $GLOBALS['text']="$name assingned as new Admin (default password = $pass)";
          $GLOBALS['color']="Green";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
        else {
          {
            $GLOBALS['text']="$id username already used ";
            $GLOBALS['color']="Red";
          }
        }
      }
      else {
        $GLOBALS['text']="You Must Fill up all *";
        $GLOBALS['color']="Red";
      }

  }

  function addTeacher()
  {
    if(!empty($_POST['teacherName']) && !empty($_POST['teacherId']) && !empty($_POST['department']) && !empty($_POST['password']))
		{
      $name=$_POST['teacherName'];
      $id=$_POST['teacherId'];
      $dept=$_POST['department'];
      $pass=$_POST['password'];

      $sql = "SELECT * FROM teacher WHERE name='$name'";
      $user1=get($sql);
      $sql = "SELECT * FROM users WHERE username='$id'";
      //echo $sql;
      $user2=get($sql);
      if(count($user1)<1 && count($user2)<1)
      {
        $sql1 = "INSERT INTO teacher (name, department, teacherId) VALUES ('$name', '$dept', '$id')";
        $sql2 = "INSERT INTO users (username, password, usertype, permission) VALUES ('$id', '$pass', 'teacher', 1)";
        if (execute($sql1) && execute($sql2)) {
          $GLOBALS['text']="$name assingned as new teacher (default password = $pass)";
          $GLOBALS['color']="Green";
          }
          else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
      }
      else {
          $GLOBALS['text']="Please Use Unique Details *";
          $GLOBALS['color']="Red";
      }
    }
    else
    {
        $GLOBALS['text']="You Must Fill up all *";
        $GLOBALS['color']="Red";
    }
  }

  function addCourse()
  {
    if(!empty($_POST['courseName']) )
		{
      $name=$_POST['courseName'];
      $sec="a";
      $sql1 = "INSERT INTO course (name, section) VALUES ('$name','a')";
      $sql2 = "CREATE TABLE $name$sec (
              id int primary key,
              studentId varchar(20),
              midterm int,
              finalterm int
              );";
      if (execute($sql1) && execute($sql2)) {
        $GLOBALS['text']="$name was added as new Course)";
        $GLOBALS['color']="Green";
        }
        else {
          $GLOBALS['text']="Course Already Created *";
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
