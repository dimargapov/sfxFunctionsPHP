<?php

//Сделайте функцию, которая параметрами принимает 2 числа.
//Если эти числа равны - пусть функция вернет true, а если не равны - false.
function comparison($a, $b) {
    if ($a === $b) {
        $result = 'true';
    } else {
        $result = 'false';
    }
    return $result;
}
$function = comparison(1, 2);
echo $function.'<br>';

//Сделайте функцию, которая параметром принимает число и проверяет - отрицательное оно или нет.
//Если отрицательное - пусть функция вернет true, а если нет - false.
function negative($a) {
    if ($a < 0) {
        $result = 'true';
    } else {
        $result = 'false';
    }
    return $result;
}

$function = negative(-2);
echo $function.'<br>';

//Дан массив с числами. Проверьте, что в этом массиве есть число 5. Если есть - выведите 'да', а если нет - выведите 'нет'.
function checkOn5($arr) {
    for($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === 5) {
            $result = 'Da';
        } else {
            $result = 'Net';
        }
    }
    return $result;
}

$arr = [1, 4, 6, 5];
$function = checkOn5($arr);
echo $function.'<br>';

//Дано число, например 31. Проверьте, что это число не делится ни на одно другое число кроме себя самого и единицы.
//То есть в нашем случае нужно проверить, что число 31 не делится на все числа от 2 до 30.
//Если число не делится - пусть функция вернет false, а если делится - true.
function isPrime($number) {
    if ($number <= 1) {
        return true;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return true;
        }
    }
    return false;
}

$number = 31;
$result = isPrime($number);
echo "Число $number " . ($result ? "не является простым" : "является простым").'<br>';

//Дан массив с числами. Проверьте, есть ли в нем два одинаковых числа подряд.
//Если есть - вернете true, а если нет - вернете false.
function sameNumber($arr) {
    $result = 'false';
    for ($i = 0; $i < count($arr) - 1; $i++) {
        if ($arr[$i] === $arr[$i+1]) {
            $result = 'true';
            break;
        }
    }
    return $result;
}

$arr = [1, 2, 3, 4, 5, 6, 6];
$function = sameNumber($arr);
echo $function.'<br>';

?>