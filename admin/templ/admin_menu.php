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
        if (!isset($_SESSION['admin_id'])) {
            ?>
            <button type="button" id="login" class="btn btn-default">Вход</button>
        <?
        }
        ?>
        <button type="button" id="reg" class="btn btn-default">Зарегистрировать переводчика</button>
        <button type="button" id="trans" class="btn btn-default">Переводчики</button>
        <button type="button" id="make_order" class="btn btn-default">Сделать заказ</button>
        <button type="button" id="orders" class="btn btn-default">Заказы</button>


        <?
        if (isset($_SESSION['admin_id'])) {
            ?>
            <button type="button" id="logout" class="btn btn-default">Выход</button>
        <?
        }
        ?>


    </div>

</div>
<script>
    $('#make_order').click(function () {
        window.location = 'make-order.php';
    })

    $('#reg').click(function () {
        window.location = 'registration.php';
    })

    $('#trans').click(function () {
        window.location = 'translators.php';
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