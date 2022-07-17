<?php

	class model_datagp extends CI_Model
	{
		$servername = "172.16.10.100";
        $database = "HYP2";
        $username = "hid1";
        $password = "P@ssw0rd";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
            echo "Connected successfully";
            mysqli_close($conn);
    }

?>