<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include '../config.php';
require 'login.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Все отправлеые заказы</title>
    <link href='/css/bootstrap.css' rel="stylesheet">
    <script src="../js/jquery.js"></script>

    <meta charset="utf-8">


    <style>
        .table td {
            font-size: 10pt;
        }

        .table th {
            font-size: 8pt;
        }

        .small-td {
            max-width: 170px;
        }
    </style>

</head>


<body>


<div class="container">

    <?
    include  'templ/menu.php';
    ?>


    <br>

    <p class="lead">
        Все документы на перевод
    </p>

    <div class="row">

        <?
        foreach ($order_type as $ord) {

            print "<a href= '?type=" . array_search($ord, $order_type) . "' >  " . $ord . " |  </a >";

        }
        ?>

        <a href="?type=">Все типы</a>


        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номепр заказа</th>
                <th>Название документа</th>
                <!--            <th>Дата постановки</th>-->
                <th>Время до завершения</th>
                <th>Коментарий</th>
                <th>Тип</th>
                <!--            <th>Статус</th>-->
                <th>Скачать</th>
                <th>Взять заказ</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $res2;

            if ($_GET['type'] != NULL) {

                $res2 = mysql_query("SELECT * FROM orders ord WHERE ord.id NOT IN (SELECT
        ob.order_id
        FROM order_bags ob) and ord.type=" . $_GET['type'] . "");

            } else {
                $res2 = mysql_query("SELECT * FROM orders ord WHERE ord.id NOT IN (SELECT
        ob.order_id
        FROM order_bags ob)");

            }


            $idx = 1;

            while ($row = mysql_fetch_array($res2)) {

                $i_can_view_this = false;

                if (isset($row['can_view']) and $row['can_view'] != '') {
                    $can_view_id_arrays = explode(",", $row['can_view']);


                    foreach ($can_view_id_arrays as $id) {
                        if (trim($id) == $_SESSION['user_id']) {
                            $i_can_view_this = true;
                            break;
                        }
                    }

                } else {
                    $i_can_view_this = true;
                }

                if ($i_can_view_this == false) {
                    continue;
                }


                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td class="small-td">' . $row["file_name"] . '</td>';
//            echo '<td>' . $row["start_date"] . '</td>';
                echo '<td>' . $row["stop_date"] . '</td>';
                echo '<td>' . $row["comment"] . '</td>';
                echo '<td>' . $order_type[$row["type"]] . '</td>';
//            echo '<td>' . $order_status[$row["status"]] . '</td>';
                echo '<td> <a href=' . $row['file_path'] . ' download="" title="Скачать документ"><span class="glyphicon glyphicon-download"></span>
</a></td>';
                echo '<td>  <a href="take-order.php?order_id=' . $row["id"] . '" title="Взять заказ">
<span class="glyphicon glyphicon-open"></span></a> </td>';
                echo '</tr>';
            }

            ?>
            </tbody>
        </table>
        <br>
        <br>
        <a href="main.php"><?= $on_main ?></a>

    </div>

    <script type="text/javascript">
        setTimeout(function () {
            location.reload();
        }, 7000);
    </script>
</body>
</html>
