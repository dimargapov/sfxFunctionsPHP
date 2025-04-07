<?php
//Работа с count
$arr = ['2', '3', '5'];
echo $count = count($arr).'<br>';
$last_key = (int)$count - 1;
echo $last_value = $arr[$last_key].'<br>';

//Работа с in_array
$arr = [1, 2, 3];
if (in_array(3, $arr)) {
    echo 'There\'s 3 in array<br>';
} else {
    echo 'There\'s not 3 in array<br>';
}

//Работа с array_sum и array_product:
$arr = [1, 2, 3, 4, 5];
echo array_sum($arr).'<br>';
echo array_product($arr).'<br>';

$arr = [3, 5, 5];
$sum = array_sum($arr);
$count = count($arr);
$srednee = (float)$sum / (float)$count;
echo 'Среднее арифметическое = '.$srednee.'<br>';

//Работа с range:
$arr = range(1,100, 1);
var_dump($arr);
echo '<br>';

$arr = range('a','z', 1);
var_dump($arr);
echo '<br>';

$arr = range('1','9', 1);
$str = implode('-', $arr);
echo $str.'<br>';

$arr = range(1,100,1);
$sum = array_sum($arr);
echo $sum.'<br>';

$arr = range(1,10,1);
$product = array_product($arr);
echo $product.'<br>';

//Работа с array_merge:

