<?php
//1
function arrayFill($value, $count) {
    return array_fill(0, $count, $value);
}
$arr = arrayFill('x', 5);
echo '<pre>';
var_dump($arr);
echo '<br>';

//2
function sumTwoDimens($arr) {
    $sum = 0;
    foreach ($arr as $part) {
        foreach ($part as $value) {
            $sum += $value;
        }
    }
    return $sum;
}

$array = [[1,3], [3,4]];
echo sumTwoDimens($array).'<br>';

//3
function sumThreeDimens($arr) {
    $sum = 0;
    foreach ($arr as $part) {
        foreach ($part as $partHalf) {
            foreach ($partHalf as $value) {
                $sum += $value;
            }
        }
    }
    return $sum;
}

$array = [[[1, 2], [3, 4]], [[5, 6], [7, 8]]];
echo sumThreeDimens($array).'<br>';

//4
//function createTwoDimens($arrs, $elem) {
//    $elemPerLevel = $elem / $arrs;
//    if ($arrs <= 1) {
//        return array_fill(0, $elemPerLevel, 'x');
//    } else {
//        $result = [];
//        for ($i = 0; $i < $elemPerLevel; $i++) {
//            $result[] = createTwoDimens($arrs - 1, $elem);
//        }
//        return $result;
//    }
//}
//
//$arr = createTwoDimens(3, 9);
//echo '<pre>';
//var_dump($arr);
//echo '<br>';