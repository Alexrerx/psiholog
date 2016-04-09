<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Мой Первый Блог</title>
    <link rel="stylesheet" href="../style.css">
    </head>
    <body>
         <div class="container">
           
			<a href="admin">Панель администратора</a>
    <div>
        
        <?php foreach($articles as $a): ?>
        <div class="articles">
            <h3><a href="article.php?id=<?=$a['id']?>">
                <?=$a['title']?></a></h3>
        <em>Опубликовано:<?=$a['date']?></em>
        <!--<p>articles_intro($a['content'])</p>-->
        </div>
             <?php endforeach ?>
    </div>
        </div>
    </body>
</html>