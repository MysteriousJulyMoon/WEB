<?php
session_start();
if (!isset(\$_SESSION["dish"])) {
    header("Location: task4_1.php");
    exit();
}
echo "Блюдо: " . htmlspecialchars(\$_SESSION["dish"]) . "<br>";
echo "Ингредиенты: " . htmlspecialchars(\$_SESSION["ingredients"]) . "<br>";
echo "Время: " . htmlspecialchars(\$_SESSION["time"]) . "₽";
?>