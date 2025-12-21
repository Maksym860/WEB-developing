<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 2.4 - Продовжити/завершити роботу</title>
</head>
<body>
    <h1>Завдання 2.4: Продовжити/завершити роботу програми</h1>
    
    <h3>Оберіть дію:</h3>
    <form method="POST" action="">
        <p>
            <input type="radio" name="action" value="y" id="yes" required>
            <label for="yes">Продовжити роботу (y)</label>
        </p>
        <p>
            <input type="radio" name="action" value="n" id="no">
            <label for="no">Завершити роботу (n)</label>
        </p>
        <button type="submit">Виконати</button>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
        $answer = $_POST['action'];
        
        echo "<h3>Результат:</h3>";
        echo "<p>Ваш вибір: <strong>'$answer'</strong></p>";
        echo "<p>";
        
        switch ($answer) {
            case "y":
            case "Y":
                echo "✅ <strong>Продовжуємо роботу програми...</strong>";
                echo "<br><br>Програма виконує обчислення...<br>";
                echo "Обчислення завершено успішно!";
                break;
            case "n":
            case "N":
                echo "⛔ <strong>Завершення роботи програми.</strong>";
                echo "<br><br>Збереження даних...<br>";
                echo "Вихід з програми...<br>";
                echo "<strong>Програма завершена!</strong>";
                break;
            default:
                echo "❌ <strong>Помилка: введіть 'y' (продовжити) або 'n' (завершити)</strong>";
        }
        
        echo "</p>";
    }
    ?>
    
    <hr>
    <h3>Приклади роботи програми:</h3>
    <?php
    $testAnswers = ["y", "n", "Y", "N", "x"];
    
    echo "<ul>";
    foreach ($testAnswers as $test) {
        echo "<li>Введено: '$test' → ";
        
        switch ($test) {
            case "y":
            case "Y":
                echo "Продовжуємо роботу програми...";
                break;
            case "n":
            case "N":
                echo "Завершення роботи програми.";
                break;
            default:
                echo "Помилка: введіть 'y' або 'n'";
        }
        
        echo "</li>";
    }
    echo "</ul>";
    ?>
    
    <hr>
    <p><a href="index.html">Назад до списку завдань</a></p>
</body>
</html>