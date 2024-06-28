<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон</title>
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

        .hero {
            text-align: center;
            padding: 100px 20px;
            background: url('https://images.unsplash.com/photo-1542362074-8a158e5c1b39') no-repeat center center/cover;
            color: #fff;
            position: relative;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .hero h1, .hero p, .hero .cta-button {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3rem;
            margin: 0;
        }

        .hero p {
            font-size: 1.25rem;
            margin: 20px 0;
        }

        .cta-button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .car-container {
            position: relative;
            padding: 20px;
            text-align: center;
        }

        .car-container img {
            max-width: 100%;
            max-height: 400px;
            width: auto;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .car-container .car-description {
            font-size: 1rem;
            margin: 10px 0;
        }

        .car-navigation {
            display: flex;
            justify-content: space-between;
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            transform: translateY(-50%);
            padding: 0 20px;
        }

        .car-navigation button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .car-navigation button:hover {
            background-color: #0056b3;
        }

        .btn-green {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-green:hover {
            background-color: #218838;
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
                        <li class="nav-item">
                            <button class="btn btn-green" data-bs-toggle="modal" data-bs-target="#registrationModal">Реєстрація</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="hero">
        <h1>Ласкаво просимо до нашого автосалону</h1>
        <p>Найкращі автомобілі для вас!</p>
        <button class="cta-button" data-bs-toggle="modal" data-bs-target="#moreInfoModal">Дізнатися більше </button>
    </section>

    <section class="car-container">
        <div id="carDisplay">
            <!-- Автомобільні дані будуть тут динамічно завантажені -->
        </div>
        <div class="car-navigation">
            <button id="prevCar">← Попередній</button>
            <button id="nextCar">Наступний →</button>
        </div>
    </section>

    <!-- Модальне вікно для реєстрації -->
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Форма реєстрації</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="register.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Ім'я користувача</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email адреса</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Зареєструватися</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальне вікно для додаткової інформації -->
    <div class="modal fade" id="moreInfoModal" tabindex="-1" aria-labelledby="moreInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="moreInfoModalLabel">Додаткова інформація</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p> У 2024 році наш автосалон продав близько 5 мільйонів автомобілів : Ауді Q8 1.5 мільйонів одиниць ,Мередес S500 1 мільйон одиниць , Таврія Нова  2 мільйони одиниць Додж Челенжер 500 тис одиниць.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let cars = [];
            let currentIndex = 0;

            function showCar(index) {
                const car = cars[index];
                document.getElementById('carDisplay').innerHTML = `
                    <div>
                        <img src="${car.image_url}" alt="${car.make} ${car.model}" class="img-fluid">
                        <h3>${car.make} ${car.model}</h3>
                        <p>${car.engine}</p>
                        <p class="car-description">${car.description}</p>
                    </div>
                `;
            }

            fetch('fetch_cars.php')
                .then(response => response.json())
                .then(data => {
                    cars = data;
                    if (cars.length > 0) {
                        showCar(currentIndex);
                    }
                });

            document.getElementById('prevCar').addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    showCar(currentIndex);
                }
            });

            document.getElementById('nextCar').addEventListener('click', () => {
                if (currentIndex < cars.length - 1) {
                    currentIndex++;
                    showCar(currentIndex);
                }
            });
        });
    </script>
</body>
</html>
