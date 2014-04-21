<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

require 'login.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Все заказы</title>
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


<?php
include '../config.php';


include 'templ/admin_menu.php';
?>




<div class="container">
    <br>

    <a href="main.php"><?= $on_main ?></a>


    <p class="lead">
        Все документы на перевод
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Номер заказа</th>
            <th>Название документа</th>
            <th>Дата постановки</th>
            <th>Время до завершения</th>
            <th>Дата завершения</th>
            <th>Тип</th>
            <th>Переводчик</th>
            <th>Комментарий</th>
            <th>Комментарий переводчика</th>
            <th>Файл</th>
            <th>Файл перевода</th>
            <th>Статус</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php


        $res2 = mysql_query("SELECT
  ord.id,
  ord.file_name,
  ord.file_path,
  ord.start_date,
  ord.stop_date,
  ord.translated_date,
  ord.type,
  ord.comment,
  ord.translator_comment,
  ord.translated_file,
  tr.login,
  ord.status
FROM orders ord
  LEFT JOIN order_bags
    ON ord.id = order_bags.order_id
  LEFT JOIN translators tr
    ON tr.id = order_bags.translater_id");

        $date_now = date('Y-m-d H:i:s');



        while ($row = mysql_fetch_array($res2)) {
            $order_is_overdue = $row['stop_date'] < $date_now && 2 != $row["status"];

            if ($order_is_overdue) {
                echo '<tr class="danger">';

            } else {
                echo '<tr>';
            }

            echo '<td>' . $row["id"] . '</td>';
            echo '<td class="small-td">' . $row["file_name"] . '</td>';
            echo '<td>' . $row["start_date"] . '</td>';
            echo '<td>' . $row["stop_date"] . '</td>';
            echo '<td>' . $row["translated_date"] . '</td>';
            echo '<td>' . $order_type[$row["type"]] . '</td>';
            echo '<td>' . $row['login'] . '</td>';
            echo '<td>' . $row["comment"] . '</td>';
            echo '<td>' . $row["translator_comment"] . '</td>';

            if ($row['file_path'] != '') {
                echo '<td> <a href=' . $row['file_path'] .
                    ' download="" title="Скачать документ">
                    <span class="glyphicon glyphicon-download"></span></a></td>';

            } else {
                echo '<td></td>';
            }


            if (isset($row['translated_file'])) {
                echo '<td> <a href=' . $row['translated_file'] .
                    ' download="" title="Скачать документ">
                    <span class="glyphicon glyphicon-list-alt"></span></a></td>';
            } else {
                echo '<td></td>';
            }


            if ($order_is_overdue) {
                echo '<td>' . $order_status[4] . '</td>';
            } else {
                echo '<td>' . $order_status[$row["status"]] . '</td>';
            }

            echo '<td><a href="edit-order.php?order_id=' . $row['id'] . '
            " <span class="glyphicon glyphicon-pencil small" </td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>


</div>

<script type="text/javascript">
    setTimeout(function () {
        location.reload();
    }, 15000);
</script>

</body>
</html>
