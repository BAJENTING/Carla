<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all records
$sql = "SELECT * FROM patient";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Patient Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Patient Records</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Birth Date</th><th>Telephone</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['patID']}</td>
                    <td>{$row['patFName']}</td>
                    <td>{$row['patLName']}</td>
                    <td>{$row['patBDate']}</td>
                    <td>{$row['patTelNo']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
