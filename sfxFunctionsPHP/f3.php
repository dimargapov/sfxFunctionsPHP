<?php
date_default_timezone_set('Europe/Moscow');
//Timestamp: time и mktime:
echo time().'<br>';

echo mktime(0, 0, 0, 3, 1, 2025).'<br>';

$year = date('Y');
echo mktime(0, 0, 0, 12, 31, $year).'<br>';

echo mktime(13, 12, 29, 3, 15, 2000).'<br>';

$now = time();
$year = date('Y', $now);
$month = date('m', $now);
$day = date('d', $now);
$start = mktime(7, 23, 48, $month, $day, $year);
$diff = $now - $start;
$hours = floor($diff / 3600);
echo $hours.'<br>';

//Функция date:
echo date('Y-m-d h:i:s', $now).'<br>';
echo date('Y-m-d', $now).'<br>';
echo date('d.m.Y', $now).'<br>';
echo date('d.m.y', $now).'<br>';
echo date('H:i:s', $now).'<br>';

$setDate = mktime(0, 0, 0, 2, 12, 2025);
echo date('d.m.Y', $setDate).'<br>';

$week = [
    0 => 'Воскресенье',
    1 => 'Понедельник',
    2 => 'Вторник',
    3 => 'Среда',
    4 => 'Четверг',
    5 => 'Пятница',
    6 => 'Суббота'
];

$setDate = mktime(0, 0, 0, 6, 6, 2006);
$birthday = mktime(0, 0, 0, 6, 2, 2004);
$dayNumber = date('w', $setDate);
$thisDayNumber = date('w');
$birthdayDay = date('w', $birthday);
echo $week[$thisDayNumber].'<br>';
echo $week[$dayNumber].'<br>';
echo $week[$birthdayDay].'<br>';

$month = [
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December'
];

$monthNumber = date('m');
echo $month[$monthNumber].'<br>';

echo 'Кол-во дней в текущем месяце - '.date('t').'<br>';

$year = 2018;
echo date('L', mktime(0,0,0, 7,7, $year)).'<br>';

$dateString = '31.12.2025';
$dateParts = explode('.', $dateString);
$timestamp = mktime(0,0, 0, $dateParts[1], $dateParts[0], $dateParts[2]);
$dayOfWeek = date('l', $timestamp);
echo $dateString.'<br>';
echo $timestamp.'<br>';
echo $dayOfWeek.'<br>';

$dateString = '2025-12-31';
$dateParts = explode('-', $dateString);
$timestamp = mktime(0,0,0, $dateParts[1], $dateParts[0], $dateParts[2]);
$dayOfWeek = date('l', $timestamp);
echo $dateString.'<br>';
echo $timestamp.'<br>';
echo $dayOfWeek.'<br>';

//Сравнение дат:
$date1 = '2025-12-31';
$date2 = '2025-11-31';
if ($date1 > $date2) {
    echo $date1.' - Больше<br>';
} else {
    echo $date2.' - Больше<br>';
}

//На strtotime:
$dateString = '2025-12-31';
$date = strtotime($dateString);
echo date('d-m-Y', $date).'<br>';

//Прибавление и отнимание дат (date_create, date_modify, date_format):
$date = '2025-12-31';
$dateObj = date_create($date);
date_modify($dateObj, '+2 day');
date_modify($dateObj, '+1 month');
date_modify($dateObj, '+3 day');
date_modify($dateObj, '+1 year');
echo date_format($dateObj, 'd-m-Y').'<br>';
$newDate = '05-02-2027';
$dateObj = date_create($newDate);
date_modify($dateObj, '-3 day');
echo date_format($dateObj, 'd-m-Y').'<br>';

//Доп задачи:
$now = date_create();
$nextNewYear = date_create(date('Y') + 1 . '-01-01');
$diff = date_diff($now, $nextNewYear);
echo 'До Нового Года осталось ' . $diff->days .' дней<br>';



echo "<form action='f3.php' method='post'>
      <p>Год: <input type='text' name='year'></p>
      <input type='submit' value='Узнать'>
      </form>
";
if (isset($_POST['year'])) {
    $year = $_POST['year'];
    $friday13 = [];
    for ($month = 1; $month <= 12; $month++) {
        $date = date_create($year . '-' . $month . '-13');
        if (date_format($date, 'w') == 5) {
            $friday13[] = date_format($date, 'Y-m-d');
        }
    }
    echo '<pre>';
    var_dump($friday13);
}
echo '<br>';

$now = date_create();
date_modify($now, '-100 days');
echo date_format($now, 'l').'<br>';





