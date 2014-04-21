<?php
include 'config.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['pass'])) {

    $query = mysql_query("select * from translators where id= '" . $_COOKIE['id'] . "' and pass='" . $_COOKIE['pass'] . "'");

    $result = mysql_fetch_array($query);


}

?>
<html>
<head>
    <title>Тестируем PHP</title>
    <meta charset="utf-8">

</head>
<body>

<?php
print '<p>' . $result['login'] . '</p>'
?>

</body>
</html>