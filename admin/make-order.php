<?php
include '../config.php';
require 'login.php';


$query_trans = mysql_query("SELECT * FROM translators");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Отправка заказа</title>

    <link href='/css/bootstrap.css' rel="stylesheet">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.datetimepicker.js"></script>


    <style>
        .translators-list {
            width: 350px;
            height: 150px;
            overflow-y: scroll;
        }
    </style>

</head>
<body>

<?
include 'templ/admin_menu.php';
?>

<br>

<div class="container">
    <H2>Отправка заказа на перевод</H2>

    <form method="post" role="form" class="form-horizontal" enctype="multipart/form-data">


        <div class="form-group">
            <label for="datetimepicker" class="col-sm-2 control-label">
                Время сдачи перевода
            </label>

            <div class="col-sm-3">
                <input id="datetimepicker" name="stop_date" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label for="comment" class="col-sm-2 control-label">
                Комментарий
            </label>

            <div class="col-sm-3">
                <input id="comment" class="form-control" name="comment" type="text">
            </div>
        </div>

        <div class="form-group">
            <label for="comment" class="col-sm-2 control-label">
                Тип перевода
            </label>

            <div class="col-sm-3">
                <select name="type">
                    <option value="0"><?=$order_type[0]?></option>
                    <option value="1"><?=$order_type[1]?></option>
                    <option value="2"><?=$order_type[2]?></option>
                    <option value="3"><?=$order_type[3]?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
            <label for="private-ord" class="col-sm-2 control-label">
                Личный заказ
            </label>

            <div class="col-sm-3">
                <input type="checkbox" id="private-ord" name="private-ord">
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-2 control-label" id="translators-lbl">
                Для переводчиков
            </label>

            <div class="col-sm-3 container translators-list" id="translators-list">
                <?
                while ($tr = $translators = mysql_fetch_array($query_trans)) {

                    print '<p><input type="checkbox" name="trans' . $tr['id'] . '" value="' . $tr['id'] . '"> ' . $tr['login'] . ' </p>';

                }
                ?>


            </div>
        </div>


        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
            <label for="file" class="col-sm-2 control-label">
                Документ для перевода (мах.2,5 мб).
            </label>

            <div class="col-sm-3">
                <input type="file" id="file" required="required" name="order">
            </div>

        </div>


        <label for="file" class="col-sm-2 control-label">
        </label>


        <button type="submit" name="submit" class="btn btn-primary">Отправить</button>

        <br>
        <br>
        <a href="main.php"><?=$on_main?></a>

    </form>
    <?php

    if (isset ($_FILES['order'])) {
        $uploaddir = '../upload/';
        $uploadfile = $uploaddir . basename($_FILES['order']['name']) . '_' . time();

        echo '<pre>';
        //        if(is_uploaded_file($_FILES['order']['tmp_name'])){
        //            print "yes";
        //        }

        if (move_uploaded_file($_FILES['order']['tmp_name'], $uploadfile)) {

            $can_view;

            foreach ($_POST as $key => $value) {
                if (strpos($key, "trans") === 0) {
                    $can_view .= $value . ",";
                }

            }

            if (substr($can_view, -1) == ',') {
                $can_view = substr_replace($can_view, " ", -1);
            }

            $stop_date = mysql_real_escape_string($_POST['stop_date']);
            $comment = mysql_real_escape_string($_POST['comment']);
            $type = mysql_real_escape_string($_POST['type']);

            $file_name = substr($_FILES['order']['name'], 0, 23);

            $query = "insert into orders (file_path,file_name,stop_date,comment,type,status,can_view)
                    values('" . $uploadfile . "','" . $file_name . "',
                    '" . $stop_date . "','" . $comment . "'," . $type . ",
                    " . 0 . ", '" . $can_view . "')";


            $result = mysql_query($query);

            if ($result) {
                print 'Заказ принят' . "\n";
            } else {
                print mysql_error();
            }

//            print $_FILES['order']['name'] . " Файл был успешно загружен . \n";
        } else {
            print "Возможная атака с помощью файловой загрузки!\n";
        }

//        echo 'Некоторая отладочная информация:';
//        print_r($_FILES);

        print " </pre > ";
    }
    //    foreach ($_POST as $key => $value)
    //        echo "Field " . htmlspecialchars($key) . " is " . htmlspecialchars($value) . "<br>";
    ?>

</div>


</body>

<script>


    $(document).ready(function () {


        $("#private-ord").click(function () {
            if (this.checked) {
                $('#translators-lbl').show();
                $('#translators-list').show();
            } else {
                $('#translators-lbl').hide();
                $('#translators-list').hide();
            }


        });

        $('#translators-lbl').hide();
        $('#translators-list').hide();

//        var tr_inputs = $('#translators-list').find('input').toArray();
//
//        tr_inputs.forEach(function ($v) {
//            $v.click(compose());
//
//        });

    });


    $('#datetimepicker').datetimepicker({
        format: 'Y-m-d H:i',
        lang: 'ru'
    });


    function compose_translators(el) {
        if (el.checked) {
            alert(el.value);
        } else {

        }
    }

</script>

</html>
