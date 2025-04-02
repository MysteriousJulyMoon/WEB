<?php
session_start();
if (\$_SERVER["REQUEST_METHOD"] == "POST") {
    \$_SESSION["dish"] = \$_POST["dish"];
    \$_SESSION["ingredients"] = \$_POST["ingredients"];
    \$_SESSION["time"] = \$_POST["time"];
    header("Location: task4_2.php");
    exit();
}
?>
<form method="post">
    Название блюда: <input type="text" name="dish"><br>
    Ингридиенты: <input type="text" name="ingredients"><br>
    Время приготовления: <input type="number" name="time"><br>
    <button type="submit">Сохранить</button>
</form>