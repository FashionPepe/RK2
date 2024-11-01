<?php
session_start(); // Запуск сессии
include 'db.php'; // Подключение к базе данных

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хеширование пароля

    // Проверка на существование пользователя
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() > 0) {
        $error = "Пользователь с таким email уже существует.";
    } else {
        // Вставка нового пользователя в базу данных
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        
        if ($stmt->execute([$name, $email, $password])) {
            $_SESSION['user'] = $email; // Сохранение информации о пользователе в сессии
            $_SESSION['user_id'] = $pdo->lastInsertId(); // Сохранение ID пользователя
            header('Location: ./index.php'); // Перенаправление на главную страницу
            exit();
        } else {
            $error = "Ошибка при регистрации. Попробуйте еще раз.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Регистрация</title>
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
    <h2>Регистрация нового аккаунта</h2>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form action="" method="POST" class="auth-form">
        <input type="text" name="name" placeholder="Имя" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Пароль" required />
        <button type="submit">Зарегистрироваться</button>
        <p>Уже есть аккаунт? <a href="login.php">Войдите</a></p>
    </form>
</main>

<footer>
   <p>Контактная информация: email@example.com | Телефон: +7 (123) 456-78-90</p>
   <p>&copy; 2024 СтройМаркет. Все права защищены.</p>
</footer>

</body>
</html>