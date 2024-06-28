<?php
// Конфігурація бази даних
$servername = "localhost"; // Змініть, якщо ваш сервер відрізняється
$username = "root"; // Стандартне ім'я користувача XAMPP
$password = ""; // Стандартний пароль XAMPP
$dbname = "cars_db";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// Обробка відправки форми реєстрації
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хешування пароля

    // SQL запит для вставки даних до таблиці users
    $sql = "INSERT INTO users (username, email, password, created_at)
            VALUES ('$username', '$email', '$password', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Реєстрація успішна!";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

// Закриття з'єднання
$conn->close();
?>
