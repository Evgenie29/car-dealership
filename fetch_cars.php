<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cars_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, make, model, engine, image_url, description FROM cars";
$result = $conn->query($sql);

$cars = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($cars);
?>
