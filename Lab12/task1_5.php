<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 1.5 - Добуток двох менших чисел</title>
</head>
<body>
    <h1>Завдання 1.5: Знайти добуток двох менших чисел</h1>
    
    <?php
    // Задаємо три різних числа
    $a = 12;
    $b = 7;
    $c = 9;
    
    echo "<p><strong>Задані числа:</strong></p>";
    echo "<ul>";
    echo "<li>a = $a</li>";
    echo "<li>b = $b</li>";
    echo "<li>c = $c</li>";
    echo "</ul>";
    
    // Знаходимо два найменші числа
    if ($a <= $b && $a <= $c) {
        $min1 = $a;
        $min2 = ($b <= $c) ? $b : $c;
    } elseif ($b <= $a && $b <= $c) {
        $min1 = $b;
        $min2 = ($a <= $c) ? $a : $c;
    } else {
        $min1 = $c;
        $min2 = ($a <= $b) ? $a : $b;
    }
    
    // Обчислюємо добуток
    $product = $min1 * $min2;
    
    echo "<p><strong>Два менші числа:</strong> $min1 і $min2</p>";
    echo "<p><strong>Їх добуток:</strong> $product</p>";
    echo "<p>$min1 × $min2 = $product</p>";
    ?>
    
    <hr>
    <p><a href="index.html">Назад до списку завдань</a></p>
</body>
</html>