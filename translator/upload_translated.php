<?php
include '../config.php';
require 'login.php';

if (isset($_GET['order_id'])) {

    if (isset ($_FILES['translate'])) {
        $uploaddir = '../translated/';
        $uploadfile = $uploaddir . basename($_FILES['translate']['name']) . '_' . time();

        echo $uploadfile;

        echo '<pre>';

        if (move_uploaded_file($_FILES['translate']['tmp_name'], $uploadfile)) {

            $comment = mysql_real_escape_string($_POST['comment']);

            $query = "update orders set status=2,translator_comment='" . $comment . "',
         translated_file='" . $uploadfile . "',translated_date='" . date("Y-m-d h:i") . "' where id=" . $_GET['order_id'] . "";


            $result = mysql_query($query);

            if (!$result) {
                print mysql_error();
                exit;
            }

            print $_FILES['translate']['name'] . " Файл был успешно загружен . \n";
        } else {
            print "Возможная атака с помощью файловой загрузки!\n";
        }

        print " </pre > ";
    }
    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <title>Загрузка перевода</title>

        <link href='/css/bootstrap.css' rel="stylesheet">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css"
        / >
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery.datetimepicker.js"></script>

    </head>
<body>

    <?
    include  'templ/menu.php';
    ?>
    <br>

<div class="container">
    <H2>Загрузка переведенного материала</H2>
    <br>
    <br>

    <form method="post" role="form" class="form-horizontal" enctype="multipart/form-data">

        <div class="form-group">
            <label for="comment" class="col-sm-2 control-label">
                Комментарий
            </label>

            <div class="col-sm-3">
                <input id="comment" class="form-control" name="comment" type="text">
            </div>
        </div>

        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
            <label for="file" class="col-sm-2 control-label">
                Переведенный документ
            </label>

            <div class="col-sm-3">
                <input type="file" id="file" name="translate">
            </div>
        </div>


        <label for="file" class="col-sm-2 control-label">
        </label>


        <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

        <br>
        <br>
        <a href="main.php"><?=$on_main?></a>

    </form>
<?
} else {
    header("Lcation: cabinet.php");
}
?>