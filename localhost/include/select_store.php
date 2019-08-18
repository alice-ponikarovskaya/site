<?php
if ($S_SERVER["REQUEST_METHOD"] =="POST")
{
	include("db_connect.php");
	
	$id = clear_string($_POST["id"]));
	$result = mysql_query("SELECT * FROM table_storage WHERE store_id = '$id'",$link);
	$row = mysql_fetch_array($result);
	?>