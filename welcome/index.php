<?php
//подключаемся к бд
$dsn = 'mysql:dbname=db01;host=localhost';
$username = 'db01_user';
$password = '1234';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (PDOException $err) {
    $error = 'Не удалось подключиться к серверу баз данных' . $err->getMessage();
    include "error.html.php";
    exit();
}
$error = 'Подключение к серверу баз данных прошло успешно!';
include "error.html.php";

//какая то хрень с волшебными ковычками, написано пока не разбираться
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] =  & $process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

//добавляем введенное пользователем значение в бд
if (!isset ($_REQUEST['joketext']) && !isset($_REQUEST['authorname']) && !isset($_REQUEST['authoremail'])) {
    include "form.html.php";
} else {

    try {
        $jokeSQL = 'INSERT INTO joke SET joketext = :joketext, jokedate = CURDATE()';
        $s = $pdo->prepare($jokeSQL);
        $s->bindValue(':joketext', $_POST['joketext']);
        $s->execute();

        $authorSQL = 'INSERT into author SET email=:authoremail, name=:authorname';
        $d = $pdo->prepare($authorSQL);
        $d->bindValue(':authorname', $_POST['authorname']);
        $d->bindValue(':authoremail', $_POST['authoremail']);
        $d->execute();

    } catch (PDOException $err) {
        $error = 'Не удалось добавить значение!' . $err->getMessage();
        include "error.html.php";
        exit();
    }
    header('Location: .');
    exit();
}
//удаляем добавленные комментарии. шаблон - jokes.html.php
if (isset($_REQUEST['deleteJoke'])) {
    try {
        $deleteComment = 'DELETE from joke WHERE id=:id';
        $s = $pdo->prepare($deleteComment);
        $s->bindValue(':id', $_REQUEST['id']);
        $s->execute();
    }
    catch (PDOException $err) {
        $error = 'Ошибка при удалении комментария!';
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

//пример select'a в бд - выведем все значения joketext из таблицы joke
try {
    $sqlSelect = 'SELECT joke.id, joketext, name, email FROM joke INNER join author on authorid=author.id';
    $result = $pdo->query($sqlSelect); //query в отличии от exec возвращает объект PDOStatement
} catch (PDOException $err) {
    $error = 'Не удалось выполнит select' . $err->getMessage();
    include "error.html.php";
    exit();
}

//обрабатываем строку - перебирает $result, записывает каждкую строку в $row, потом добавляет в массив $jokes[]
foreach ($result as $row) {
    $jokes[] = array('id'=> $row['id'], 'text'=>$row['joketext'], 'name'=>$row['name'], 'email'=>$row['email']);
}
include "jokes.html.php";