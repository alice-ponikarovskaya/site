<?php
session_start();
include("../include/db_connect.php");
include("../functions/functions.php");

$error = array();
$title = iconv("UTF-8", "cp1251", (clear_string($_POST['title_store'])));
$descrip = iconv("UTF-8", "cp1251", (clear_string($_POST['descrip_store'])));

$rez = mysql_query("SELECT user_id FROM reg_user WHERE login = '".$_SESSION['auth_login']."'",$link);
$znach = mysql_fetch_array($rez);
 
 if (strlen($title) < 1 or strlen($title) > 255)
{
	$error[] = "Название не может быть пустым или более 255 символов";
}
else
{
	$result = mysql_query("SELECT title FROM table_storage WHERE title = '$title' AND user_id = '".$_SESSION['auth_id']."'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$error[] = "Заметка с таким названием уже существует!";
	}
}
if (strlen($description) > 255) $error[] = "Заметка не может быть более 255 символов";
if (count($error))
{
	echo implode(" ",$error);
}
else 
{
mysql_query("INSERT INTO table_storage (title,description,user_id) 
                    VALUES (
                             '".$title."',
							 '".$descrip."',
							 '".$znach["user_id"]."'
				  )",$link);
echo 'true';
}
?>