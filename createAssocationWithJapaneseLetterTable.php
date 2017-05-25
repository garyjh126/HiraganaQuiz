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
$sql = "CREATE TABLE assocationWithJapanaseLetterTable (
row VARCHAR(20),
aColJapanese VARCHAR(50),
iColJapanese VARCHAR(50),
uColJapanese VARCHAR(50),
eColJapanese VARCHAR(50),
oColJapanese VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table assocationWithJapanaseLetterTable created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 