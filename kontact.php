<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакти автосалону - Logic Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }

        .nav-link {
            color: #fff !important;
        }

        .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .container {
            margin-top: 50px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }

        .poslyga {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .poslyga img {
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .poslyga img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .contact-info {
            margin: 20px 0;
        }

        .contact-info p {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .contact-info button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .contact-info button:hover {
            background-color: #0056b3;
        }

        .map-container {
            width: 100%;
            max-width: 800px;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .button-container button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background-color 0.3s, transform 0.3s;
        }

        .button-container button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
       .button-container button:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.5);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logic Car</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="main1.php">Головна</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="auto1.php">Автомобілі</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="poslyga1.php">Послуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kontact.php">Контакти</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <header class="header">
            <h1>Контакти</h1>
        </header>
        <div class="poslyga">
            <h3>Розташування</h3>
            <div class="contact-info">
                <p>Вулиця Івана Мазепи 6</p>
                <p id="phone-number">Номер телефону: <button onclick="showPhoneNumber()">Показати номер</button></p>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.921829614387!2d-122.08424948469238!3d37.42199957982592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb15e5dc7d7d5%3A0xdaf5e8e5c9f1b0e1!2sGoogle!5e0!3m2!1sen!2suk!4v1633306926691!5m2!1sen!2suk" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="button-container">
                <button onclick="showPhoneNumber()">Подзвонити</button>
                <button onclick="openMap()">Переглянути на карті</button>
            </div>
        </div>
    </div>
    <script>
        function showPhoneNumber() {
            // Заміна тексту кнопки на номер телефону
            const button = document.querySelector('#phone-number button');
            button.textContent = '+134546547';
            button.onclick = () => copyPhoneNumber('+134546547');
            alert("Номер телефону: +134546547");
        }

        function copyPhoneNumber(phoneNumber) {
            // Копіювання номера телефону в буфер обміну
            navigator.clipboard.writeText(phoneNumber).then(() => {
                alert("Номер телефону скопійовано: " + phoneNumber);
            }, () => {
                alert("Не вдалося скопіювати номер телефону.");
            });
        }

        function openMap() {
            window.open("https://www.google.com/maps?q=Вулиця+Івана+Мазепи+6", "_blank");
        }
    </script>
</body>
</html>