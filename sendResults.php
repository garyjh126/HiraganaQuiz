<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username = $_GET["username"];
$password = $_GET["password"];


$sql = "SELECT userName, password FROM userresults WHERE userName = '".$username."';";

$result = $conn->query($sql);
$boolUserFound = false;
$boolPassword = false;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["userName"]==$username)
		{
			
			$boolUserFound = true;
			if($row["password"]==$password)
			{
				$boolPassword = true;
				echo $username;
			}
		}
		
    }
	
} else {
    echo "0 results";
}


$conn->close();

