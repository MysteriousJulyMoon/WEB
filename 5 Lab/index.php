<?php

// Настройка категорий
$categories = ["Путешествия", "Отдых", "Туризм"];

// Функция для создания директории, если её нет
function createDirectoryIfNotExists($dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true); // Создаем директорию с правами доступа 0777
    }
}

// Создаем директории для категорий
foreach ($categories as $category) {
    createDirectoryIfNotExists($category);
}

// Обработка формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL); // Валидация email
    $category = $_POST["category"];
    $title = preg_replace("/[^a-zA-Zа-яА-Я0-9_s]/u", "", $_POST["title"]); // Санитизация заголовка
    $content = $_POST["content"];

    // Проверка на заполненность и валидация email
    if ($email && in_array($category, $categories) && !empty($title) && !empty($content)) {
        $filename = "$category/" . str_replace(" ", "_", $title) . ".txt";
        $filename =  preg_replace("/[^a-zA-Zа-яА-Я0-9_-.]/u", "", $filename); //доп санитизация
        // Запись данных в файл
        if (file_put_contents($filename, "Email: $emailnn$content")) {
            $message = "Объявление успешно добавлено!";
        } else {
            $error = "Ошибка при записи в файл. Проверьте права на запись.";
        }
    } else {
        $error = "Пожалуйста, заполните все поля корректно.";
    }
}

// Получение списка объявлений из фиксированных файлов
$ads = [];
$fixed_files = [
    "Путешествия/Путешествия.txt",
    "Отдых/Отдых.txt",
    "Туризм/Туризм.txt"
];

foreach ($fixed_files as $file) {
    if (file_exists($file)) { // Проверяем, существует ли файл
        $content = file_get_contents($file);
        $category = dirname($file); // Получаем категорию из пути файла
        $title = pathinfo($file, PATHINFO_FILENAME); // Получаем название файла без расширения

        $ads[] = [
            "category" => $category,
            "title" => $title,
            "content" => $content
        ];
    } else {
        // Обработка случая, когда файл не найден. Можно, например, вывести сообщение об ошибке в лог.
        error_log("Файл не найден: " . $file);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Доска объявлений</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        td, th { border: 1px solid #ddd; padding: 8px; }
        textarea {width: 300px; height: 150px;}
    </style>
</head>
<body>
    <h2>Добавить объявление</h2>
    <?php if (isset($message)): ?>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post">
        Email: <input type="email" name="email" required><br><br>
        Категория:
        <select name="category" required>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
            <?php endforeach; ?>
        </select><br><br>
        Заголовок: <input type="text" name="title" required><br><br>
        Текст объявления:<br>
        <textarea name="content" rows="5" cols="40" required></textarea><br>  <!-- Увеличен размер textarea -->
        <button type="submit">Добавить</button>
    </form>

    <h2>Список объявлений</h2>
    <table>
        <tr>
            <th>Категория</th>
            <th>Заголовок</th>
            <th>Содержание</th>
        </tr>
        <?php if (empty($ads)): ?>
          <tr><td colspan="3">Нет объявлений в выбранных категориях.</td></tr>
        <?php else: ?>
          <?php foreach ($ads as $ad): ?>
            <tr>
                <td><?= htmlspecialchars($ad["category"]) ?></td>
                <td><?= htmlspecialchars($ad["title"]) ?></td>
                <td><pre><?= htmlspecialchars($ad["content"]) ?></pre></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>
