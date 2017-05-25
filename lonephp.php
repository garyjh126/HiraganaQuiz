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


$q = $_REQUEST["q"]; //This value contains the string of the url that the image uses
$len=strlen($q);
$leve = "";
$leve = substr($q, 16, $len);
$ar[] = $leve;
echo $leve;

?>
