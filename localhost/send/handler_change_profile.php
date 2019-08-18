<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("../include/db_connect.php");
include("../functions/functions.php");


$iid=iconv("UTF-8", "cp1251", (clear_string($_POST['iid'])));
$id=iconv("UTF-8", "cp1251", (clear_string($_POST['id'])));
$login = iconv("UTF-8", "cp1251", (clear_string($_POST['login'])));
$email = iconv("UTF-8", "cp1251", (clear_string($_POST['email'])));
$error = array();
 
if (strlen($login) < 5 or strlen($login) > 15)
{
	$error[] = "Логин должен быть от 5 до 15 символов!";
}
else
{
	$result = mysql_query("SELECT * FROM reg_user WHERE login = '$login'",$link);
	$row = mysql_fetch_array($result);
	if (mysql_num_rows($result) > 1)
	{
		$error[] ="'".$id."'Логин занят!";
	}
}
if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[]='Укажите корректный E-mail!';
if (count($error))
{
	echo implode(" ",$error);
}
else 
{
mysql_query("UPDATE reg_user
                  SET 
                             login = '".$login."',
							 email = '".$email."'
				  WHERE      user_id = '".$id."' 
				  ",$link);
echo 'true';
}
}
?>