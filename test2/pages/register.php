<?php use App\Services\Page;

if($_SESSION["name"]){
\App\Services\Router::redirect('/profile');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
    <h1>Регистрация</h1>
    <form action="/auth/register" method="POST">
        <p>Логин</p>
        <input type="text" name="login" id="login" placeholder="Логин">
        <p>Пароль</p>
        <input type="text" name="password" id="password" placeholder="пароль">
        <p>Подтверждение пароля</p>
        <input type="text" name="confirm_password" id="confirm_password" placeholder="Подтверждение">
        <p>email</p>
        <input type="text" name="email" id="email" placeholder="Почта">
        <p>Имя</p>
        <input type="text" name="name" id="name" placeholder="Имя"><br>

        <button type="submit">Зарегестрироваться</button>
    </form><br>
    <a href="/login" >Авторизация</a>
</div>
</body>
</html>