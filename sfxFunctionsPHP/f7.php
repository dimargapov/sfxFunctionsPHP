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
function createMultiDimens($inner, $total) {
    $result = [];
    $currentArr = [];
    $currentNum = 1;
    for ($i = 0; $i < $total; $i++) {
        $currentArr[] = $currentNum;
        $currentNum++;
        if (count($currentArr) === $inner) {
            $result[] = $currentArr;
            $currentArr = [];
        }
    }
    if (!empty($currentArr)) {
        $result[] = $currentArr;
    }
    return $result;
}

$arr = createMultiDimens(3, 9);
echo '<pre>';
var_dump($arr);
echo '<br>';

//5
function isNumberInRange ($number) {
    if ($number > 0 && $number < 10) {
        return true;
    }
    return false;
}

//6
$arr = [1, 7, 4, 2, 13, 25, 5];
for ($i = 0; $i < count($arr); $i++) {
    if (isNumberInRange($arr[$i]) === true) {
        $newArr[] = $arr[$i];
    }
}
echo '<pre>';
var_dump($newArr);
echo '<br>';

//7
function getDigitsSum($digit) {
    $sum = 0;
    $str = (string) $digit;
    for ($i = 0; $i < strlen($str); $i++) {
        $sum += $str[$i];
    }
    return $sum;
}

echo getDigitsSum(2213).'<br><br>';

//8
for ($year = 1; $year <= 2021; $year++) {
    if (getDigitsSum($year) === 13) {
        echo $year.'<br>';
    }
}

//9
function getDivisors($number) {
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i === 0) {
            $arr[] = $i;
        }
    }
    return $arr;
}
echo '<pre>';
var_dump(getDivisors(15));
echo '<br>';

//10
function getCommonDivisors($a, $b) {
    $aDivisors = getDivisors($a);
    $bDivisors = getDivisors($b);
    $result[] = array_intersect($aDivisors, $bDivisors);
    return $result;
}

echo '<pre>';
var_dump(getCommonDivisors(12, 24));
echo '<br>';

//11
function getProperDivisors($number) {
    $arr = [];
    for ($i = 1; $i < $number; $i++) {
        if ($number % $i === 0) {
            $arr[] = $i;
        }
    }
    return $arr;
}

function sumArray($arr) {
    return array_sum($arr);
}

$friendlyPairs = [];
for ($a = 1; $a <= 10000; $a++) {
    $sumA = sumArray(getProperDivisors($a));

    if ($sumA > $a && $sumA <= 10000) {
        $sumB = sumArray(getProperDivisors($sumA));
        if ($sumB === $a) {
            $friendlyPairs[] = [$a, $sumA];
        }
    }
}

foreach ($friendlyPairs as $pair) {
    echo "($pair[0], $pair[1])<br>";
}
echo '<br>';
//12
function cut($str, $count = 10) {
    $newStr = substr($str, 0, $count);
    return $newStr;
}
echo cut('abcdefghijklmn').'<br>';

//13
function recursiveArray($arr, $index = 0) {
    if ($index >= count($arr)) {
        return;
    }
    echo $arr[$index].'<br>';
    recursiveArray($arr, $index + 1);
}
$arr = [1,2,3,4,5];
recursiveArray($arr);

//14
function recursiveSum($a) {
    $sum = 0;
    $str = (string) $a;
    for ($i = 0; $i < strlen($str); $i++) {
        $sum += $str[$i];
    }
    if ($sum > 9) {
        echo $sum.' => ';
        return recursiveSum($sum);
    } else {
        return $sum;
    }
}

$a = 798;
echo recursiveSum($a);