<?php
session_start(); // Запуск сессии
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>СтройМаркет</title>
</head>
<body>

<header>
    <div class="logo">СтройМаркет</div>
    <nav>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="shop.php">Магазин</a></li>
            <li><a href="contacts.php">Контакты</a></li>
            <li><a href="cart.php">Корзина</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="./logout.php">Выход</a></li>
            <?php else: ?>
                <li><a href="./login.php">Войти</a></li>
                <li><a href="./register.php">Регистрация</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <section class="hero">
        <h1>Добро пожаловать в наш магазин!</h1>
        <p>Лучшие товары по лучшим ценам.</p>
        <!-- Здесь можно добавить слайд-шоу -->
    </section>

    <!-- Карусель с отзывами -->
    <section class="reviews-carousel">
        <h2>Отзывы наших клиентов</h2>
        <div class="carousel">
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <div class="carousel-container">
                <div class="review-card active">
                    <p>"Отличный магазин! Быстрая доставка и качественные товары."</p>
                    <h3>- Иван Иванов</h3>
                </div>
                <div class="review-card">
                    <p>"Я очень доволен покупкой. Обязательно вернусь за новыми товарами!"</p>
                    <h3>- Мария Петрова</h3>
                </div>
                <div class="review-card">
                    <p>"Прекрасный сервис и поддержка. Рекомендую всем!"</p>
                    <h3>- Алексей Смирнов</h3>
                </div>
            </div>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </section>

</main>

<footer>
    <p>Контактная информация: email@example.com | Телефон: +7 (123) 456-78-90</p>
    <p>&copy; 2024 СтройМаркет. Все права защищены.</p>
</footer>

<script src="../js/script.js"></script>



</body>
</html>