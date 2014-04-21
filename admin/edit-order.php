<?php
include '../config.php';
require 'login.php';



if (isset($_POST['submit'])) {
    //todo добавить изменнеие файла

    //    if (($_FILES['order']) != null) {
    //        $uploaddir = '../upload/';
    //        $uploadfile = $uploaddir . basename($_FILES['order']['name']) . '_' . time();
    //
    //        if (!move_uploaded_file($_FILES['order']['tmp_name'], $uploadfile)) {
    //            print 'Файл не загружен, произошла ошибка';
    //        }
    //    }


    //todo пока сделано в тупую, просо все поля перезаписываются, нужно переделать по нормальному

    $name = mysql_real_escape_string($_POST['order_name']);
    $stop_date = mysql_real_escape_string($_POST['stop_date']);
    $comment = mysql_real_escape_string($_POST['comment']);
    $type = mysql_real_escape_string($_POST['type']);


    $query = "update orders set comment='" . $comment . "', file_name='" . $name . "', stop_date='" . $stop_date . "',
    type=" . $type . " where id=" . $_GET['order_id'];


    $result = mysql_query($query);

    if ($result) {
        header('Location: orders.php');
    } else {
        print mysql_error();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Редактирование отчета # <?=$_GET['order_id']?></title>

    <link href='/css/bootstrap.css' rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.datetimepicker.js"></script>

</head>
<body>


<?
$qery_order = mysql_query('select * from orders where id=' . $_GET['order_id']);

$result = mysql_fetch_assoc($qery_order);


if(isset($_GET['order_id'])){
?>

<div class="container">
    <H2>Редактирование отчета # <?=$_GET['order_id']?></H2>

    <form method="post" role="form" class="form-horizontal">


        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">
                Название заказа
            </label>

            <div class="col-sm-3">
                <input id="name" value="<?= $result['file_name'] ?>" name="order_name" class="form-control" type="text"
                       maxlength="23">
            </div>
        </div>

        <div class="form-group">

            <label for="datetimepicker" class="col-sm-2 control-label">
                Время сдачи перевода
            </label>

            <div class="col-sm-3">
                <input id="datetimepicker" value="<?= $result['stop_date'] ?>" name="stop_date" class="form-control"
                       type="text">
            </div>
        </div>

        <div class="form-group">
            <label for="comment" class="col-sm-2 control-label">
                Комментарий
            </label>

            <div class="col-sm-3">
                <input id="comment" value="<?= $result['comment'] ?>" class="form-control" name="comment" type="text">
            </div>
        </div>


        <div class="form-group">
            <label for="type" class="col-sm-2 control-label">
                Тип перевода
            </label>

            <div class="col-sm-3">
                <select name="type" id="type">
                    <option
                        value="0" <?=$result['type'] == 0 ? 'selected="selected"' : '""'?>><?=$order_type[0]?></option>
                    <option
                        value="1"<?=$result['type'] == 1 ? 'selected="selected"' : '""'?>><?=$order_type[1]?></option>
                    <option
                        value="2"<?=$result['type'] == 2 ? 'selected="selected"' : '""'?>><?=$order_type[2]?></option>
                    <option
                        value="3"<?=$result['type'] == 3 ? 'selected="selected"' : '""'?>><?=$order_type[3]?></option>
                </select>
            </div>
        </div>


        <!-- <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
            <label for="file" class="col-sm-2 control-label">
                Документ для перевода
            </label>

            <div class="col-sm-3">
                <input type="file" id="file" name="order">
            </div>

            <input name="old_path" value="<?/*= $result['file_path'] */?>" type="hidden">

        </div>
-->
        <label for="file" class="col-sm-2 control-label">
        </label>

        <button type="submit" name="submit" class="btn btn-primary">Изменить</button>

        <br>
        <br>
        <a href="main.php"><?=$on_main?></a>

    </form>

</div>


</body>

<script>


    $('#datetimepicker').datetimepicker({
        format: 'Y-m-d H:i',
        lang: 'ru'
    });


</script>
<?
}
else {
    header('Location:orders.php');
}
?>
</html>
