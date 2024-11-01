<?php
session_start(); // Запуск сессии
include './db.php'; // Подключение к базе данных

// Получаем ID товара из URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Получаем информацию о товаре из базы данных
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();

if (!$product) {
    // Если товар не найден, перенаправляем на страницу магазина
    header('Location: shop.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
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
    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="max-width: 300px;">
    <p><?php echo htmlspecialchars($product['description']); ?></p>
    <p>Цена: <?php echo htmlspecialchars($product['price']); ?> руб.</p>

    <!-- Форма для добавления товара в корзину -->
    <form action="cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <button type="submit" name="add_to_cart">Добавить в корзину</button>
    </form>

    <p><a href="shop.php">Вернуться к товарам</a></p>
</main>

<footer>
   <p>Контактная информация: email@example.com | Телефон: +7 (123) 456-78-90</p>
   <p>&copy; 2024 СтройМаркет. Все права защищены.</p>
</footer>

</body>
</html>