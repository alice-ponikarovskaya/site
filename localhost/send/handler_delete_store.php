<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("../include/db_connect.php");
include("../functions/functions.php");

$iidel=iconv("UTF-8", "cp1251", (clear_string($_POST['iidel'])));
$idel=iconv("UTF-8", "cp1251", (clear_string($_POST['idel'])));
$error = array();

if (count($error))
{
	echo implode(" ",$error);
}
else 
{
mysql_query("DELETE FROM table_storage
				  WHERE      id_store = '".$idel."' 
				  ",$link);
echo "Ваша запись успешно удалена!";
}
}
?>