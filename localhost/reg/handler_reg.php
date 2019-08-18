<?php
session_start();

include("../include/db_connect.php");
include("../functions/functions.php");

$error = array();
$login = iconv("UTF-8", "cp1251", (clear_string($_POST['reg_login'])));
$email = iconv("UTF-8", "cp1251", (clear_string($_POST['reg_email'])));
$pass = iconv("UTF-8", "cp1251", (clear_string($_POST['reg_pass'])));

if (strlen($login) < 5 or strlen($login) > 15)
{
	$error[] = "Логин должен быть от 5 до 15 символов!";
}
else
{
	$result = mysql_query("SELECT login FROM reg_user WHERE login = '$login'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$error[] = "Логин занят!";
	}
}
if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[]='Укажите корректный E-mail!';
if (strlen($pass) < 7 or strlen($pass) > 15) $error[] = "Укажите пароль от 7 до 15 символов!";
if (count($error))
{
	echo implode(" ",$error);
}
else 
{
	mysql_query("INSERT INTO reg_user(login,email,pass)
	              VALUES(
				  '".$login."',
				  '".$email."',
				  '".$pass."'
				  )",$link);
echo 'true';
}
?>