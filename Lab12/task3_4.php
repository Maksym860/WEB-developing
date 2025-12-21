<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.4 - Таблиця вартості яблук</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
            width: 100%;
            max-width: 500px;
        }
        th, td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #FF9800;
            color: white;
        }
        .highlight {
            background-color: #FFF3CD;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Завдання 3.4: Таблиця вартості яблук</h1>
    
    <h3>Введіть ціну за 1 кг яблук (в гривнях):</h3>
    <form method="POST" action="">
        <input type="number" name="price" min="1" max="1000" step="0.01" placeholder="Наприклад: 25" required>
        <button type="submit">Показати таблицю</button>
    </form>
    
    <?php
    $pricePerKg = 25; // Значення за замовчуванням
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['price'])) {
        $pricePerKg = floatval($_POST['price']);
    }
    
    echo "<hr>";
    echo "<h3>Ціна за 1 кг: <strong style='color: #FF9800;'>$pricePerKg грн</strong></h3>";
    
    $pricePerGram = $pricePerKg / 1000;
    
    echo "<table>";
    echo "<tr><th>Вага</th><th>Вартість</th></tr>";
    
    for ($weight = 100; $weight <= 1000; $weight += 100) {
        $cost = $weight * $pricePerGram;
        $costFormatted = number_format($cost, 2);
        $weightKg = $weight / 1000;
        $weightFormatted = number_format($weightKg, 3);
        
        // Підсвічуємо 1 кг
        $rowClass = ($weight == 1000) ? 'class="highlight"' : '';
        
        echo "<tr $rowClass>";
        echo "<td>$weight г<br><small>($weightFormatted кг)</small></td>";
        echo "<td><strong>$costFormatted грн</strong></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    // Додатково показуємо декілька прикладів
    echo "<h3>Приклади розрахунку:</h3>";
    echo "<ul>";
    
    $examples = [250, 500, 750, 1250, 2000]; // Ваги в грамах
    
    foreach ($examples as $weight) {
        $cost = ($weight * $pricePerGram);
        $costFormatted = number_format($cost, 2);
        $weightKg = $weight / 1000;
        
        echo "<li><strong>$weight г ($weightKg кг)</strong> = $costFormatted грн</li>";
    }
    
    echo "</ul>";
    
    // Формула розрахунку
    echo "<div style='background: #E8F4F8; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
    echo "<h4>Формула розрахунку:</h4>";
    echo "<p>Вартість = Вага (в грамах) × (Ціна за 1 кг ÷ 1000)</p>";
    echo "<p><strong>Приклад:</strong> 300 г × ($pricePerKg грн ÷ 1000) = " . number_format(300 * $pricePerGram, 2) . " грн</p>";
    echo "</div>";
    ?>
    
    <hr>
    <p><a href="index.html">Назад до списку завдань</a></p>
</body>
</html>