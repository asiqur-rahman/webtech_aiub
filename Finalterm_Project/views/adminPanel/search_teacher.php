<?php
  include ('../../controllers/adminController.php');
  //echo $key;
  $section=$_GET["section"];
  $course = explode(" ", $section);
   //echo $section;
  $query= "select name from teacher where teacherId in (select teacherid from course where name='$course[0]' and section='$course[2]')";
  //echo $query."<br>";
  $rs=get($query);
  if(count($rs)>0)
  {
    echo $rs[0]['name'];
  }

   ?>
