<?php
//define('MYSQL_SERVER','mysql.hostinger.ru');
//define('MYSQL_USER','u330380592_root');
//define('MYSQL_PASSWORD','250498alex');
//define('MYSQL_DB','u330380592_data');

function db_connect(){
    $host ='mysql.hostinger.ru';
$user = 'u330380592_root';
$password = 'DBwBeYZyD8';
$db = 'u330380592_data';
    $link = mysqli_connect($host,$user,$password,$db) or die("Error");

//        if (!mysqli_set_charset($link,"utf8")){
//			printf("Error: ".mysqli_error($link));
//		}
    //$selected = mysql_select_db($db,$link) or die("Error db");
        return $link;
    }
?>