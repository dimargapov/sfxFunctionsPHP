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
<br>
<form action="f8.php" method="post">
    <input type="text" name="birthDate" />
    <input type="submit" value="click" />
</form>
<?php
if (isset($_POST['birthDate'])) {
    $birthDate = $_POST['birthDate'];
    $birthDateObject = date_create($birthDate);
    if (!$birthDateObject) {
        echo 'Некорректный формат даты';
        exit;
    }
    $birthDateObject = DateTime::createFromFormat('d.m.Y', $birthDate);
    $now = date_create('now');
    $nextBirthday = clone $birthDateObject;
    $nextBirthday->setDate($now->format('Y'), $birthDateObject->format('m'), $birthDateObject->format('d'));
    if ($now > $nextBirthday) {
        $nextBirthday = date_modify($nextBirthday, '+1 year');
    }
    $interval = date_diff($now, $nextBirthday);
    echo "До вашего дня рождения осталось $interval->days дней<br>";
}

?>

<!--По заходу на страницу выведите сколько дней осталось до ближайшей масленницы (последнее воскресенье зимы).-->
<?php function getLastSunday($year) {
    $lastDay = date_create($year . '-02-28');
    if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
        $lastDay = date_create($year . '-02-29');
    }
    while (date_format($lastDay, 'w') != 0) {
        $lastDay = date_modify($lastDay, '-1 day');
    }
    return $lastDay;
}
$now = date_create('now');
if ($now->format('m') > 2) {
    $maslenitsa = getLastSunday($now->format('Y') + 1);
} else {
    $maslenitsa = getLastSunday($now->format('Y'));
}
$maslenitsaDiff = $now->diff($maslenitsa);
echo "До масленницы осталось $maslenitsaDiff->days дней<br>";
?>


<!--Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '31.12'. По нажатию на кнопку выведите знак зодиака пользователя.-->
<!--<br>-->
<!--<form action="f8.php" method="post">-->
<!--    <p>Узнай знак зодиака</p>-->
<!--    <input type="text" name="birth_date" />-->
<!--    <input type="submit" value="click" />-->
<!--</form>-->
<?php //if (isset($_POST['birth_date'])) {
//    $birthDate = $_POST['birth_date'];
//    list($day, $month) = explode('.', $birthDate);
//
//    $zodiacSigns = [
//        'Aquarius' => ['01.20', '02.18'], // Водолей
//        'Pisces' => ['02.19', '03.20'], // Рыбы
//        'Aries' => ['03.21', '04.19'], // Овен
//        'Taurus' => ['04.20', '05.20'], // Телец
//        'Gemini' => ['05.21', '06.20'], // Близнецы
//        'Cancer' => ['06.21', '07.22'], // Рак
//        'Leo' => ['07.23', '08.22'], // Лев
//        'Virgo' => ['08.23', '09.22'], // Дева
//        'Libra' => ['09.23', '10.22'], // Весы
//        'Scorpio' => ['10.23', '11.21'], // Скорпион
//        'Sagittarius' => ['11.22', '12.21'], // Стрелец
//        'Capricorn' => ['12.22', '01.19'], // Козерог
//    ];
//
//    foreach ($zodiacSigns as $sign => $dates) {
//        $startDay = substr($dates[0], 0, 2);
//        $startMonth = substr($dates[0], 3);
//        $endDay = substr($dates[1], 0, 2);
//        $endMonth = substr($dates[1], 3);
//
//        if (($month == $startMonth && $day >= $startDay) ||
//            ($month == $endMonth && $day <= $endDay) ||
//            ($startMonth < $endMonth && $month >= $startMonth && $month <= $endMonth && $sign != 'Capricorn')) {
//            echo "Ваш знак зодиака: " . [
//                    'Aquarius' => 'Водолей',
//                    'Pisces' => 'Рыбы',
//                    'Aries' => 'Овен',
//                    'Taurus' => 'Телец',
//                    'Gemini' => 'Близнецы',
//                    'Cancer' => 'Рак',
//                    'Leo' => 'Лев',
//                    'Virgo' => 'Дева',
//                    'Libra' => 'Весы',
//                    'Scorpio' => 'Скорпион',
//                    'Sagittarius' => 'Стрелец',
//                    'Capricorn' => 'Козерог',
//                ][$sign];
//            exit;
//        } elseif ($sign == 'Capricorn' && ($month == '12' && $day >= $startDay || $month == '01' && $day <= $endDay)) {
//            echo "Ваш знак зодиака: Козерог";
//            exit;
//        }
//    }
//
//    echo "Не удалось определить знак зодиака.";
//}
    ?>

