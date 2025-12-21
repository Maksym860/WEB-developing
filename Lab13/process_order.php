<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $payment = htmlspecialchars(trim($_POST['payment']));
    $comment = htmlspecialchars(trim($_POST['comment']));
    $products = isset($_POST['products']) ? $_POST['products'] : [];

    // Перевірка на вибір хоча б одного товару
    if (empty($products)) {
        die("<h2>Помилка: ви не обрали жодного товару.</h2>");
    }

    // Формування повідомлення
    $message = "<h2>Дякуємо за ваше замовлення, $name!</h2>";
    $message .= "<p><strong>Контактна інформація:</strong></p>";
    $message .= "<ul>";
    $message .= "<li>Електронна пошта: $email</li>";
    $message .= "<li>Телефон: $phone</li>";
    $message .= "<li>Адреса доставки: $address</li>";
    $message .= "</ul>";

    $message .= "<p><strong>Обрані товари:</strong></p>";
    $message .= "<ul>";
    foreach ($products as $product) {
        $message .= "<li>$product</li>";
    }
    $message .= "</ul>";

    $message .= "<p><strong>Спосіб оплати:</strong> $payment</p>";

    if (!empty($comment)) {
        $message .= "<p><strong>Ваш коментар:</strong> $comment</p>";
    }

    $message .= "<p><strong>Очікуйте дзвінка від менеджера для підтвердження замовлення.</strong></p>";
    $message .= "<p>З повагою, інтернет-магазин TechStore.</p>";

    // Виведення повідомлення
    echo $message;
} else {
    echo "<h2>Помилка: форма не була надіслана.</h2>";
}
?>