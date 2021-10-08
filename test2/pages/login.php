<?php
use App\Services\Page;

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
    <h1>Авторизация</h1>
    <form action="/auth/login" method="POST">
        <input type="text" name="login" id="login" placeholder="Логин">
        <input type="text" name="password" id="password" placeholder="пароль">
        <button type="submit">Войти</button>
    </form><br>
    <?php
    if(!$_SESSION['name']){  ?>
        <a href="/register" >Регистрация</a>
    <?php
    } else
  ?>
    <a href="/profile">Profile</a>

</div>
</body>
</html>