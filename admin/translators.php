<?php
include '../config.php';
require 'login.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Все переводчики</title>
    <link href='/css/bootstrap.css' rel="stylesheet">
    <script src="../js/jquery.js"></script>

    <meta charset="utf-8">

</head>


<body>

<?
include 'templ/admin_menu.php';
?>

<div class="container">


    <br>

    <p class="lead">
        Переводчики
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Пароль</th>
            <th>Email</th>
            <th>Адрес</th>
            <th>Тип</th>
            <th>Статус</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $res2 = mysql_query("SELECT * FROM translators");
        $idx = 1;

        while ($row = mysql_fetch_array($res2)) {
            echo '<tr>';

            echo '<td>' . $idx++ . '</td>';
            echo '<td>' . $row["login"] . '</td>';
            echo '<td>' . $row["pass"] . '</td>';
            echo '<td>' . $row["email"] . '</td>';
            echo '<td>' . $row["address"] . '</td>';
            echo '<td>' . $row["type"] . '</td>';
            echo '<td>' . $row["status"] . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <br>
    <br>
    <a href="main.php"><?=$on_main?></a>

</div>


<script type="text/javascript">
    setTimeout(function () {
        location.reload();
    }, 15000);
</script>

</body>
</html>
