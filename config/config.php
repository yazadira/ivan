<?php
$db_location="localhost";
$db_name="ivan";
$db_user="root";
$db_pass="";
//таблицы
$tbl_maintext="maintexts";
$tbl_users="users";
$tbl_account="system_accounts";
$tbl_pictures="pictures";
$tbl_categories="categories";
$tbl_goods="goods";
$tbl_orders="orders";
$db_con=mysql_connect($db_location, $db_user, $db_pass);
if(!$db_con) {exit("сервер баз данных недоступен");}
$db_use=mysql_select_db($db_name, $db_con);
if(!$db_use) {exit("база данных недоступна");}
@mysql_query("SET NAMES 'utf8'");
