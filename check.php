<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$date = filter_var(trim($_POST['date']), FILTER_SANITIZE_NUMBER_INT);
$email = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
}
if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo "Недопустимая длина имени";
    exit();
}
if (mb_strlen($pass) < 2 || mb_strlen($pass) > 25) {
    echo "Недопустимая длина пароля (от 2 до 25 символов)";
    exit();
}
$mysql = new mysqli('localhost', 'root', '', 'register-bd');
$mysql->query("INSERT INTO `user` (`login`, `name`, `pass`) 
VALUES ('$login','$name','$pass')");
$mysql->close();
header('Location:/registration/success.html');
?>
