<!DOCTYPE html>
<html>
<head>
    <title>Тест</title>
    <meta charset="utf-8">

    <style type="text/css">
        textarea {
            display: block;
        }
    </style>
</head>
<body>


    <form action="?" method="post">
        <p>Введите значение которое необходимо добавить:</p>
        <div>
            <label for="joketext">Комментарий:
                <textarea name="joketext" id="joketext" cols="30" rows="4"></textarea><br/>
            </label>
        </div>

        <div style="margin-top: 10px;">
            <label for="authorname">Имя:
                <input type="text" name="authorname" id="authorname"/>
            </label>
        </div>

        <div style="margin-top: 10px;">
            <label for="authorname">Email:
                <input type="text" name="authoremail" id="authoremail"/>
            </label>
        </div>

        <div style="margin-top: 10px;">
            <input type="submit" value="Добавить комментарий"/>
        </div>
    </form>
</body>
</html>