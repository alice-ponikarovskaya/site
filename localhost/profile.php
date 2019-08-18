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
  <script type='text/javascript' src='/js/profile_script.js'></script>
  <script type='text/javascript' src='/js/jquery.cookie.js'></script>
  <script type='text/javascript' src='/js/jquery.form.js'></script>
  <script type='text/javascript' src='/js/jquery.validate.js'></script>
  <script type='text/javascript' src='/js/profile.js'></script>
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
	echo '<li><img src="images/icons.png" width="50" height="50"><p><font color="#FFEFD5"></font></p></li>
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
     <p><font face='sans-serif' size='6px' color=' #DDA0DD'>Ваш профиль:</font>
	</p>
	<br></br>
"?>
<?php
  $rez = mysql_query("SELECT * FROM reg_user WHERE login = '".$_SESSION['auth_login']."'",$link);
  
	 if (mysql_num_rows($rez) > 0)
	 {
		 $row = mysql_fetch_array($rez);
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
			 <p><input type="text" style="display:none;" name="person" id="person" SIZE=10 value='.$row["user_id"].'></p>
			 <p><input type="text" style="display:none;" name="id_del" id="id_del'.$row["login"].'" SIZE=123 value='.$row["login"].'></p>
			 <p>'.$row["login"].'</p>
			 <p>'.$row["email"].'</p>
			 <p style="display:none;">'.$row["pass"].'</p>
			 <button type="button" onclick="showMessageData(this, \''.$row["user_id"].'\', \''.$row["login"].'\', \''.$row["email"].'\')">Изменить</button>
			 <span style="padding-left:801px;"></span>
			 <button iidel="'.$row["user_id"].'" onclick="toDelete(this)" type="button" id="del_store">Удалить аккаунт</button>
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
		 while ($row = mysql_fetch_array($rez));
	 }
?>
</ul>
<?php
  $rez = mysql_query("SELECT * FROM reg_user WHERE login = '".$_SESSION['auth_login']."'",$link);
  
	 if (mysql_num_rows($rez) > 0)
	 {
		 $row = mysql_fetch_array($rez);
		 do
		 {  
		    ?>
            <?php
			echo "
			<li id = 'el' class='u_store'>
			<form id='exist'>
		    <div id='stores_account_profile'>
			"?>
            <?php
			 echo '
			 <p><input type="text" style="display:none;" name="person" id="person" SIZE=10 value='.$row["user_id"].'></p>
			 <p><input type="text" style="display:none;" name="id_del" id="id_del'.$row["pass"].'" SIZE=123 value='.$row["login"].'></p>
			 <p>Пароль<span style="padding-left:872px;"></span>
			 <button type="button" onclick="showPass(this, \''.$row["pass"].'\')">Изменить</button>
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
		 while ($row = mysql_fetch_array($rez));
	 }
?>
</ul>
<?php
	echo '
	<ul class="ch_store">
	    <li id = "el1">
	    <form id="chanPass" style="display:none;">
		<div id="storesnew_account">
		<p><input type="text" style="display:none;" name="id_pass_old" id="id_pass_old'.$row["user_id"].'" SIZE=53 value='.$row["user_id"].'></p>
		<p>Старый пароль: <input type="text" name="old_pass_change" id="ln_old_pass" SIZE=123></p>
	    <p>Новый пароль: <input type="text" name="pass_change" id="ln_pass'.$row["pass"].'" SIZE=124></p>
        <p>
		    <button type="button" onclick="toBack(this)">Отмена</button>
		    <span style="padding-left:846px;"></span>
		    <button iidp="'.$row["user_id"].'" type="button" id="change_pass">Сохранить</button>
		</p>
		</div>
		</form>
		</li>
		</ul>
'?>
<?php
	echo '
	<ul class="ch_store">
	    <li id = "el1">
	    <form id="chan" style="display:none;">
		<div id="storesnew_account">
		<p><input type="text" style="display:none;" name="id_old" id="id_old'.$row["user_id"].'" SIZE=123 value='.$row["user_id"].'></p>
		<p>Логин: <input type="text" name="login_change" id="ln_login'.$row["login"].'" SIZE=131 value='.$row["login"].'></p>
	    <p>E-mail: <input type="text" name="email_change" id="ln_email'.$row["email"].'" SIZE=131 value='.$row["email"].'></p>
        <p>
		    <button type="button" onclick="toBack(this)">Отмена</button>
		    <span style="padding-left:846px;"></span>
		    <button iid="'.$row["user_id"].'" type="button" id="change_save">Сохранить</button>
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