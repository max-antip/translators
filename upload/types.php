<html>
<head>
    <title>Тестируем PHP</title>
</head>
<body>
<?php echo '<p>Привет, мир!</p>';



echo 'Типы переменных ';
echo'<br/>';



$bool_var = true;
$string_var = 'i am a string';
$int_var = 33;
$float_var = 55.7;

echo '$bool_type = true; <br>
$string_type = \'i am a string\'; <br>
$int_type = 33;<br>
$float_type = 55.7; <br>';


echo '<br><br>';

echo '$bool_type is ', gettype($bool_var);
echo'<br/>';
echo '$string_type is', gettype($string_var);
echo'<br/>';
echo '$int_type is ', gettype($int_var);
echo'<br/>';
echo '$float_type is ', gettype($float_var);
echo'<br/>';


var_dump($int_var/25);

//if (is_int($int_var)) {
//    $int_var += 10;
//    echo $int_var;
//    echo '<br/>';
//}

?>
</body>
</html>
