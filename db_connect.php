<?php
$servername = "localhost"; // встановіть свій сервер бази даних
$username = "root"; // ваше ім'я користувача бази даних
$password = ""; // ваш пароль до бази даних
$dbname = "cars_db"; // ваша назва бази даних

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
