<!--<!DOCTYPE html>
<html>
<head>
    <title>Переводы</title>
    <link href='/css/bootstrap.css' rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <meta charset="utf-8">


</head>


<body>
-->
<div class="container">
    <br>

    <div class="btn-group btn-group-lg">

        <?
        session_start();
        if (!isset($_SESSION['user_id'])) {
            ?>
            <button type="button" id="login" class="btn btn-default">Вход</button>
        <?
        }
        ?>
        <button type="button" id="cabinet" class="btn btn-default">Кабинет</button>
        <button type="button" id="orders" class="btn btn-default">Заказы</button>


        <?
        if (isset($_SESSION['user_id'])) {
            ?>
            <button type="button" id="logout" class="btn btn-default">Выход</button>
        <?
        }
        ?>


    </div>

</div>
<script>
    $('#cabinet').click(function () {
        window.location = 'cabinet.php';
    })

    $('#orders').click(function () {
        window.location = 'orders.php';
    })

    $('#login').click(function () {
        window.location = 'login.php';
    })

    $('#logout').click(function () {
        window.location = 'login.php?action=logout';
    })


</script>
<!--
</body>
</html>-->