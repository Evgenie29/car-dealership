<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Послуги автосалону - Logic Car</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .car-container img {
            width: 100%;
            max-width: 600px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .car-details {
            flex: 1;
            padding-left: 20px;
            text-align: left;
        }

        .car-details h3, .car-details p {
            margin: 10px 0;
        }

        .car-display-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
            width: 100%;
            flex-wrap: wrap;
        }

        .service-section {
            margin-top: 40px;
            text-align: center;
        }

        .service-details {
            display: none;
            margin-top: 20px;
            text-align: left;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .service-details.active {
            display: block;
        }

        .service-details p {
            margin-bottom: 20px;
        }

        .service-details ul {
            padding-left: 20px;
        }

        .service-details ul li {
            margin-bottom: 5px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        async function showCars() {
            try {
                const response = await fetch('fetch_cars.php');
                if (!response.ok) {
                    throw new Error(`Помилка HTTP! Статус: ${response.status}`);
                }
                const cars = await response.json();
                
                const carDisplayContainer = document.getElementById('carDisplayContainer');
                carDisplayContainer.innerHTML = ''; // Очистити попередній контент
        
                cars.forEach(car => {
                    const carElement = document.createElement('div');
                    carElement.classList.add('car-container');
                    carElement.innerHTML = `
                        <img src="${car.image_url}" alt="Автомобіль">
                        <div class="car-details">
                            <h3>${car.make} ${car.model}</h3>
                            <p>Двигун: ${car.engine}</p>
                            <p>Ціна: ${car.price} грн</p>
                            <p>${car.description}</p>
                            <button class="cta-button" onclick="scheduleTestDrive(${car.id})">Записатися на тест-драйв</button>
                        </div>
                    `;
                    carDisplayContainer.appendChild(carElement);
                });
            } catch (error) {
                console.error('Помилка завантаження автомобілів:', error);
                alert('Не вдалося завантажити автомобілі. Будь ласка, спробуйте пізніше.');
            }
        }
    
        async function showConsultations() {
            try {
                const response = await fetch('fetch_consultations.php');
                if (!response.ok) {
                    throw new Error(`Помилка HTTP! Статус: ${response.status}`);
                }
                const consultations = await response.json();
                
                const consultationDisplayContainer = document.getElementById('consultationDisplayContainer');
                consultationDisplayContainer.innerHTML = ''; // Очистити попередній контент
        
                consultations.forEach(consultation => {
                    const consultationElement = document.createElement('div');
                    consultationElement.classList.add('consultation-container');
                    consultationElement.innerHTML = `
                        <div class="consultation-details">
                            <h3>Працівник: ${consultation.employee_name}</h3>
                            <p>Посада: ${consultation.position}</p>
                            <p>Досвід: ${consultation.years_of_experience} років</p>
                            <button class="cta-button" onclick="scheduleConsultation(${consultation.id})">Записатися на консультацію</button>
                        </div>
                    `;
                    consultationDisplayContainer.appendChild(consultationElement);
                });
            } catch (error) {
                console.error('Помилка завантаження консультацій:', error);
                alert('Не вдалося завантажити консультації. Будь ласка, спробуйте пізніше.');
            }
        }
    
        function scheduleTestDrive(carId) {
            // Реалізуйте свою логіку для запису на тест-драйв
            alert(`Тест-драйв для автомобіля ${carId} заплановано!`);
        }

        function scheduleConsultation(consultationId) {
            // Реалізуйте свою логіку для запису на консультацію
            alert(`Консультація з ідентифікатором ${consultationId} запланована!`);
        }
    </script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logic Car</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Перемикач навігації">
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
            <h1>Послуги автосалону</h1>
        </header>
        <div class="poslyga">
            <div class="row">
                <div class="col-md-6">
                    <img src="image/550383_pr.jpg" alt="Автосалон" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h3>Перелік Послуг:</h3>
                    <div class="service-section">
                        <button class="cta-button" onclick="showCars()">Обрати автомобіль для тест-драйву</button>
                        <button class="cta-button" onclick="showConsultations()">Консультація клієнта</button>
                        <div class="car-display-container" id="carDisplayContainer">
                            <!-- Автомобілі будуть динамічно вставлені тут -->
                        </div>
                        <div class="consultation-display-container" id="consultationDisplayContainer">
                            <!-- Консультації будуть динамічно вставлені тут -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
