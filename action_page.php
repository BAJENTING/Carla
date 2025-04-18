<?php
//this will connect in the database
$servername="localhost";
$username="root";
$password="";
$dbname="clinic";

//connection between database
$conn = new mysqli($servername, $username, $password,$dbname);

//check connection
if($conn->connect_error) {
    die("Connection failed!: .$conn->connect_error");
}

//get form data
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$bdate = $_POST['bdate'];
$telno = $_POST['telno'];

//insert data 
$sql="INSERT INTO patient (patFName,patLName,patBDate, patTelNo ) VALUES ('$Fname','$Lname','$bdate', '$telno')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>