<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 2.2 - День тижня за номером</title>
</head>
<body>
    <h1>Завдання 2.2: День тижня за номером (switch)</h1>
    
    <h3>Введіть номер дня тижня (1-7):</h3>
    <form method="POST" action="">
        <input type="number" name="day_number" min="1" max="7" placeholder="Введіть число 1-7" required>
        <button type="submit">Показати день</button>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['day_number'])) {
        $dayNumber = $_POST['day_number'];
        
        echo "<h3>Результат:</h3>";
        echo "<p>Номер: <strong>$dayNumber</strong></p>";
        echo "<p>День тижня: ";
        
        switch ($dayNumber) {
            case 1:
                echo "<strong style='color: blue;'>Понеділок</strong>";
                break;
            case 2:
                echo "<strong style='color: blue;'>Вівторок</strong>";
                break;
            case 3:
                echo "<strong style='color: blue;'>Середа</strong>";
                break;
            case 4:
                echo "<strong style='color: blue;'>Четвер</strong>";
                break;
            case 5:
                echo "<strong style='color: blue;'>П'ятниця</strong>";
                break;
            case 6:
                echo "<strong style='color: blue;'>Субота</strong>";
                break;
            case 7:
                echo "<strong style='color: blue;'>Неділя</strong>";
                break;
            default:
                echo "<strong style='color: red;'>Помилка: введіть число від 1 до 7!</strong>";
        }
        
        echo "</p>";
    }
    
    echo "<hr>";
    echo "<h3>Повна таблиця днів тижня:</h3>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Номер</th><th>День тижня</th></tr>";
    
    for ($i = 1; $i <= 7; $i++) {
        echo "<tr><td>$i</td><td>";
        
        switch ($i) {
            case 1: echo "Понеділок"; break;
            case 2: echo "Вівторок"; break;
            case 3: echo "Середа"; break;
            case 4: echo "Четвер"; break;
            case 5: echo "П'ятниця"; break;
            case 6: echo "Субота"; break;
            case 7: echo "Неділя"; break;
        }
        
        echo "</td></tr>";
    }
    
    echo "</table>";
    ?>
    
    <hr>
    <p><a href="index.html">Назад до списку завдань</a></p>
</body>
</html>