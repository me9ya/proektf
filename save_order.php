<?php
// Проверим, что форма отправлена методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"] ?? "Не указано");
    $phone = htmlspecialchars($_POST["phone"] ?? "Не указано");
    $bouquet = htmlspecialchars($_POST["bouquet"] ?? "Не выбрано");
    $message = htmlspecialchars($_POST["message"] ?? "Без пожеланий");

    $entry = "Имя: $name, Телефон: $phone, Букет: $bouquet, Комментарий: $message" . PHP_EOL;

    // Сохраняем в файл
    $file = fopen("orders.txt", "a");
    if ($file) {
        fwrite($file, $entry);
        fclose($file);
        echo "<h2 style='color: green;'>✅ Заказ успешно сохранён!</h2>";
    } else {
        echo "<h2 style='color: red;'>❌ Не удалось сохранить заказ.</h2>";
    }

    echo "<a href='order.html'>Назад к форме</a>";
} else {
    // Если кто-то зашёл напрямую
    echo "<h2>Ошибка: форма не была отправлена.</h2>";
}
?>
