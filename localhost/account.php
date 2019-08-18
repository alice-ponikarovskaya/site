<?php
include ("include/db_connect.php");
session_start();
//include("../include/auth_cookie.php");
?>
<?php
echo
"<!DOCTYPE html>
 <head>
 <link rel='shortcut icon' href='/images/ingen.png' type='image/x-icon'>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <link href = 'css/style.css' rel = 'stylesheet' type='text/css' />
  <script type='text/javascript' src='/js/jquery-1.8.2.min.js'></script>
  <script type='text/javascript' src='/js/jcarousellite_1.0.1.js'></script>
  <script type='text/javascript' src='/js/safe_script.js'></script>
  <script type='text/javascript' src='/js/jquery.cookie.js'></script>
  <script type='text/javascript' src='/js/jquery.form.js'></script>
  <script type='text/javascript' src='/js/jquery.validate.js'></script>
  <script type='text/javascript' src='/js/store.js'></script>
  <title>SafeKeeper</title>
  <style type='text/css'>
  li {
    list-style-type: none; /* Убираем маркеры */
   }
   ul {
    margin-left: 0; /* Отступ слева  */
    padding-left: 0; /* Отступ слева  */
   }
   body {
    font: 10pt Arial, Helvetica, sans-serif; /* Шрифт на веб-странице */
    background: #FFF5EE; /* Цвет фона */
    margin: 0; /* Убираем отступы */
   }
   h2 {
    font-size: 11pt; /* Размер шрифта */
    color: #752641; /* Цвет текста */
    margin-bottom: 0; /* Отступ снизу */
   }
  </style>
 </head>
 <body>
 <div id='centerLayer_account'>
  <div id='container_account'>
   <div id='header_account'>@SafeKeeper
   </div>
   <ul>
   <div id='sidebar_account'>
   <div id='user'>
"?>
<?php
if ($_SESSION['auth'] == 'yes_auth')
{
	echo '<li><img src="images/icons.png" width="50" height="50"><p><font color="#FFEFD5"><a id="profile" href="http://localhost/profile.php">'.$_SESSION['auth_login'].'</a></font></p></li>
	';
}
?>
<?php
echo "
    <li><font color='#FFEFD5'><a id='logout'>Выход</a></font>
	</div>
   </div>
   </ul>
   <div id='content_account'>
     <p><font face='sans-serif' size='6px' color=' #DDA0DD'>Хранимые данные:</font>
	 <span style='padding-left:656px;'></span>
        <button id='plus' type='button' name='button'><img src='images/plus_new.png' width='60' height='60'></button>
	</p>
	<br></br>
"?>
<?php
	echo "
	<ul >
	<li >
		<form id='new' style='display:none;'>
		<div id='storesnew_account'>
	    <p>Наименование: <input type='text' name='title_store' SIZE=123></p>
		<p>Содержание: <input type='text' name='descrip_store' SIZE=125></p>
        <p><button type='button' onclick='toStart(this)'>Отмена</button><span style='padding-left:846px;'></span><input type='button' id='save' value='Сохранить' /></p>
		</div>
	    </form>
		</li>
		</ul>
"?>
<ul>
<?php
  $rez = mysql_query("SELECT user_id FROM reg_user WHERE login = '".$_SESSION['auth_login']."'",$link);
  $znach = mysql_fetch_array($rez);
  $result = mysql_query("SELECT * FROM table_storage WHERE user_id = '".$znach["user_id"]."'",$link);
	 if (mysql_num_rows($result) > 0)
	 {
		 $row = mysql_fetch_array($result);
		 do
		 {  
		    ?>
            <?php
			echo "
			<li id = 'el' class='u_store'>
			<form id='exist'>
		    <div id='stores_account'>
			"?>
            <?php
			 echo '
			 <p><input type="text" style="display:none;" name="person" id="person" SIZE=10 value='.$znach["user_id"].'></p>
			 <p><input type="text" style="display:none;" name="id_del" id="id_del'.$row["id_store"].'" SIZE=123 value='.$row["id_store"].'></p>
			 <p>'.$row["title"].'</p>
			 <p>'.$row["description"].'</p>
			 <p>
			     <button type="button" onclick="showMessageData(this, \''.$row["id_store"].'\', \''.$row["title"].'\', \''.$row["description"].'\')">Изменить</button>
			     <span style="padding-left:851px;"></span>
				 <button iidel="'.$row["id_store"].'" onclick="toDelete(this)" type="button" id="del_store">Удалить</button>
			 </p>
			 ';
			 ?>
            <?php
			echo "
		    </div>
			</form>
			</li>
			"?>
            <?php
		 }		
		 while ($row = mysql_fetch_array($result));
	 }
?>
</ul>
<?php
	echo '
	<ul class="ch_store">
	    <li id = "el1">
	    <form id="chan" style="display:none;">
		<div id="storesnew_account">
		<p><input type="text" style="display:none;" name="id_old" id="id_old'.$row["id_store"].'" SIZE=123 value='.$row["id_store"].'></p>
	    <p>Наименование: <input type="text" name="title_change" id="ln_title'.$row["id_store"].'" SIZE=123 value='.$row["title"].'></p>
		<p>Содержание: <input type="text" name="descrip_change" id="ln_description'.$row["id_store"].'" SIZE=125 value='.$row["description"].'></p>
        <p>
		    <button type="button" onclick="toBack(this)">Отмена</button>
		    <span style="padding-left:846px;"></span>
		    <button iid="'.$row["id_store"].'" type="button" id="change_save">Сохранить</button>
		</p>
		</div>
		</form>
		</li>
		</ul>
'?>
<?php
echo "
    </div>
   <div id='footer_account'>&copy; Поникаровская Алиса
   </div>
  </div>
  </div>
 </body>
</html>"
?>.