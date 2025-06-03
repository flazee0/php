<?php
// Запись и чтение сессии
session_start();

if (!isset($_SESSION['test_data'])) {
    $_SESSION['test_data'] = 'test';
    echo "Данные 'test' записаны в сессию. Обновите страницу.";
} else {
    echo "Данные из сессии: " . $_SESSION['test_data'];
}
?>

<?php
// Счетчик обновлений
session_start();

if (!isset($_SESSION['refresh_count'])) {
    $_SESSION['refresh_count'] = 0;
    echo "Вы еще не обновляли страницу.";
} else {
    $_SESSION['refresh_count']++;
    echo "Количество обновлений: " . $_SESSION['refresh_count'];
}
?>

<?php
// Время захода
session_start();

if (!isset($_SESSION['visit_time'])) {
    $_SESSION['visit_time'] = time();
    echo "Время захода записано. Обновите страницу.";
} else {
    $seconds = time() - $_SESSION['visit_time'];
    echo "С момента вашего захода прошло: " . $seconds . " секунд";
}
?>

<?php
// Запись в куку и вывод на экран
if (!isset($_COOKIE['test_cookie'])) {
    setcookie('test_cookie', '123', time()+7200);
    echo "Кука установлена. Обновите страницу.";
} else {
    echo "Значение куки: " . $_COOKIE['test_cookie'];
}
?>

<?php
// Удаление куки
if (isset($_COOKIE['test_cookie'])) {
    setcookie('test_cookie', '', time()-7200);
    echo "Кука удалена.";
} else {
    echo "Кука не существует.";
}
?>