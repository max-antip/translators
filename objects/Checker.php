<?php
include "../config.php";

class Checker
{
//todo  оптимизировать нехер постоянно в базу лезть
    public static function check_autorization()
    {

        if (isset($_COOKIE['id']) && isset($_COOKIE['pass'])) {

//            echo  $_COOKIE['id'] . "\n";
//            echo  $_COOKIE['pass'] . "\n";
//            echo  $_COOKIE['login'] . "\n";

            $query = mysql_query("select * from translators where id= " . $_COOKIE['id'] . " and pass='" . $_COOKIE['pass'] . "'");

            $result = mysql_fetch_array($query);


            if (count($result) == 0) {
                return false;
            } else {
                return true;
            }

        }

    }

}