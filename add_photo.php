<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description_id = $conn->real_escape_string($_POST['description_id']);
    $file = $_FILES['file'];

    $uploadDirectory = 'uploads/';
    $uploadFilePath = $uploadDirectory . basename($file['name']);
    
    if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
        $sql = "INSERT INTO photos (description_id, file_path) VALUES ('$description_id', '$uploadFilePath')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Нову фотографію додано успішно";
        } else {
            echo "Помилка: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Помилка при завантаженні файлу.";
    }

    $conn->close();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
