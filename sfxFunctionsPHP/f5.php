<?php
//Получение параметров get запроса
//Добавьте к вашему url в адресной строку следующий текст с параметрами: ?blockId=9&task="Базы данных"
//Выведите на экран каждый из параматеров с помощью суперглобального массива $_GET
echo '//1<br>';
if (isset($_GET['blockId']) && isset($_GET['task'])) {
    $blockId = htmlspecialchars($_GET['blockId']);
    $task = htmlspecialchars($_GET['task']);
    echo $blockId.'<br>';
    echo $task.'<br>';
} else {
    echo 'Параметры не найдены (добавьте к URL ?blockId=9&task="Базы данных")<br><br>';
}


//Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Выведите на экран фразу 'Привет, %Имя%'.
//Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea).
// Выведите эти данные на экран в формате, приведенном под данной задачей.
// Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.
//    Привет, Дмитрий, 25 лет.
//    Твое сообщение: .
//Также убирает форму при введенных данных
echo '//2<br>';
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['text'])) {
    $name = strip_tags($_POST['name']);
    $age = strip_tags($_POST['age']);
    $text = strip_tags($_POST['text']);
    echo 'Привет, '.$name.', '.$age.' лет.<br>Твое сообщение: '.$text.'<br>';
} else {
    echo "<form method='post' action='f5.php'>
      <label for='name'>Введите имя</label>
      <input type='text' name='name' />
      <br>
      <label for='age'>Возраст</label>
      <input type='text' name='age' />
      <br>
      <label for='text'>Сообщение</label>
      <textarea name='text'></textarea>
      <br>
      <input type='submit' value='Отправить'>
      </form>";
}
echo '//3<br>';
//Спросите у пользователя логин и пароль (в браузере должен быть звездочками).
//Сравните их с логином $login и паролем $pass, хранящихся в переменной.
//Если все верно - выведите 'Доступ разрешен!', в противном случае - 'Доступ запрещен!'.
//Сделайте так, чтобы скрипт обрезал концевые пробелы в строках, которые ввел пользователь.
echo "
<form action='f5.php' method='post'>
<label for='login'>Login:</label>
<input type='text' name='login' id='login' /><br>
<label for='password'>Password:</label>
<input type='password' name='password' id='password' minlength='6' required /><br>
<input type='submit' value='Sign in' />
</form>";

$login = 'Dima';
$pass = '123456';
if (isset($_POST['login']) && isset($_POST['password'])) {
    if (rtrim($_POST['login']) === $login && rtrim($_POST['password']) === $pass) {
        echo 'Доступ разрешен!';
    } else {
        echo 'Доступ запрещен!';
    }
}


//Спросите имя пользователя с помощью формы.
//Результат запишите в переменную $name. Сделайте так, чтобы после отправки формы значения ее полей не пропадали.
//Спросите у пользователя имя, а также попросите его ввести сообщение (textarea).
//Сделайте так, чтобы после отправки формы значения его полей не пропадали.
echo '//4<br>'?>


<form action="" method="post">
    <label for='name'>Имя</label>
    <input name="name"
        value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']) ?>"
    >
    <label for='text'>Сообщение</label>
    <textarea name='text' id='text'><?php if (isset($_POST['text'])) echo htmlspecialchars($_POST['text']) ?></textarea><br>
        <input type="submit">
    </form>