<!--    Дан массив праздников. По заходу на страницу, если сегодня праздник, то поздравьте пользователя с этим праздником.-->
<?php
$celebrates = [
        'День космонавтики' => '12.04',
        'Праздник 11 апреля' => '11.04',
        'День рождения' => '02.06'
];
$now = date_create('now');
$nowstr = $now->format('d.m');
list($day, $month) = explode('.', $nowstr);
foreach ($celebrates as $celebrate => $date) {
    $celebDay = substr($date, 0, 2);
    $celebMonth = substr($date, 3, 2);
    if ($celebMonth === $month && $celebDay === $day) {
        echo "Поздравляем. Сегодня $celebrate<br>";
    }
}
?>

<!--Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку выведите количество слов в тексте,
количество символов в тексте, количество символов за вычетом пробелов.-->
<form action="f8.php" method="post">
    <br>
    <textarea name="textarea"></textarea>
    <input type="submit" value="click">
</form>
<?php if (isset($_POST['textarea'])) {
    $text = strip_tags($_POST['textarea']);
    function countWords($text) {
        $text = trim($text);
        $text = str_replace(["\t", "\n"], ' ', $text);
        $text = implode(' ', explode(' ', $text));
        $words = explode(' ', $text);
        $words = array_filter($words);
        return count($words);
    }
    $countChars = iconv_strlen($text);
    $textWithoutSpaces = str_replace(' ', '', $text);
    $countCharsWithoutSpaces = iconv_strlen($textWithoutSpaces);
    echo "Количество слов: " . countWords($text).'<br>';
    echo "Количество символов: $countChars<br>";
    echo "Количество символов за вычетом пробелов: $countCharsWithoutSpaces<br>";
} ?>

<!--Дан текстареа и кнопка. В текстареа вводится текст.
По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте.-->
<form action="f8.php" method="post">
    <br>
    <textarea name="textarea"></textarea>
    <input type="submit" value="click">
</form>
<?php if (isset($_POST['textarea'])) {
    $text = strip_tags($_POST['textarea']);
    $countChars = iconv_strlen($text);
    $char_count = [];
    for ($i = 0; $i < $countChars; $i++) {
//        $char = mb_substr($text, $i, 1, 'utf-8'); //разрешил mbstring в php.ini, однако все равно кидает ошибку ((
        if (isset($charCount[$char])) {
            $charCount[$char]++;
        } else {
            $charCount[$char] = 1;
        }
        foreach ($charCount as $char => $val) {
            $percent = round(($val / $countChars) * 100, 2);
            echo "\"$char\" занимает $percent процентов <br>";
        }
    }
}
?>
<!--Дан массив слов, инпут и кнопка. В инпут вводится набор букв.
По нажатию на кнопку выведите на экран те слова, которые содержат в себе все введенные буквы.-->
<br>
<form action="f8.php" method="post">
    <input type="text" name="letters" />
    <input type="submit" value="click" />
</form>
<?php
$words = ["apple", "banana", "grape", "orange", "peach"];
if (isset($_POST['letters'])) {
    $input = strip_tags($_POST['letters']);
    $letters = str_split(strtolower($input));
    $filteredWords = array_filter($words, function($word) use ($letters) {
        foreach ($letters as $letter) {
            $input = strip_tags($_POST['letters']);
            if (substr_count($word, $letter) < substr_count($input, $letter)) {
                return false;
            }
        }
        return true;
    });
    echo "Слова, содержащие все введенные буквы: " . implode(", ", $filteredWords);
}
?>

