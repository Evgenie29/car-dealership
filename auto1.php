<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авто</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .cars {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
            justify-content: center;
        }
        .car-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            width: 100%;
            max-width: 320px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .car-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .car-card h3 {
            padding: 0 16px;
            margin: 0;
        }
        .car-card p {
            padding: 0 16px 16px;
            font-size: 14px;
            line-height: 1.5;
        }
        .car-card .buy-button {
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            padding: 10px 20px;
            margin: 16px;
            font-size: 16px;
        }
        .car-card .buy-button:hover {
            background-color: #218838;
        }
        .filter-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .filter-buttons button {
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            margin: 10px 5px;
            padding: 10px 20px;
            font-size: 16px;
        }
        .filter-buttons button:hover {
            background-color: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            max-width: 500px;
            width: 90%;
            text-align: center;
        }
        .modal-close {
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
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
        .purchase-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .purchase-form input, .purchase-form button {
            width: 80%;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .purchase-form button {
            background-color: #28a745;
            color: white;
            border: none;
        }
        .purchase-form button:hover {
            background-color: #218838;
        }
    </style>
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
    <section class="filter-buttons">
        <button onclick="filterCars('Mercedes-Benz')">Mercedes-Benz</button>
        <button onclick="filterCars('Audi')">Audi</button>
        <button onclick="filterCars('Bmw')">Bmw</button>
        <button onclick="filterCars('Dodge')">Dodge</button>
        <button onclick="filterCars('Ford')">Ford</button>
        <button onclick="filterCars('Land Rover')">Land Rover</button>
        <button onclick="filterCars('Lexus')">Lexus</button>
        <button onclick="filterCars('Infiniti')">Infiniti</button>
        <button onclick="filterCars('Volkswagen')">Volkswagen</button>
        <button onclick="filterCars('')">Всі</button>
    </section>

    <section class="cars" id="carContainer">
        <?php
        include 'db_connect.php';

        $sql = "SELECT * FROM cars";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="car-card" data-make="' . htmlspecialchars($row["make"], ENT_QUOTES) . '">';
                echo '<img src="' . htmlspecialchars($row["image_url"], ENT_QUOTES) . '" alt="Авто">';
                echo '<h3>' . htmlspecialchars($row["make"], ENT_QUOTES) . ' ' . htmlspecialchars($row["model"], ENT_QUOTES) . '</h3>';
                echo '<p>Двигун: ' . htmlspecialchars($row["engine"], ENT_QUOTES) . '<br>Ціна: ' . htmlspecialchars($row["price"], ENT_QUOTES) . '</p>';
                echo '<button class="buy-button" onclick="openPurchaseForm(\'' . htmlspecialchars($row["make"], ENT_QUOTES) . ' ' . htmlspecialchars($row["model"], ENT_QUOTES) . '\', \'' . htmlspecialchars($row["image_url"], ENT_QUOTES) . '\', \'Двигун: ' . htmlspecialchars($row["engine"], ENT_QUOTES) . '<br>Ціна: ' . htmlspecialchars($row["price"], ENT_QUOTES) . '\')">Купити</button>';
                echo '</div>';
            }
        } else {
            echo "0 результатів";
        }

        $conn->close();
        ?>
    </section>

    <div id="purchaseModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closePurchaseForm()">&times;</span>
            <h3 id="purchaseCarName"></h3>
            <form id="purchaseForm" class="purchase-form" onsubmit="submitPurchase(event)">
                <input type="hidden" id="carDetails" name="carDetails">
                <input type="text" id="buyerName" name="buyerName" placeholder="Ваше ім'я" required>
                <input type="email" id="buyerEmail" name="buyerEmail" placeholder="Ваш Email" required>
                <input type="tel" id="buyerPhone" name="buyerPhone" placeholder="Ваш телефон" required>
                <button type="submit">Підтвердити покупку</button>
            </form>
        </div>
    </div>

    <script>
        function filterCars(make) {
            let cards = document.querySelectorAll('.car-card');
            cards.forEach(card => {
                if (make === '' || card.getAttribute('data-make') === make) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function openPurchaseForm(name, image, details) {
            document.getElementById('purchaseCarName').innerText = name;
            document.getElementById('carDetails').value = details;

            document.getElementById('purchaseModal').style.display = 'flex';
        }

        function closePurchaseForm() {
            document.getElementById('purchaseModal').style.display = 'none';
        }

        function submitPurchase(event) {
            event.preventDefault();
            const name = document.getElementById('buyerName').value;
            const email = document.getElementById('buyerEmail').value;
            const phone = document.getElementById('buyerPhone').value;
            const carDetails = document.getElementById('carDetails').value;

            // Можна відправити ці дані на сервер за допомогою AJAX або зберегти в базі даних
            console.log('Покупка:', {
                name: name,
                email: email,
                phone: phone,
                carDetails: carDetails
            });

            closePurchaseForm();
            alert('Покупку підтверджено! Наш представник скоро зв\'яжеться з вами.');
        }
    </script>
</body>
</html>
