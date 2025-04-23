<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "events_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: ".conn->connect_error);
}
$evName = $_POST['evName'];
$evDate = $_POST['evDate']; 
$evVenue = $_POST['evVenue'];
$evRFee = $_POST['evRFee'];
$evCode = $_POST['evCode'];

$sql = "UPDATE events SET evName = '$evName', evDate = '$evDate', evVenue = '$evVenue', evRFee = '$evRFee' WHERE evCode = '$evCode'";

if ($conn->query($sql) === TRUE) {
    echo "Event updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>