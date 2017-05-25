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


$sql = "SELECT userName FROM userresults WHERE userName = '".$username."';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "userName: " . $row["userName"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>