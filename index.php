<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="utf-8"></head>
<a href="?1">Раздел 1</a>
<a href="?2">Раздел 2</a>
<a href="?3">Раздел 3</a>
</html>
<?php
require_once("database.php");
require_once("model/articles.php");

//header('Content-Type: text/html; charset=utf-8');
//
//include 'db_class.php';

$link = db_connect();
//phpinfo();
//$articles = articles_choose($link,$_POST['article_id']);
//echo $_POST['article_id'];
$article_id = $_POST['article_id'];
$articles =  articles_choose($link,$article_id);

if (isset($_GET['1'])){
    $articles = articles_choose($link,1);
    include("views/articles.php");
}
if (isset($_GET['2'])){
    $articles = articles_choose($link,2);
    include("views/articles.php");
}
if (isset($_GET['3'])){
    $articles = articles_choose($link,3);
    include("views/articles.php");
}
?>





