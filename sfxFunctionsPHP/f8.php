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
Правильно отвеченные вопросы должны гореть зеленым цветом, а неправильно - красным.
Все работает. Заккоментил, чтобы не мешало следующему скрипту-->
    <br>
    <style>
        .correct {
            color: green;
        }
        .incorrect {
            color: red;
        }
    </style>
<?php //$questionsAnswers = [
//        ['question' => 'Год окончания ВОВ', 'answer' => '1945'],
//        ['question' => 'Количество букв в слове "ёж"', 'answer'  => '27'],
//        ['question' => 'Майкл Джексон жив?','answer'  => 'Да']
//];
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    foreach ($questionsAnswers as $index => $item) {
//        $userAnswer = trim($_POST["answer_$index"]);
//        $correctAnswer = $item['answer'];
//        echo "<p>{$item['question']}</p>";
//        if (strcasecmp($userAnswer, $correctAnswer) === 0) {
//            echo "<p class='correct'>Ваш ответ: {$userAnswer} — верно!</p>";
//        } else {
//            echo "<p class='incorrect'>Ваш ответ: {$userAnswer} — неверно! Правильный ответ: {$correctAnswer}</p>";
//        }
//    }
//
//} else {
//    echo '<form action="f8.php" method="post">';
//    foreach ($questionsAnswers as $index => $item) {
//        echo "<p>{$item['question']}</p>";
//        echo "<input type='text' name='answer_$index' required><br>";
//    }
//    echo '<button type="submit">Проверить ответы</button>';
//    echo '</form>';
//}
//?>

<br><br>

<!--Модифицируем предыдущую задачу: пусть теперь тест показывает варианты ответов и радиокнопочки.
Пользователь должен выбрать один и вариантов.
Все работает, заккоментил чтобы не мешало следующему скрипту-->
<?php //$questionsAnswers = [
//    ['question' => 'Год окончания ВОВ', 'answer' => '1945'],
//    ['question' => 'Количество букв в слове "ёж"', 'answer'  => '27'],
//    ['question' => 'Майкл Джексон жив?','answer'  => 'Да']
//];
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $userAnswers = [$_POST["q1"], $_POST["q2"], $_POST["q3"]];
//    foreach ($questionsAnswers as $index => $item) {
//        $correctAnswer = $item['answer'];
//        $userAnswer = $userAnswers[$index];   {
//            if ($userAnswer === $correctAnswer) {
//                echo "<p class='correct'>Ваш ответ: {$userAnswer} — верно!</p>";
//            } else {
//                echo "<p class='incorrect'>Ваш ответ: {$userAnswer} — неверно! Правильный ответ: {$correctAnswer}</p>";
//            }
//        }
//    }
//}
//    else {
//        echo '<form action="f8.php" method="post">';
//        echo '<p>Год окончания ВОВ<br>';
//        echo "<input type='radio' name='q1' value='1812' />1812 <br>
//               <input type='radio' name='q1' value='1945' />1945 <br>
//               <input type='radio' name='q1' value='2025' />2025 <br>
//               <p>Количество букв в слове 'ёж'<br>
//        <input type='radio' name='q2' value='8' />8<br>
//        <input type='radio' name='q2' value='2' />2<br>
//        <input type='radio' name='q2' value='27' />27<br>
//    <p>Майкл Джексон жив?<br>
//        <input type='radio' name='q3' value='Да' />Да<br>
//        <input type='radio' name='q3' value='Нет' />Нет<br>
//        <input type='radio' name='q3' value='Цой жив' />Цой жив<br>
//";
//        echo '<button type="submit">Проверить ответы</button>';
//        echo '</form>';
//}
//?>

<!--Модифицируем предыдущую задачу:
пусть теперь на один вопрос может быть несколько правильных ответов.
Пользователь должен отметить один или несколько чекбоксов.-->
<?php
$questionsAnswers = [
    ['question' => 'Год окончания ВОВ', 'answer' => ['2025', '1812']],
    ['question' => 'Количество букв в слове "ёж"', 'answer'  => ['2', '8']],
    ['question' => 'Майкл Джексон жив?','answer'  => ['Нет', 'Цой жив']]
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userAnswers = [];
    foreach ($questionsAnswers as $index => $item) {
    $fieldName = "q" . ($index + 1);
    $userAnswer = $_POST[$fieldName] ?? null;

    if ($userAnswer) {
        $userAnswers[] = $userAnswer;
    } else {
        $userAnswers[] = [];
    }
        $correctAnswer = $item['answer'];
            $userAnswer = $userAnswers[$index];
            if (empty($userAnswer)) {
                echo "<p class='incorrect'>Вы не выбрали ответ.</p>";
            } else {
                $correct = true;
                foreach ($userAnswer as $answer) {
                    if (!in_array($answer, $correctAnswer)) {
                        $correct = false;
                        break;
                    }
                }
                if ($correct && count($userAnswer) === count($correctAnswer)) {
                    echo "<p class='correct'>Ваши ответы: ";
                    foreach ($userAnswer as $answer) {
                        echo "$answer ";
                    }
                    echo "— верно!</p>";
                } else {
                    echo "<p class='incorrect'>Ваши ответы: ";
                    foreach ($userAnswer as $answer) {
                        echo "$answer ";
                    }
                    echo "— неверно! Правильные ответы: ";
                    foreach ($correctAnswer as $answer) {
                        echo "$answer ";
                    }
                    echo "</p>";
                }
            }

        }


        }
    else {
        echo '<form action="f8.php" method="post">';
        echo '<h4>Тест (Выбирать только неправильные ответы)</h4>';
        echo '<p>Год окончания ВОВ<br>';
        echo "<input type='checkbox' name='q1[]' value='1812' />1812 <br>
               <input type='checkbox' name='q1[]' value='1945' />1945 <br>
               <input type='checkbox' name='q1[]' value='2025' />2025 <br>
               <p>Количество букв в слове 'ёж'<br>
        <input type='checkbox' name='q2[]' value='8' />8<br>
        <input type='checkbox' name='q2[]' value='2' />2<br>
        <input type='checkbox' name='q2[]' value='27' />27<br>
    <p>Майкл Джексон жив?<br>
        <input type='checkbox' name='q3[]' value='Да' />Да<br>
        <input type='checkbox' name='q3[]' value='Нет' />Нет<br>
        <input type='checkbox' name='q3[]' value='Цой жив' />Цой жив<br>
";
        echo '<button type="submit">Проверить ответы</button>';
        echo '</form>';
}
    ?>

<!--Напишите скрипт, который будет находить корни квадратного уравнения. -->
<!--Для этого сделайте 3 инпута, в которые будут вводиться коэффициенты уравнения.-->

<!--<form action="f8.php" method="post">-->
<!--    <h4>Найти корни квадртного уравнения</h4>-->
<!--    <input type="number" name="a" placeholder="a" />-->
<!--    <input type="number" name="b" placeholder="b" />-->
<!--    <input type="number" name="c" placeholder="c" />-->
<!--    <input type="submit" value="click" />-->
<!--</form>-->
<?php
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $a = $_POST['a'];
//    $b = $_POST['b'];
//    $c = $_POST['c'];
//    if ($a === 0) {
//        echo '"a" не может быть равна нулю';
//    } else {
//        $d = $b * $b - 4 * $a * $c;
//        if ($d < 0) {
//            echo 'Уравнение не имеет действительных корней, дискриминант = ' . $d;
//        } else if ($d === 0) {
//            $x = -($b / (2 * $a));
//            echo "x = $x";
//        } else {
//            $x1 = (-$b + sqrt($d)) / (2 * $a);
//            $x2 = (-$b - sqrt($d)) / (2 * $a);
//            echo "<br>d = $d, x1 = $x1, x2 = $x2";
//        }
//    }
//}
//?>

    <!--Даны 3 инпута. В них вводятся числа. -->
    <!--Проверьте, что эти числа являются тройкой Пифагора: -->
    <!--квадрат самого большого числа должен быть равен сумме квадратов двух остальных.-->
<!--<br><br>-->
<!--<form action="f8.php" method="post">-->
<!--    <h4>Проверить на тройку Пифагора</h4>-->
<!--    <input type="number" name="A" placeholder="a" />-->
<!--    <input type="number" name="B" placeholder="b" />-->
<!--    <input type="number" name="C" placeholder="c" />-->
<!--    <input type="submit" value="click" />-->
<!--</form>-->
<!---->
<?php
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $a = $_POST['A'];
//    $b = $_POST['B'];
//    $c = $_POST['C'];
//    $arrAnswers = [$a, $b, $c];
//    rsort($arrAnswers);
//    $arrAnswers[0] **= 2;
//    $sumOthers = ($arrAnswers[1] ** 2) + ($arrAnswers[2] ** 2);
//    if ($arrAnswers[0] === $sumOthers) {
//        echo 'Набор чисел является тройкой Пифагора';
//    } else {
//        echo 'Набор чисел не является тройкой Пифагора';
//    }
//}
//?>

<!--Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку выведите список делителей этого числа.-->
<!--<br><br>-->
<!--<form action="f8.php" method="post">-->
<!--    <h4>Делители числа</h4>-->
<!--    <input type="number" name="number" />-->
<!--    <input type="submit" value="click" />-->
<!--</form>-->
<!---->
<?php
//$number = $_POST["number"];
//for ($i = 1; $i <= $number; $i++) {
//    if ($number % $i === 0) {
//        echo "$i<br>";
//    }
//}
//?>
<!---->
<!---->
<!--<!--Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку разложите число на простые множители.-->-->
<!--<br><br>-->
<!--<form action="f8.php" method="post">-->
<!--    <h4>Разложение на простые множители</h4>-->
<!--    <input type="number" name="number" />-->
<!--    <input type="submit" value="click" />-->
<!--</form>-->
<?php
//$number = $_POST["number"];
//function factorize($number) {
//    $factors = [];
//    $divisor = 2;
//
//    while ($number > 1) {
//        while ($number % $divisor === 0) {
//            $factors[] = $divisor;
//            $number /= $divisor;
//        }
//        $divisor++;
//    }
//    return $factors;
//}
//$factors = factorize($number);
//echo print_r($factors, true);
//?>
<!---->
<!--<!--Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите наибольший общий делитель этих двух чисел.-->-->
<!--<br><br>-->
<!--<form action="f8.php" method="post">-->
<!--    <h4>Нахождение НОД</h4>-->
<!--    <input type="number" name="a1" />-->
<!--    <input type="number" name="b1" />-->
<!--    <input type="submit" value="НОД" />-->
<!--</form>-->
<?php
//$a1 = $_POST["a1"];
//$b1 = $_POST["b1"];
//$a1Factors = factorize($a1);
//$b1Factors = factorize($b1);
//$factorsArr = array_unique(array_intersect($a1Factors, $b1Factors));
//$nod = array_product($factorsArr);
//echo $nod.'<br>';
//?>
<!---->
<!--<!--Даны 2 инпута и кнопка. В инпуты вводятся числа.-->
<!--По нажатию на кнопку выведите наименьшее число, которое делится и на одно, и на второе из введенных чисел.-->-->
<!--<br><br>-->
<!--<form action="f8.php" method="post">-->
<!--    <h4>Нахождение НОК</h4>-->
<!--    <input type="number" name="a2" />-->
<!--    <input type="number" name="b2" />-->
<!--    <input type="submit" value="НОК" />-->
<!--</form>-->
<?php
//$num1 = $_POST["a2"];
//$num2 = $_POST["b2"];
//function lcm($a, $b) {
//    $max = max($a, $b);
//    while (true) {
//        if ($max % $a === 0 && $max % $b === 0) {
//            return $max;
//        }
//        $max++;
//    }
//}
//$lcm = lcm($num1, $num2);
//echo "НОК: $lcm";
//?>

<!--Даны 3 селекта и кнопка. Первый селект - это дни от 1 до 31, второй селект - это месяцы от января до декабря,
а третий - это годы от 1990 до 2025. С помощью этих селектов можно выбрать дату.
По нажатию на кнопку выведите на экран день недели, соответствующий этой дате, например, 'воскресенье'.-->
<br><br>
<h4>Узнай день недели!</h4>
<br>
<form action="f8.php" method="post">
    <select name="day">
        <?php
        for ($i = 1; $i <= 31; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>

    <select name="month">
        <option value="1">Январь</option>
        <option value="2">Февраль</option>
        <option value="3">Март</option>
        <option value="4">Апрель</option>
        <option value="5">Май</option>
        <option value="6">Июнь</option>
        <option value="7">Июль</option>
        <option value="8">Август</option>
        <option value="9">Сентябрь</option>
        <option value="10">Октябрь</option>
        <option value="11">Ноябрь</option>
        <option value="12">Декабрь</option>
    </select>

    <select name="year">
        <?php
        for ($i = 1990; $i <= 2025; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>
    <button type="submit">Выбрать дату</button>
</form>
<?php
$day = $_POST["day"];
$month = $_POST["month"];
$year = $_POST["year"];

$date = date_create($year . '-' . $month . '-' . $day);
$day = $date->format('d');
$month = $date->format('m');
$year = $date->format('Y');
$dayOfWeek = $daysOfWeek[$date->format('l')];
echo "$dayOfWeek<br>";
?>




