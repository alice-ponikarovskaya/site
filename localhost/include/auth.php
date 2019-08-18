<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("../include/db_connect.php");
include("../functions/functions.php");

$login =iconv("UTF-8", "cp1251", (clear_string($_POST["login"])));
$pass =iconv("UTF-8", "cp1251", (clear_string($_POST["pass"])));

setcookie('account',$login.'+'.$pass,time()+3600*24*31, "/");

$result = mysql_query("SELECT * FROM reg_user WHERE (login = '".$login."' OR email = '".$login."') AND pass = '".$pass."'",$link);
if (mysql_num_rows($result) > 0)
{
	$row = mysql_fetch_array($result);
	session_start();
	$_SESSION['auth'] = 'yes_auth';
	$_SESSION['auth_id'] = $row['user_id'];
	$_SESSION['auth_login'] = $row['login'];
	$_SESSION['auth_email'] = $row['email'];
	$_SESSION['auth_pass'] = $row['pass'];
	echo 'true';
}
else
{
	echo 'Неверный Логин и (или) Пароль';
}
}
?>