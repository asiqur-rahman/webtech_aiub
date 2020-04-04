<?php
include 'main_header.php';
$usertype=$_GET["user"];
if($usertype=="admin")
{
<<<<<<< HEAD
    
=======
  echo "Admin";
>>>>>>> 9d1e7fcaae43bdbd5f35e34c945700f037bfa9c2
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
<<<<<<< HEAD
    
=======
  echo "Teacher";
>>>>>>> 9d1e7fcaae43bdbd5f35e34c945700f037bfa9c2
}

include 'main_footer.php';
?>
