<?php
function db_connect(){
$server = 'mysql.hostinger.ru';
$user = 'u330380592_root';
$password = 'DBwBeYZyD8';

$dblink = mysql_connect($server, $user, $password);

if($dblink)
echo '&#1057;&#1086;&#1077;&#1076;&#1080;&#1085;&#1077;&#1085;&#1080;&#1077; &#1091;&#1089;&#1090;&#1072;&#1085;&#1086;&#1074;&#1083;&#1077;&#1085;&#1086;.';
else
die('&#1054;&#1096;&#1080;&#1073;&#1082;&#1072; &#1087;&#1086;&#1076;&#1082;&#1083;&#1102;&#1095;&#1077;&#1085;&#1080;&#1103; &#1082; &#1089;&#1077;&#1088;&#1074;&#1077;&#1088;&#1091; &#1073;&#1072;&#1079; &#1076;&#1072;&#1085;&#1085;&#1099;&#1093;.');

$database = 'u330380592_data';
$selected = mysql_select_db($database, $dblink);
if($selected)
echo ' &#1055;&#1086;&#1076;&#1082;&#1083;&#1102;&#1095;&#1077;&#1085;&#1080;&#1077; &#1082; &#1073;&#1072;&#1079;&#1077; &#1076;&#1072;&#1085;&#1085;&#1099;&#1093; &#1087;&#1088;&#1086;&#1096;&#1083;&#1086; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1086;.';
else
die(' &#1041;&#1072;&#1079;&#1072; &#1076;&#1072;&#1085;&#1085;&#1099;&#1093; &#1085;&#1077; &#1085;&#1072;&#1081;&#1076;&#1077;&#1085;&#1072; &#1080;&#1083;&#1080; &#1086;&#1090;&#1089;&#1091;&#1090;&#1089;&#1090;&#1074;&#1091;&#1077;&#1090; &#1076;&#1086;&#1089;&#1090;&#1091;&#1087;.');
    return $selected;
}
?>