<?php
//1
$arr = [4, 3, 6, 4, 7];
$sum = array_sum($arr);
$count = count($arr);
$sredn = $sum / $count;
echo 'Среднее арифметическое - '.$sredn.'<br>';

//2
$arr = range(1, 100);
$sum = array_sum($arr);
echo 'Сумма чисел от 1 до 100 - '.$sum.'<br>';

//3
$arr = array_fill(0, 10, 'x');
echo '<pre>';
var_dump($arr);
echo '<br>';

//4
$numbers = range(1, 10);
shuffle($numbers);
echo '<pre>';
var_dump($numbers);
echo '<br>';

//5
$num = 5;
$arr = range(1, $num);
$factorial = array_product($arr);
echo 'Факториал числа '.$num.' равен '.$factorial;
echo '<br>';

//6
$str = 'abcde';
$last = strtoupper(substr($str, -1));
$rest = substr($str, 0, -1);
echo $rest.$last.'<br>';

//7
$arr = [4, 9, 16];
$sqrt = array_map('sqrt', $arr);
echo '<pre>';
var_dump($sqrt);
echo '<br>';

//8
$arrLetters = range('a', 'z');
$arrNumbers = range(1, 26);
$arr = array_combine($arrLetters, $arrNumbers);
echo '<pre>';
var_dump($arr);
echo '<br>';

//9
$str = '1234567890';
$arr = str_split($str, 2);
$sum = array_sum($arr);
echo $sum.'<br>';