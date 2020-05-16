<?php
	 $serverName="localhost";
	 $userName="root";
	 $password="";
	 $dbName="webtech";
	function execute($query)
	{
		global $serverName;
		global $userName;
		global $password;
		global $dbName;
		$conn = mysqli_connect($serverName, $userName,  $password, $dbName);
	  if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	  }
		$haha=mysqli_query($conn,$query);
		mysqli_close($conn);
		return $haha;
	}

	function get($query)
	{
    $data=array();//numeric array
		global $serverName,$userName,$password,$dbName;
		$conn = mysqli_connect( $serverName, $userName, $password, $dbName);
	  // if ($conn->connect_error)
		// {
	  //   die("Connection failed: " . $conn->connect_error);
	  // }
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $entity=array();//associative array
                foreach($row as $k=>$v)
                {
                    $entity[$k] = $row[$k];
                }
                $data[] = $entity;
            }
        }

        mysqli_close($conn);

		return $data;
	}
?>
