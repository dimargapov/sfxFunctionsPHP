<?php date_default_timezone_set('Europe/Moscow'); ?>
<!--Дан инпут и кнопка. В этот инпут вводится год. По нажатию на кнопку выведите на экран, -->
<!--сколько дней осталось до 1 января введенного года.-->
<!--Дан инпут и кнопка. В этот инпут вводится год. По нажатию на кнопку выведите на экран, високосный он или нет.-->
<form action="f8.php" method="post">
<input type="number" name="year" placeholder="Год" />
    <input type="submit" value="отправить" />
</form>

<?php
if (isset($_POST['year'])) {
    $year = $_POST['year'];
    $now = date_create('now');
    $januaryFirst = date_create($year . '-01-01');

    if ($now > $januaryFirst) {
        $januaryFirst = date_modify($januaryFirst, '+1 year');
    }
    $diff = $januaryFirst->diff($now);
    $daysLeft = $diff->days;
    echo "До 1 января $year осталось $daysLeft дней <br>";
    if (($year % 400 === 0 && $year % 100 === 0) || ($year % 4 === 0)) {
        echo 'Год високосный<br>';
    } else
        echo 'Год не високосный<br>';
}

?>

<!--Дан инпут и кнопка. В этот инпут вводится дата в формате '01.12.1990'. По нажатию на кнопку выведите на экран день недели, -->
<!--соответствующий этой дате, например, 'воскресенье'.-->
<br>
<form action="f8.php" method="post">
    <input type="text" name="date" />
    <input type="submit" value="click" />
</form>

<?php
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    echo date('l', strtotime($date));
}

?>

<!--По заходу на страницу выведите текущую дату в формате '12 мая 2015 года, воскресенье'.-->
<br><br>
<?php
$now = date_create('now');
$months = [
    'January' => 'января',
    'February' => 'февраля',
    'March' => 'марта',
    'April' => 'апреля',
    'May' => 'мая',
    'June' => 'июня',
    'July' => 'июля',
    'August' => 'августа',
    'September' => 'сентября',
    'October' => 'октября',
    'November' => 'ноября',
    'December' => 'декабря',
];
$daysOfWeek = [
    'Monday' => 'понедельник',
    'Tuesday' => 'вторник',
    'Wednesday' => 'среда',
    'Thursday' => 'четверг',
    'Friday' => 'пятница',
    'Saturday' => 'суббота',
    'Sunday' => 'воскресенье',
];

$day = $now->format('d');
$month = $months[$now->format('F')];
$year = $now->format('Y');
$dayOfWeek = $daysOfWeek[$now->format('l')];
echo "$day $month $year года, $dayOfWeek<br>";
?>

<!--Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'.
По нажатию на кнопку выведите на экран сколько дней осталось до дня рождения пользователя.-->
<!--<br>-->
<!--<form action="f8.php" method="post">-->
<!--    <input type="text" name="date1" />-->
<!--    <input type="submit" value="click" />-->
<!--</form>-->
<?php
//if (isset($_POST['date1'])) {
//    $now = date_create('now');
//    $date1 = date_create($_POST['date1']);
//
//    $diff = date_diff($date1, $now);
//    $daysToBirthday = $diff->days;
//    echo "$daysToBirthday";
//}

    