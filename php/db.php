<?php
$host = '127.0.0.1';
$db = 'shop_db';
$user = 'shop';
$pass = '123';

try {
   $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
   echo 'Ошибка подключения к базе данных: ' . $e->getMessage();
}
?>