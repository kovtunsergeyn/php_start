<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
    <script type="text/javascript">
        function hide() {
            setTimeout(function() {document.getElementById('error').hidden = true}, 3000)
        }
        hide();
    </script>
</head>
<body>
    <p style="color: #1f55ff"><p id="error" style="color: blue"><?php echo $error ?></p></p>
</body>
</html>