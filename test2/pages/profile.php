<?php
use App\Services\Page;


if(!$_SESSION["name"]){
    \App\Services\Router::redirect('/login');
}
?>

<!doctype html>
<head>
    <meta charset="utf-8" />
    <title></title>

</head>
<body>
<div class="container">
    <h1>Hello, <?=$_SESSION['name']?></h1>
    <form action="/auth/logout" method="post">
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>