<!--Дан текстареа и кнопка. В текстареа через пробел вводятся слова.
По нажатию на кнопку выведите слова в таком виде:
сначала заголовок 'слова на букву а' и под ним все слова, которые начинаются на 'а',
потом заголовок 'слова на букву б' и все слова на 'б' и так далее.
Буквы должны идти в алфавитном порядке. Брать следует только те буквы, на которые начинаются наши слова.
То есть: если нет слов, к примеру, на букву 'в' - такого заголовка тоже не будет.-->
<form action="f8.php" method="post">
    <br>
    <textarea name="wordsByLetters"></textarea>
    <input type="submit" value="click">
</form>
<?php if (isset($_POST['wordsByLetters'])) {
    $input = strip_tags($_POST['wordsByLetters']);
    $words = explode(' ', $input);
    $groupedWords = [];
    foreach ($words as $word) {
        $firstLetter = strtolower($word[0]);
        if (!isset($groupedWords[$firstLetter])) {
            $groupedWords[$firstLetter] = [];
        }
        $groupedWords[$firstLetter][] = $word;
    }
        ksort($groupedWords);
        foreach ($groupedWords as $letter => $wordList) {
            echo "Слова на букву $letter<br>";
            echo implode(', ', $wordList).'<br>';
        }

}
?>
<!--Дан инпут и кнопка. В этот инпут вводится строка на русском языке. По нажатию на кнопку выведите на экран транслит этой строки.-->
<!--Дан инпут, 2 радиокнопочки и кнопка. В инпут вводится строка,
а с помощью радиокнопочек выбирается - нужно преобразовать эту строку в транслит или из транслита обратно.-->
<br>
<form action="f8.php" method="post">
    <p>Транслит строки</p>
    <input type="text" name="translit" />
    <br>
    <input type="radio" id="to_translit" name="type" value="to_translit" checked>
    <label for="to_translit">Преобразовать в транслит</label>
    <br>
    <input type="radio" id="from_translit" name="type" value="from_translit">
    <label for="from_translit">Преобразовать из транслита</label>
    <br>
    <input type="submit" value="click" />
</form>
<?php if (isset($_POST['translit'])) {
    $input = strip_tags($_POST['translit']);
    $type = $_POST['type'];
    $russian = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н',
        'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю',
        'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п',
        'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
    $translits = ['A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Yi', 'K', 'L', 'M', 'N',
        'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu',
        'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'yi', 'k', 'l','m', 'n', 'o', 'p', 'r','s',
        't', 'u', 'f', 'h', 'c', 'ch','sh','sch', '-', 'y', '-', 'e', 'yu', 'ya'];
    if ($type === 'to_translit') {
        $newWord = str_replace($russian, $translits, $input);
        echo $newWord.'<br>';
    } else {
        $newWord = str_replace($translits, $russian, $input);
        echo $newWord.'<br>';
    }

}
?>

<!--Дан массив с вопросами и правильными ответами.
Реализуйте тест: выведите на экран все вопросы, под каждым инпут.
Пользователь читает вопрос, пишет свой ответ в инпут.
Когда вопросы заканчиваются - он жмет на кнопку, страница обновляется и вместо инпутов под вопросами появляется сообщение вида:
'ваш ответ: ... верно!' или 'ваш ответ: ... неверно! Правильный ответ: ...'.
Правильно отвеченные вопросы должны гореть зеленым цветом, а неправильно - красным.-->
    <br>
    <form action="f8.php" method="post">
        <p>Год окончания ВОВ</p>
        <input type="text" name="answer1" />
        <p>Количество букв в слове "ёж"</p>
        <input type="text" name="answer2" />
        <p>Майкл Джексон жив?</p>
        <input type="text" name="answer3" />
        <input type="submit" value="click" />
    </form>
<?php $questionsAnswers = [
        'Год окончания ВОВ' => '1945',
        'Количество букв в слове "ёж"' => '27',
        'Майкл Джексон жив?' => 'Да'
];
if (isset($_POST['question1']) && isset($_POST['question2']) && isset($_POST['question3'])) {
    $answer1 = strip_tags($_POST['question1']);
    $answer2 = strip_tags($_POST['question2']);
    $answer3 = strip_tags($_POST['question3']);
    $answers = [$answer1, $answer2, $answer3];
    foreach ($questionsAnswers as $question => $answer) {
        
}
