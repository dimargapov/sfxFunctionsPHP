<?php
//Работа с регистром символов:
$str = 'php';
echo strtoupper($str);
echo '<br>';

$str = 'PHP';
echo strtolower($str);
echo '<br>';

$str = 'london';
echo ucfirst($str);
echo '<br>';

$str = 'London';
echo lcfirst($str);
echo '<br>';

$str = 'london is the capital of great britain';
echo ucwords($str);
echo '<br>';

$str = 'LONDON';
echo ucfirst(strtolower($str));
echo '<br>';

//Кол-во символов:
$str = 'html css php';
echo strlen($str);
echo '<br>';

$password = '123456';
$length = strlen($password);
if ($length > 5 && $length < 10) {
    echo "good<br>";
} else {
    echo "bad<br>";
}

//Работа с подстроками:
$str = 'html css php';
$words = explode(' ', $str);
echo "Слово 1: $words[0]<br>";
echo "Слово 2: $words[1]<br>";
echo "Слово 3: $words[2]<br>";

$str = 'html css php';
echo substr($str, -3);
echo '<br>';

$str = 'http://google.com';
if (strpos($str, 'http://') === 0) {
    echo 'yes';
} else {
    echo 'no';
}
echo '<br>';

$str = 'photo.png';
if (substr($str, -4) == '.png') {
    echo 'yes';
} else {
    echo 'no';
} echo '<br>';

$str = 'photo.jpg';
if (substr($str, -4) == '.jpg' || substr($str, -4) == '.png') {
    echo 'yes';
} else {
    echo 'no';
} echo '<br>';

$str = '123456';
if (strlen($str) > 5) {
    $result = substr($str, 5) . '...';
    echo $result;
} else {
    echo $str;
} echo '<br>';

//Замена символов (str_replace):
$str = '31.12.2013';
echo str_replace('.', '-', $str).'<br>';

$str = 'abc';
$str = str_replace('a', '1', $str);
$str = str_replace('b', '2', $str);
$str = str_replace('c', '3', $str);
echo $str . '<br>';

$str = '1a2b3c4b5d6e7f8g9h0';
for ($i = 0; $i <= 9; $i++) {
    $str = str_replace((string)$i, '', $str);
}
echo $str.'<br>';

//Замена символов (strtr):
$str = 'abc';
$replace = ['a'=>'1', 'b'=>'2', 'c'=>'3'];
$str = strtr($str, $replace);
echo $str.'<br>';

$str = 'abcdefg';
$from = 'abc';
$to = '123';
$str = strtr($str, $from, $to);
echo $str.'<br>';

//Нахождение позиций подстроки:
$str = 'abc abc abc';
echo strpos($str, 'b').'<br>'; //first b
echo strrpos($str, 'b').'<br>'; //last b

$str = 'aaa aaa aaa aaa aaa';
$firstSpace = strpos($str, ' ');
$secondSpace = strpos($str, ' ', $firstSpace+1);
echo $secondSpace.'<br>';

$str = 'the end...';
$dots = strpos($str, '..');
if ($dots !== false) {
    echo 'yes<br>';
} else {
    echo 'no<br>';
}

$str = 'http://google.com';
if (strpos($str, 'http://') === 0) {
    echo 'yes';
} else {
    echo 'no';
}
echo '<br>';

//Объединение и разивание строк:
$str = 'html css php';
$words = explode(' ', $str);
var_dump($words); echo '<br>';

$date = '2013-12-31';
$dates = explode('-', $date);
echo $dates[2].'.'.$dates[1].'.'.$dates[0].'.'.'<br>';

//Преобразует строку в массив:
$str = '1234567890';
$arr1 = str_split($str, 2);
$arr2 = str_split($str);
print_r($arr1); echo '<br>';
print_r($arr2); echo '<br>';

//Очистка строк:
$str = ' space ';
$str = trim($str, ' ');
echo $str.'<br>';

$str = '/php/';
$str = trim($str, '/');
echo $str.'<br>';

$str = 'слова слова слова';
$str = rtrim($str, '.').'.';
echo $str.'<br>';

