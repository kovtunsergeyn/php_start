<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>name.php</title>
</head>
<body>
    <?php

    $firstname =$_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    //echo "Добро пожаловать, " . htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8');

    if ($firstname == 'Сергей' && $lastname == 'Ковтун') {
        echo "Добро пожаловать, " . htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') . "!";
    }
    else {
        echo "Извините у вас нет доступа";
    }

    /*$count = 0;
    while ($count <= 10) {
        echo $count;
        $count;
    }*/

    $count = 0;
    for ($count = 0; $count <= 10; $count++) {
        echo $count;
    }

    ?>
</body>
</html>