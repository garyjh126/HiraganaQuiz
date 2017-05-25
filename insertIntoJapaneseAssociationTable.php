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

$sql = "INSERT INTO assocationWithJapanaseLetterTable(row, aColJapanese, iColJapanese, uColJapanese, eColJapanese, oColJapanese)
VALUES ('aRow','/Assignment4/static pictures/1.png', '/Assignment4/static pictures/2.png', '/Assignment4/static pictures/3.png', '/Assignment4/static pictures/4.png' ,'/Assignment4/static pictures/5.png'), ('kaRow','/Assignment4/static pictures/6.png', '/Assignment4/static pictures/7.png', '/Assignment4/static pictures/8.png', '/Assignment4/static pictures/9.png' ,'/Assignment4/static pictures/10.png'),('saRow','/Assignment4/static pictures/11.png', '/Assignment4/static pictures/12.png', '/Assignment4/static pictures/13.png', '/Assignment4/static pictures/14.png' ,'/Assignment4/static pictures/15.png'),('taRow','/Assignment4/static pictures/16.png', '/Assignment4/static pictures/17.png', '/Assignment4/static pictures/18.png', '/Assignment4/static pictures/19.png' ,'/Assignment4/static pictures/20.png'),('naRow','/Assignment4/static pictures/21.png', '/Assignment4/static pictures/22.png', '/Assignment4/static pictures/23.png', '/Assignment4/static pictures/24.png' ,'/Assignment4/static pictures/25.png'),('haRow','/Assignment4/static pictures/26.png', '/Assignment4/static pictures/27.png', '/Assignment4/static pictures/28.png', '/Assignment4/static pictures/29.png' ,'/Assignment4/static pictures/30.png'),('maRow','/Assignment4/static pictures/31.png', '/Assignment4/static pictures/32.png', '/Assignment4/static pictures/33.png', '/Assignment4/static pictures/34.png' ,'/Assignment4/static pictures/35.png'),('yaRow','/Assignment4/static pictures/36.png', '', '/Assignment4/static pictures/37.png', '' ,'/Assignment4/static pictures/38.png'),('raRow','/Assignment4/static pictures/39.png', '/Assignment4/static pictures/40.png', '/Assignment4/static pictures/41.png', '/Assignment4/static pictures/42.png' ,'/Assignment4/static pictures/43.png'),('waRow','/Assignment4/static pictures/44.png', '', '', '' ,'/Assignment4/static pictures/45.png'),('','', '', '/Assignment4/static pictures/46.png', '' ,'');"; //placed special character in middle slot of last row 


//$sql = "DELETE FROM hiraganaTable";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
