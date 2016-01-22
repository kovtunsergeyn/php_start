<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Сегодняшняя дата</title>
</head>
<body>
    <p>Сегодняшняя дата (согласно данному веб-серверу):</p>
    <?php
        echo date('l, F, jS Y.');

        $testVariable = "Привет " . "мир!"; //конкатинация строк
        echo $testVariable;

        //массивы
        $myArray = array('один', 2, '3');
        $myArray[0] = "два"; //присваиваем новое значение элементу массива
        $myArray[3] = 4; //создаем новый элемент массива
        $myArray[] = 5; //добавляем новый элемент в конец массива
        echo $myArray[4];

        $birthdays = array("Sergei" => '1991-10-05', "Victoria" => '1988-07-31'); //ассоциативный массив - в качестве индексов выступаю строки
        echo "Дата моего рождения: " . $birthdays["Sergei"];
    ?>
</body>
</html>