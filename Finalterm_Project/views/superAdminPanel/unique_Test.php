<?php
  include ('../../controllers/adminController.php');
  //echo $key;
  $section=$_GET["idname"];
   //echo $section;
  $query= "select * from teacher where teacherId='$section'";
  //echo $query."<br>";
  $rs=get($query);
  if(count($rs)>0)
  {
    echo $rs[0]['teacherId'];
  }
   ?>
