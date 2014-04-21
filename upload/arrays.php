d>
    <title>Тестируем PHP</title>
</head>
<body>
<?php echo '<p>Привет, мир!</p>';



echo '<h3>Php Массивы</h3>';
echo'<br/>';

$arr_1 = array(
    "one" => 11,
    "two" => 22,
    "three" => 'тридцать три',
);

$arr_2 = [
    "one" => 'один',
    "two" => 'два',
    "three" => 3,
    4 => 'middle',
    45 => 78,
    66 => 'last',
];

$arr_3 = [
    'один',
    'два',
    2014,
    99 => 3,
    'last',
];

$arr_multy = [
    "один",
    "два",
    "arr" => array("inside_1" => 1,
        "inside_2" => 2,
        "inside_arr" => array("dbl_inside" => 1.1,
            "dbl_inside" => 2.2)
    ),
    "last" => 999
];




var_dump($arr_1);
echo '<br/>';
echo '<br/>';

var_dump($arr_2);
echo '<br/>';
echo '<br/>';

print_r($arr_3);
echo '<br/>';
echo '<br/>';

print_r($arr_multy);
echo '<br/>';
echo '<br/>';

var_dump($arr_multy["arr"]["inside_arr"]["dbl_inside"]);
echo '<br/>';
echo '<br/>';

//echo array_values($arr_1);
//echo '<br/>';
//echo $arr_3;
//echo '<br/>';





?>
</body>
</html>
