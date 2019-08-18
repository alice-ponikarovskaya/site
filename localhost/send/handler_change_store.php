<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("../include/db_connect.php");
include("../functions/functions.php");


$iid=iconv("UTF-8", "cp1251", (clear_string($_POST['iid'])));
$id=iconv("UTF-8", "cp1251", (clear_string($_POST['id'])));
$title = iconv("UTF-8", "cp1251", (clear_string($_POST['title'])));
$descrip = iconv("UTF-8", "cp1251", (clear_string($_POST['descrip'])));
$error = array();
 
 if (strlen($title) < 1 or strlen($title) > 255)
{
	$error[] = "Название не может быть пустым или более 255 символов";
}
if (strlen($description) > 255) $error[] = "Заметка не может быть более 255 символов";
if (count($error))
{
	echo implode(" ",$error);
}
else 
{
mysql_query("UPDATE table_storage
                  SET 
                             title = '".$title."',
							 description = '".$descrip."'
				  WHERE      id_store = '".$id."' 
				  ",$link);
echo 'true';
}
}
?>