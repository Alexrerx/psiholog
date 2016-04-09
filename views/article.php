<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Мой Первый Блог</title>
    <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="container">
    <div class="article">
        <h3><?=$article['title']?></h3>
        <em>Опубликовано:<?=$article['date']?></em>
        <p><?=$article['content']?></p>
        </div>
    </div>
    </body>
</html>