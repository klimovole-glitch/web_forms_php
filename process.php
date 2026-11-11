<?php
// 1. Проверяем, пришли ли данные методом POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Если зашли напрямую - перекидываем на форму
    header('Location: form.html');
    exit;
}

// 2. Получаем данные из формы и сразу очищаем их (htmlspecialchars)
// Возраст сразу приводим к числу (int)
$first_name = htmlspecialchars($_POST['first_name'] ?? '');
$last_name  = htmlspecialchars($_POST['last_name'] ?? '');
$age        = (int)($_POST['age'] ?? 0);
$group      = htmlspecialchars($_POST['group'] ?? '');
$specialty  = htmlspecialchars($_POST['specialty'] ?? '');

// 3. Проверяем поля на пустоту (empty)
if (empty($first_name) || empty($last_name) || empty($group) || empty($specialty)) {
    echo "<h3 style='color:red;'>Ошибка: Все поля должны быть заполнены!</h3>";
    echo "<a href='form.html'>Вернуться назад</a>";
    exit; // Останавливаем выполнение скрипта
}

// 4. Проверяем возраст
if ($age < 16 || $age > 100) {
    echo "<h3 style='color:red;'>Ошибка: Неверный возраст! Допустимый диапазон: от 16 до 100 лет.</h3>";
    echo "<a href='form.html'>Вернуться назад</a>";
    exit;
}

// 5. Если все проверки пройдены, выводим карточку успешной регистрации
echo "<h2>Карточка студента</h2>";
echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
echo "<tr><td><b>Имя:</b></td><td>{$first_name}</td></tr>";
echo "<tr><td><b>Фамилия:</b></td><td>{$last_name}</td></tr>";
echo "<tr><td><b>Возраст:</b></td><td>{$age}</td></tr>";
echo "<tr><td><b>Группа:</b></td><td>{$group}</td></tr>";
echo "<tr><td><b>Специальность:</b></td><td>{$specialty}</td></tr>";
echo "</table>";

// 6. Ссылка назад
echo "<br><a href='form.html'>← Вернуться к форме</a>";
?>