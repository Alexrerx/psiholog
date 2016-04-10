<?php
function articles_all($link){
	//Запрос в ДБ
  $query = "SELECT * FROM articles ORDER BY id DESC";
  $result = mysqli_query($link, $query);
  
  if(!$result)
	  die(mysqli_error($link));
  
  //Извлечение из БД
  $n = mysqli_num_rows($result);
  $articles = array();
  
	for ($i = 0;$i < $n; $i++){
	$row = mysqli_fetch_assoc($result);
	$articles[] = $row;
}
return $articles;
}
function articles_choose($link,$article_id){
    $article_id = (int)$article_id;
    $query = sprintf("SELECT * FROM articles WHERE article_id='%d'",$article_id);
    $result = mysqli_query($link,$query);
    if(!$result)
        die(mysqli_error($link));
    $n = mysqli_num_rows($result);
    $articles_chosen = array();
    for ($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_assoc($result);
        $articles_chosen[] = $row;
    }
    return $articles_chosen;
}
function articles_get($link, $id){
   //Запрос
   $query = sprintf("SELECT * FROM articles WHERE id=%d",(int)$id);
   $result = mysqli_query($link,$query);
   if(!$result){
	   die(mysqli_error($link));
   }
    $article = mysqli_fetch_assoc($result);
	return $article;
}
function articles_new($link,$title,$content,$date,$article_id){
    //Подготовка
    $title = trim($title);
    $content = trim($content);
    //Проверка
    if($title == '') 
        return false;
    
    //Запрос
    $t = "INSERT INTO articles (title,content,date,article_id) VALUES ('%s', '%s', '%s','%s')";
    
    $query = sprintf($t, mysqli_real_escape_string($link, $title),mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $date),mysqli_real_escape_string($link, $article_id));
    echo $query;
    $result = mysqli_query($link, $query);
    
    if(!$result)
        die(mysqli_error($link));
    return true;
    
}
function articles_edit($link, $id, $title, $date, $content){
     $title = trim($title);
    $content = trim($content);
     $date = trim($date);
   $id = (int)$id;
     //Проверка
    if($title == '') return false;
    
    //Запрос
    $sql = "UPDATE articles SET title='%s', content='%s',date='%s' WHERE id='%d'";
    $query = sprintf($sql, mysqli_real_escape_string($link, $title),mysqli_real_escape_string($link, $content),
        mysqli_real_escape_string($link, $date),
                    $id);
    $result = mysqli_query($link,$query);
    
    if(!$result)
        die(mysqli_error($link));
        
    return mysqli_affected_rows($link);
    
}
function articles_delete($link, $id)
{
    $id = (int)$id;
    if($id == 0) return false;
     $query = sprintf("DELETE FROM articles WHERE
     id='%d'",$id);
    $result = mysqli_query($link,$query);
      if(!$result){
        die(mysqli_error($link));
        }
    return mysqli_affected_rows($link);
}
function articles_intro($text, $len = 500)
{
    return mb_substr ($text, 0, $len);
}

?>
