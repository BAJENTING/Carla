<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "events_db";

$conn = new mysqli($servername, $username, $password, $database);
if  ($conn -> connect_error){
    die("Connection failed: ".conn->connect_error);
}

$evName = $_POST['evName'];
$evDate = $_POST['evDate'];
$evVenue = $_POST['evVenue'];
$evRFee = $_POST['evRFee'];

$sql = "INSERT INTO events (evName, evDate, evVenue, evRFee) VALUES ('$evName', '$evDate', '$evVenue', '$evRFee')";
if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
