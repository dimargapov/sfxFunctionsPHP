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

$arr1 = [1, 2, 3];
$arr2 = ['a', 'b', 'c'];
$newArr = array_merge($arr1, $arr2);
echo '<pre>';
var_dump($newArr);
echo '<br>';

//Работа с array_slice:
$arr = [1, 2, 3, 4, 5];
$result = array_slice($arr, 1, 3);
echo '<pre>';
var_dump($result);
echo '<br>';

//Работа с array_splice:
$arr = [1, 2, 3, 4, 5];
array_splice($arr, 1, 2);
echo '<pre>';
var_dump($arr);
echo '<br>';

$arr = [1, 2, 3, 4, 5];
$newArr = array_splice($arr, 1, 3);
echo '<pre>';
var_dump($newArr);
echo '<br>';

$arr = [1, 2, 3, 4, 5];
array_splice($arr, 3, 0, array('a', 'b', 'c'));
echo '<pre>';
var_dump($arr);
echo '<br>';

$arr = [1, 2, 3, 4, 5];
array_splice($arr, 1, 0, array('a', 'b'));
array_splice($arr, 6, 0, 'c');
array_splice($arr, 8, 0, 'e');
echo '<pre>';
var_dump($arr);
echo '<br>';

//Работа с array_keys, array_values, array_combine:
$arr = ['a'=>1, 'b'=>2, 'c'=>3];
$keys = array_keys($arr);
$values = array_values($arr);
echo '<pre>';
var_dump($keys);
var_dump($values);
echo '<br>';

$arrKeys = ['a', 'b', 'c'];
$arrValues = [1, 2, 3];
$arr = array_combine($arrKeys, $arrValues);
echo '<pre>';
var_dump($arr);
echo '<br>';

//Работа с array_flip, array_reverse:
$arr = ['a'=>1, 'b'=>2, 'c'=>3];
$flipArr = array_flip($arr);
echo '<pre>';
var_dump($flipArr);
echo '<br>';

$arr = [1, 2, 3, 4, 5];
$reverseArr = array_reverse($arr);
echo '<pre>';
var_dump($reverseArr);
echo '<br>';

//Работа с array_search:
$arr = ['a', '-', 'b', '-', 'c', '-', 'd'];
$pos = array_search('-', $arr);
echo $pos.'<br>';
array_splice($arr, $pos, 1);
echo '<pre>';
var_dump($arr);
echo '<br>';

//Работа с array_replace:
$arr = ['a', 'b', 'c', 'd', 'e'];
$replacements = [0 => '!', 3 => '!!'];
$newArr = array_replace($arr,$replacements);
echo '<pre>';
var_dump($newArr);
echo '<br>';

//Работа с сортировкой:
$arr = ['3'=>'a', '1'=>'c', '2'=>'e', '4'=>'b'];
asort($arr);
echo '<pre>';
var_dump($arr);
echo '<br>';

ksort($arr);
echo '<pre>';
var_dump($arr);
echo '<br>';

sort($arr);
echo '<pre>';
var_dump($arr);
echo '<br>';

//Работа с array_rand:
$arr = ['a'=>1, 'b'=>2, 'c'=>3];
$arrRand = array_rand($arr);
echo $arrRand.'<br>';

echo '<pre>';
var_dump($arr[$arrRand]);
echo '<br>';

//Работа с shuffle:
$arr = [1, 2, 3, 4, 5];
shuffle($arr);
foreach ($arr as $value) {
    echo $value.'<br>';
}

$numbers = range(1, 25);
shuffle($numbers);
foreach ($numbers as $number) {
    echo $number.' ';
}
echo '<br>';

$letters = range('a', 'z');
shuffle($letters);
foreach ($letters as $letter) {
    $letters[] = $letter;
}
echo '<pre>';
var_dump($letters);
echo '<br>';

$letters = range('a', 'z');
shuffle($letters);
$str = implode('', array_slice($letters, 0, 6));
echo $str.'<br>';

//Работа с array_unique:
$arr = ['a', 'b', 'c', 'b', 'a'];
$uniqueArr = array_unique($arr);
echo '<pre>';
var_dump($uniqueArr);
echo '<br>';

//Работа с array_shift, array_pop, array_unshift, array_push:
$arr = [1, 2, 3, 4, 5];
$first = array_shift($arr);
$last = array_pop($arr);
echo $first.','.$last.'<br>';
echo '<pre>';
var_dump($arr);
echo '<br>';

$arr = [1, 2, 3, 4, 5];
$beginning = array_unshift($arr, 0);
$end = array_push($arr, 6);
echo '<pre>';
var_dump($arr);
echo '<br>';

$arr = [1, 2, 3, 4, 5, 6, 7, 8];
foreach ($arr as $value) {
    $value = array_shift($arr);
    $value1 = array_pop($arr);
    echo $value,$value1;
}
echo '<br>';

//Работа с array_pad, array_fill, array_fill_keys, array_chunk:
$arr = ['a', 'b', 'c'];
$newArr = array_pad($arr,6,'-');
echo '<pre>';
var_dump($newArr);
echo '<br>';

$arr = array_fill(0, 10, 'x');
echo '<pre>';
var_dump($arr);
echo '<br>';

$arr = range('1', '20');
echo '<pre>';
var_dump(array_chunk($arr,4));
echo '<br>';

//Работа с array_count_values:
$arr = ['a', 'b', 'c', 'b', 'a'];
$count = array_count_values($arr);
echo '<pre>';
var_dump($count);
echo '<br>';

//Работа с array_map:
$arr = [1, 2, 3, 4, 5];
$sqrt = array_map('sqrt', $arr);
echo '<pre>';
var_dump($sqrt);
echo '<br>';

$arr = [' a ', ' b ', ' с '];
$withoutSpaces = array_map('trim', $arr);
echo '<pre>';
var_dump($withoutSpaces);
echo '<br>';

//Работа с array_intersect, array_diff:
$a = [1, 2, 3, 4, 5];
$b = [3, 4, 5, 6, 7];
$c = array_intersect($a, $b);
echo '<pre>';
var_dump($c);
echo '<br>';

$a = [1, 2, 3, 4, 5];
$b = [3, 4, 5, 6, 7];
$c = array_diff($a, $b);
echo '<pre>';
var_dump($c);
echo '<br>';

//Доп задачи:
$str = '1234567890';
$split = str_split($str);
$ints = array_map('intval', $split);
$sum = array_sum($ints);
echo '<pre>';
var_dump($sum);
echo '<br>';

$letters = range('a', 'z');
$numbers = range(1, 26);
$arr = array_combine($letters, $numbers);
echo '<pre>';
var_dump($arr);
echo '<br>';

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
echo '<pre>';
var_dump(array_chunk($arr,3));
echo '<br>';

$arr = [1, 2, 4, 5, 5];
$uniqueArr = array_unique($arr);
rsort($uniqueArr);
var_dump($uniqueArr[1]);