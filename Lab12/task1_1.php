<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 1.1 - Найменше з трьох чисел</title>
</head>
<body>
    <h1>Завдання 1.1: Знайти найменше з трьох чисел</h1>
    
    <?php
    // Задаємо три числа
    $x = 7.5;
    $y = 3.2;
    $z = 5.8;
    
    echo "<p><strong>Задані числа:</strong></p>";
    echo "<ul>";
    echo "<li>x = $x</li>";
    echo "<li>y = $y</li>";
    echo "<li>z = $z</li>";
    echo "</ul>";
    
    // Знаходимо найменше число
    if ($x <= $y && $x <= $z) {
        $min = $x;
    } elseif ($y <= $x && $y <= $z) {
        $min = $y;
    } else {
        $min = $z;
    }
    
    echo "<p><strong>Найменше число:</strong> $min</p>";
    ?>
    
    <hr>
    <p><a href="index.html">Назад до списку завдань</a></p>
</body>
</html>