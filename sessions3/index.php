<!DOCTYPE html>
<html>
<head>
    <title>Магазин товаров</title>
</head>
<body>
    <h1>Магазин товаров</h1>
    
<?php
    $products = [
        ['id' => 1, 'name' => 'Товар 1', 'price' => 100, 'image' => 'product1.jpg'],
        ['id' => 2, 'name' => 'Товар 2', 'price' => 50, 'image' => 'product2.jpg'],
        ['id' => 3, 'name' => 'Товар 3', 'price' => 75, 'image' => 'product3.jpg'],
        ['id' => 4, 'name' => 'Товар 4', 'price' => 120, 'image' => 'product4.jpg'],
        ['id' => 5, 'name' => 'Товар 5', 'price' => 90, 'image' => 'product5.jpg'],
    ];
    
    session_start();
    
    foreach ($products as $product) {
        echo '<div>';
        echo '<img src="' . $product['image'] . '"' . $product['name'] . '" width="100" height="100">';
        echo '<p>' . $product['name'] . ' - Цена: ' . $product['price'] . ' руб.</p>';
        echo '<a href="index.php?id=' . $product['id'] . '">Купить</a>';
        echo '<hr>';
        echo '</div>';
    }
    $product_id = isset($_GET['id']) ? $_GET['id'] : 0;

    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            $_SESSION['cart'][] = $product;
            $_SESSION['total'] = isset($_SESSION['total']) ? $_SESSION['total'] + $product['price'] : $product['price'];
            break;
        }
    }
?>
    
    <h2>Корзина</h2>
    <p>Общая сумма: <?= isset($_SESSION['total']) ? $_SESSION['total'] : 0 ?> руб.</p>
</body>
</html>