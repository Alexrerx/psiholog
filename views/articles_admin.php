<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cтатьи админ</title>
    <link rel="stylesheet" href="../style.css">
    </head>
    <body>
         <div class="container"> 
			
        <a href="index.php?action=add">Добавить статью</a>
        <a href="../index.php">Главная</a>
        <table class="admin-table">
    <tr>
    <th>Дата</th>
    <th>Заголовок</th>
    <th></th>
    <th></th>
    
    </tr>
            <?php foreach($articles as $a): ?>
    <tr>
    <td><?=$a['date']?></td>
    <td><?=$a['title']?></td>
    <td>
        <a href="index.php?action=edit&id=<?=$a['id']?>">Редактировать</a>
        </td>
        <td>
     <a href="index.php?action=delete&id=<?=$a['id']?>">Удалить</a>
        </td>
    </tr>
         <?php endforeach ?>  
</table> 
             
    </div>
    
    </body>
</html>