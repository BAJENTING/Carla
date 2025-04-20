<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "events_db";

$conn = new mysqli($servername, $username, $password, $database );
if ($conn->connect_error){
    die("Connection error: ".conn->connect_error);
}
$evCode = $_POST['evCode'];

$sql = "DELETE FROM events WHERE evCode = '$evCode'";
 if($conn->query($sql) === TRUE){
    echo "Event Deleted successfully!";
 } else {
    echo "Error: ".sql."<br>".$conn->error;
 }
$conn->close();
?>