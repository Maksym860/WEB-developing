<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 1.3 - Перевірка на парність</title>
</head>
<body>
    <h1>Завдання 1.3: Перевірка числа на парність</h1>
    
    <?php
    // Імітація введення з клавіатури
    $numbers = [17, 24, 0, -5, 8]; // Кілька чисел для прикладу
    
    echo "<h3>Перевірка кількох чисел:</h3>";
    
    foreach ($numbers as $number) {
        echo "<p>Число: <strong>$number</strong> - ";
        
        if ($number % 2 == 0) {
            echo "<span style='color: green;'>парне</span>";
        } else {
            echo "<span style='color: red;'>непарне</span>";
        }
        
        echo "</p>";
    }
    ?>
    
    <hr>
    <h3>Введіть своє число для перевірки:</h3>
    <form method="POST" action="">
        <input type="number" name="user_number" placeholder="Введіть число" required>
        <button type="submit">Перевірити</button>
    </form>
    
    <?php
    // Обробка форми
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_number'])) {
        $userNumber = $_POST['user_number'];
        
        echo "<h3>Ваш результат:</h3>";
        echo "<p>Число: <strong>$userNumber</strong> - ";
        
        if ($userNumber % 2 == 0) {
            echo "<span style='color: green;'>парне</span>";
        } else {
            echo "<span style='color: red;'>непарне</span>";
        }
        
        echo "</p>";
    }
    ?>
    
    <hr>
    <p><a href="index.html">Назад до списку завдань</a></p>
</body>
</html>