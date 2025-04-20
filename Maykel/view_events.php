<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "events_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
</head>
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
    .addbtn {
    background-color: #04aa6d;
    color: white;
    padding: 16px 20px;
    margin: 16px 0;
    border: none;
    cursor: pointer;
    opacity: 0.9;
    }
    .editbtn {
        background-color: red;
        color: white;
        padding: 16px 20px;
        margin:16px 0;
        border: none;
        cursor: pointer;
        opacity: 0.9;
    }
    .headerbtn{
        float: right;
    }
    </style>
<body>
    <div class = "header">
        <h1 style= "float: left; margin: 16px 0">Event Records</h1>
        <div class = "headerbtn">
            <a href="add_event.html"><button class = "addbtn" > Add +</button></a>
            <a href = "edit_event.html"><button class = "editbtn"> Edit </button></a>
        </div>
    </div>
    <table border="1" cellpadding="10">
        <tr>
            <th>Event Code</th>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Event Venue</th>
            <th>Registration Fee</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['evCode']}</td>
                        <td>{$row['evName']}</td>
                        <td>{$row['evDate']}</td>
                        <td>{$row['evVenue']}</td>
                        <td>{$row['evRFee']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>