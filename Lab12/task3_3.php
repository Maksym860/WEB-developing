<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.3 - Таблиця функції y = 3x + 2</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Завдання 3.3: Таблиця значень функції y = 3x + 2</h1>
    
    <p><strong>Функція:</strong> y = 3x + 2</p>
    <p><strong>Діапазон x:</strong> від -2 до 2</p>
    <p><strong>Крок:</strong> 0.5</p>
    
    <?php
    echo "<table>";
    echo "<tr><th>x</th><th>y = 3x + 2</th></tr>";
    
    for ($x = -2.0; $x <= 2.0; $x += 0.5) {
        $y = 3 * $x + 2;
        
        // Форматуємо вивід
        $x_formatted = number_format($x, 1);
        $y_formatted = number_format($y, 1);
        
        // Додаємо колір для позитивних/негативних значень
        $color = ($y >= 0) ? 'green' : 'red';
        
        echo "<tr>";
        echo "<td>$x_formatted</td>";
        echo "<td style='color: $color;'><strong>$y_formatted</strong></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    ?>
    
    <hr>
    <h3>Графічне представлення:</h3>
    <svg width="600" height="400" style="border: 1px solid #ccc; background: #f9f9f9;">
        <?php
        // Малюємо осі координат
        echo '<line x1="50" y1="200" x2="550" y1="200" stroke="black" stroke-width="2"/>'; // Вісь X
        echo '<line x1="300" y1="50" x2="300" y1="350" stroke="black" stroke-width="2"/>'; // Вісь Y
        
        // Малюємо графік
        $points = "";
        for ($x = -2.0; $x <= 2.0; $x += 0.1) {
            $y = 3 * $x + 2;
            $svgX = 300 + ($x * 50); // Масштабуємо x
            $svgY = 200 - ($y * 50); // Масштабуємо y
            $points .= "$svgX,$svgY ";
        }
        
        echo '<polyline points="' . trim($points) . '" fill="none" stroke="blue" stroke-width="3"/>';
        
        // Позначки на осях
        for ($i = -2; $i <= 2; $i++) {
            $xPos = 300 + ($i * 50);
            echo '<line x1="' . $xPos . '" y1="195" x2="' . $xPos . '" y2="205" stroke="black"/>';
            echo '<text x="' . $xPos . '" y="220" text-anchor="middle">' . $i . '</text>';
        }
        
        for ($i = -4; $i <= 8; $i += 2) {
            $yPos = 200 - ($i * 50);
            echo '<line x1="295" y1="' . $yPos . '" x2="305" y2="' . $yPos . '" stroke="black"/>';
            echo '<text x="280" y="' . ($yPos + 5) . '" text-anchor="end">' . $i . '</text>';
        }
        
        // Підписи осей
        echo '<text x="560" y="210">X</text>';
        echo '<text x="310" y="40">Y</text>';
        ?>
    </svg>
    
    <hr>
    <p><a href="index.html">Назад до списку завдань</a></p>
</body>
</html>