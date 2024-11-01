<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Проверка пользователя в базе данных
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $email; // Сохранение email пользователя
        $_SESSION['user_id'] = $user['id']; // Сохранение ID пользователя
        header('Location: ./index.php'); // Перенаправление на главную страницу
    }
    else {
        $error = "Неверный email или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Вход</title>
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
    <h2>Вход в аккаунт</h2>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="POST" class="auth-form">
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Пароль" required />
        <button type="submit">Войти</button>
        <p>Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
    </form>
</main>

<footer>
   <p>Контактная информация: email@example.com | Телефон: +7 (123) 456-78-90</p>
   <p>&copy; 2024 СтройМаркет. Все права защищены.</p>
</footer>

</body>
</html>