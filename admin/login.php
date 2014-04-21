<?php
include '../config.php';

session_start();

if (isset($_POST['submit'])) {

    $name = mysql_real_escape_string($_POST['login']);
    $pass = mysql_real_escape_string($_POST['pass']);
    $data = mysql_query("SELECT id,login,pass  FROM admins
     WHERE login='" . $name . "' and pass='" . $pass . "' LIMIT 1");


    if ($result = mysql_fetch_assoc($data)) {

        $_SESSION['admin_id'] = $result['id'];
        $_SESSION['admin_pass'] = $result['pass'];
        $_SESSION['admin_login'] = $result['login'];


        header("Location: main.php");
        exit;
    } else {
        $mess = "Вы ввели неправильный логин/пароль<br>";
    }
}
if (isset($_GET['action']) AND $_GET['action'] == "logout") {
    session_destroy();
    header("Location: main.php");
    exit;
}

if (isset($_SESSION['admin_id'])) return;
else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Авторизация администратора</title>
        <meta charset="utf-8">

        <link href='/css/bootstrap.css' rel="stylesheet">

    </head>
    <body>

    <div class="container">
        <H2>Вход на <?= SERVISE_NAME ?></H2>

        <form action="" method="post">
            <div class="row">
                <div class="col-xs-3">
                    <p>Логин <input type="text" class="form-control" name="login"></p>

                    <p>Пароль <input type="password" class="form-control" name="pass"></p>

                    <button type="submit" name="submit" class="btn btn-primary">Войти</button>


                </div>
            </div>


        </form>
        <br>
        <?
        if (isset($mess)) {
            print "<p class='text-warning'>" . $mess . "</p>";
        }
        ?>
        <br>
        <a href="main.php"><?= $on_main ?></a>
    </div>

    </body>
    </html>
<?
}
exit;
?>