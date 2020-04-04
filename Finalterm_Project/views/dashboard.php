<?php
include 'main_header.php';
$usertype=$_GET["user"];
if($usertype=="admin")
{
  echo "Admin";
}
else if($usertype=="student")
{
  echo "Student";
}
else if($usertype=="superAdmin")
{
  echo "SuperAdmin";
}
else if($usertype=="teacher")
{
  echo "Teacher";
}

include 'main_footer.php';
?>
