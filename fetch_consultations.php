<?php
// fetch_consultations.php

$servername = "localhost";
$username = "username";
$password = "1111";
$dbname = "cars_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, employee_name, position, years_of_experience FROM consultations";
$result = $conn->query($sql);

$consultations = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $consultations[] = $row;
    }
} 

$conn->close();

echo json_encode($consultations);
?>
