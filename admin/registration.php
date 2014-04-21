<?php
include '../config.php';

require 'login.php';

if (isset($_POST['submit'])) {


    $err = array();


    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Логин может состоять только из символов и цифр";
    }
    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    $query_test = mysql_query("SELECT COUNT(id) FROM translators WHERE login='" . mysql_real_escape_string($_POST['login']) . "'")or die ("<br>Invalid query: " . mysql_error());
    if (mysql_result($query_test, 0) > 0) {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }


    if (count($err) == 0) {

        $login = $_POST['login'];
        $pass = trim($_POST['pass']);
        $address = trim($_POST['address']);
        $email = trim($_POST['email']);

        $query = "insert into translators (login,email,address,pass,type) values('" . $login . "','
" . $email . "','" . $address . "','" . $pass . "'," . 2 . ")";


        $result = mysql_query($query);


    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>

    <link href='/css/bootstrap.css' rel="stylesheet">
    <script src="../js/jquery.js"></script>

    <meta charset="utf-8">


</head>
<body>


<?
include 'templ/admin_menu.php';
?>

<br>

<div class="container">
    <H2>Регистрация пользователя</H2>

    <form action="registration.php" method="post">
        <div class="row">
            <div class="col-xs-3">
                <p>Логин <input type="text" class="form-control" name="login"></p>

                <p>Адрес <input type="text" class="form-control" name="address"></p>

                <p>Пароль <input type="password" class="form-control" name="pass"></p>

                <p>Email <input type="email" class="form-control" name="email"></p>

                <button type="submit" name="submit" class="btn btn-primary">Зарегистрировать</button>

                <br>
                <br>
                <a href="main.php"><?=$on_main?></a>

            </div>
        </div>

        <div class="row">

            <div class="col-xs-3">
                <?php
                if (isset($result)) {
                    if ($result) {
                        print '<br><br><br>Переводчик,' . $_POST['login'] . ' зарегистрирован <br> <a href="main.php">перейдите на главную сраницу</a>';

                    } else {
                        print 'Авторизация не удалась';
                    }
                }

                ?>
            </div>
            <div>
    </form>


</div>
<div class="container">
    <?php
    if (isset($err) && count($err) != 0) {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach ($err AS $error) {
            print '<p class="text-danger">' . $error . "</p>";
        }
    }

    ?>
</div>

</body>
</html>
