<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $conn->real_escape_string($_POST['description']);
    
    $sql = "INSERT INTO descriptions (description) VALUES ('$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Новий опис додано успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>


