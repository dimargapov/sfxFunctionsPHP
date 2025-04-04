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
    
}
