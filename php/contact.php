<?php
session_start(); // Запуск сессии
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Контакты</title>
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
                <li><a href="logout.php">Выход</a></li>
            <?php else: ?>
                <li><a href="login.php">Войти</a></li>
                <li><a href="register.php">Регистрация</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <h2>Контактная информация</h2>

    <p>Если у вас есть вопросы или предложения, вы можете связаться с нами по следующим контактам:</p>

    <ul>
        <li>Email: email@example.com</li>
        <li>Телефон: +7 (123) 456-78-90</li>
        <li>Адрес: г. Москва, ул. Примерная, д. 1</li>
    </ul>

    <h3>Форма обратной связи</h3>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <?php
        // Обработка формы обратной связи
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Здесь вы можете добавить код для отправки сообщения на почту или сохранения в базе данных

        echo "<p>Спасибо, $name! Ваше сообщение отправлено.</p>";
        ?>
    <?php endif; ?>

    <form action="" method="POST">
        <input type="text" name="name" placeholder="Ваше имя" required />
        <input type="email" name="email" placeholder="Ваш Email" required />
        <textarea name="message" placeholder="Ваше сообщение" required></textarea>
        <button type="submit">Отправить сообщение</button>
    </form>

</main>

<footer>
   <p>Контактная информация: email@example.com | Телефон: +7 (123) 456-78-90</p>
   <p>&copy; 2024 СтройМаркет. Все права защищены.</p>
</footer>

</body>
</html>s