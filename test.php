<?php


//equals date

$now = date('Y-m-d H:i:s');
echo 'Now ' . $now . ' <br>';

$diff_date = '2014-04-20 22:22:22';

echo 'Randome date ' . $diff_date . ' <br>';

if ($now > $diff_date) {
    echo $now . ' more than ' . $diff_date;
} else {
    echo $now . ' less than ' . $diff_date;
}


// split words
//$pizza = "piece1";
//$pieces = explode(",", $pizza);
//
///*if (count($pieces) == 1) {
//    $pieces[0] = $pizza;
//}
//*/
//echo $pieces[0];
