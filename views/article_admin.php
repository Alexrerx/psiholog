<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
         <div class="container">
			<a href="../admin">Панель администратора</a>
             <a href="../index.php">Главная</a>
    <div>
        <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
        <label>
            Название
            <input type="text" name="title" 
                   value="<?=$article['title']?>"
                   class="form-item" autofocus required>
            </label>
              <label>
           Дата
            
            <input type="data" name="date" value="<?=$article['date']?>"
                   class="form-item" required>
            </label>
          <label>
           Содержимое
            <textarea class="form-item" name="content" required><?=$article['content']?></textarea>
            </label>
            <label>
            Выберите раздел
                <select name="selec">
                <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </label>
            <input type="submit" value="Сохранить" class="btn">
        </form>
             </div></div>
    </body>
</html>