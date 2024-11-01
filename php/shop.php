<?php
session_start(); // Запуск сессии
include './db.php'; // Подключение к базе данных
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
                <li><a href="logout.php">Выход</a></li>
            <?php else: ?>
                <li><a href="login.php">Войти</a></li>
                <li><a href="register.php">Регистрация</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <h2>Наши товары</h2>

    <div class="products">
        <?php
        // Получаем список товаров из базы данных
        $stmt = $pdo->query("SELECT * FROM products");
        $products = $stmt->fetchAll();

        foreach ($products as $product): ?>
            <div class="product-card">
                <!-- Ссылка на страницу товара -->
                <h3><a href="product.php?id=<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['name']); ?></a></h3> 
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p><?php echo htmlspecialchars($product['price']); ?> руб.</p>

                <!-- Форма для добавления товара в корзину -->
                <form action="./cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" name="add_to_cart">Добавить в корзину</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<footer>
   <p>Контактная информация: email@example.com | Телефон: +7 (123) 456-78-90</p>
   <p>&copy; 2024 СтройМаркет. Все права защищены.</p>
</footer>

</body>
</html>