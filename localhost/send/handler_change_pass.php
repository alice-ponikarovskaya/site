<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("../include/db_connect.php");
include("../functions/functions.php");


$iidp=iconv("UTF-8", "cp1251", (clear_string($_POST['iidp'])));
$idp=iconv("UTF-8", "cp1251", (clear_string($_POST['idp'])));
$oldpass = iconv("UTF-8", "cp1251", (clear_string($_POST['oldpass'])));
$pass = iconv("UTF-8", "cp1251", (clear_string($_POST['pass'])));
$error = array();
 
if (strlen($pass) < 7 or strlen($pass) > 15)
{
	$error[] = "Пароль должен быть от 7 до 15 символов!";
}
else
{
	$result = mysql_query("SELECT pass FROM reg_user WHERE user_id = '".$_SESSION['auth_id']."'",$link);
	$row = mysql_fetch_array($result);
	if ($oldpass!=$row["pass"])
	{
		$error[] ="Прежний пароль не совпадает!";
	}
}
if (count($error))
{
	echo implode(" ",$error);
}
else 
{
mysql_query("UPDATE reg_user
                  SET 
				             login = '".$_SESSION['auth_login']."',
							 email = '".$_SESSION['auth_email']."',
                             pass = '".$pass."'
				  WHERE      user_id = '".$_SESSION['auth_id']."' 
				  ",$link);
echo 'true';
}
}
?>