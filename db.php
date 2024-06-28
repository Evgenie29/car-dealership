<?php
$servername = "localhost";
$username = "root"; // Ваше ім'я користувача для MySQL
$password = ""; // Ваш пароль для MySQL
$dbname = "cars_db"; // Ім'я вашої бази даних

// Створення підключення
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не вдалося: " . $conn->connect_error);
}
?>
<?php
include 'database.php';

// Додавання нового клієнта
$name = "John Doe";
$phone = "123-456-7890";
$email = "john@example.com";

$sql = "INSERT INTO Customers (name, phone, email) VALUES ('$name', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
