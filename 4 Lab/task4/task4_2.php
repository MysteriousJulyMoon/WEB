<?php
session_start();

if (!isset($_SESSION["dish"])) {
    header("Location: task4_1.php");
    exit();
}

echo "<h3>Информация о блюде:</h3>";
echo "Название блюда: " . htmlspecialchars($_SESSION["dish"]) . "<br>";
echo "Ингредиенты: " . htmlspecialchars($_SESSION["ingredients"]) . "<br>";
echo "Время приготовления: " . htmlspecialchars($_SESSION["time"]) . " минут";
?>

