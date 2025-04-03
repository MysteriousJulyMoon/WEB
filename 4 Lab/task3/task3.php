//Количество слов с повторяющимися буквами
<?php
if (isset($_SERVER['REQUEST_METHOD'])
    && $_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['text']))
{
    $text = $_POST['text'];
    $repeatedLetterWordCount = 0;

    preg_match_all('/\b[\p{L}\'-]+\b/u', $text, $matches);

    foreach ($matches[0] as $word) {
        $letters = str_split(mb_strtolower($word, 'UTF-8')); // Преобразуем в нижний регистр (с учетом UTF-8) и разбиваем на буквы
        $letterCounts = array_count_values($letters);

        $hasRepeatedLetters = false;
        foreach ($letterCounts as $count) {
            if ($count > 1) {
                $hasRepeatedLetters = true;
                break;
            }
        }

        if ($hasRepeatedLetters) {
            $repeatedLetterWordCount++;
        }
    }

    echo "<h3>Результат:</h3>";
    echo "Слов с повторяющимися буквами: $repeatedLetterWordCount";
}
//Запускаем на локальном сервере
?>

<form method="post">
    <textarea name="text" placeholder="Введите текст..."><?=
        isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''
        ?></textarea>
    <br>
    <button type="submit">Посчитать</button>
</form>

