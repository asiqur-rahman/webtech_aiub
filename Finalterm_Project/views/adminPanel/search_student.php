<?php
  include ('../../controllers/adminController.php');
  $key=$_GET["sk"];
  //echo $key;
  $section=$_GET["section"];
  $course = explode(" ", $section);
  // echo $section;
  // $query= "select studentid from $course[0]$course[2] where studentid like '%$key%';";
  $query= "select studentid from students where studentid like '%$key%';";
  //echo $query;
  $rs=get($query);

  echo "<table>";
  for($i=0; $i<count($rs); $i++)
    {
      echo "<tr>";
      echo "<td>".$rs[$i]['studentid']."</td>";
      echo "</tr>";
    }
    echo "</table>";
   ?>
