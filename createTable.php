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



// sql to create table
$sql = "CREATE TABLE hiraganaTable (
row VARCHAR(20),
aCol VARCHAR(20),
iCol VARCHAR(20),
uCol VARCHAR(20),
eCol VARCHAR(20),
oCol VARCHAR(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table hiraganaTable created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 