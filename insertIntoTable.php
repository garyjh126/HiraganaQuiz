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

/*$sql = "INSERT INTO hiraganaTable(row, aCol, iCol, uCol, eCol, oCol)
VALUES ('aRow','a', 'i', 'u', 'e' ,'o'), ('kaRow','ka', 'ki', 'ku', 'ke' ,'ko'),('saRow','sa', 'shi', 'su', 'se' ,'so'),('taRow','ta', 'chi', 'tsu', 'te' ,'to'),('naRow','na', 'ni', 'nu', 'ne' ,'no'),('haRow','ha', 'hi', 'fu', 'he' ,'ho'),('maRow','ma', 'mi', 'mu', 'me' ,'mo'),('yaRow','ya', '', 'yu', '' ,'yo'),('raRow','ra', 'ri', 'ru', 're' ,'ro'),('waRow','wa', '', '', '' ,'o'),('','', '', 'n', '' ,'');"; //placed special character in middle slot of last row 
*/


//$sql = "DELETE FROM hiraganaTable";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
