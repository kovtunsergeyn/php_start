<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
</head>
<body>
<p>Вот последние 10 элементов таблицы joke:</p>

<table border="1px" style="border: solid;">
    <tr>
        <th>Результаты выборки</th>
    </tr>
    <tr>
        <td>
            <?php foreach ($jokes as $joke): ?><!--вытаскивает каждую строчку из массива $jokes и выводит на страницу-->
            <form action="?deleteJoke" method="post">
                <blockquote>
                    <input type="hidden" name="id" value="<?php echo $joke['id'] ?>"/>
                    <?php echo htmlspecialchars($joke['text'], ENT_QUOTES, 'UTF-8') ?>&nbsp;
                    <input type="submit" value="Удалить" id="delete" name="delete"/>
                    (Автор: <a href="mailto:<?php echo htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8') ?>">
                    <?php echo htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8') ?></a>)
                </blockquote>
            </form>
            <?php endforeach; ?>
        </td>
    </tr>
</table>
</body>
</html>

