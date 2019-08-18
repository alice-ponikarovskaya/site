<?php
session_start();
echo
"<!DOCTYPE html>
 <head>
 <link rel='shortcut icon' href='/images/ingen.png' type='image/x-icon'>
  <meta charset='utf-8'>
  <link href = 'css/style.css' rel = 'stylesheet' type='text/css' />
  <script type='text/javascript' src='/js/jquery-1.8.2.min.js'></script>
  <script type='text/javascript' src='/js/jcarousellite_1.0.1.js'></script>
  <script type='text/javascript' src='/js/safe_script.js'></script>
  <script type='text/javascript' src='/js/auth.js'></script>
  <script type='text/javascript' src='/js/jquery.cookie.js'></script>
  <title>SafeKeeper</title>
  <style>
  li {
    list-style-type: none; /* Убираем маркеры */
   }
   ul {
    margin-left: 0; /* Отступ слева в браузере IE и Opera */
    padding-left: 0; /* Отступ слева в браузере Firefox, Safari, Chrome */
   }
  body {background-image: url(../images/dataprotection.png);
  background-size: 160px 160px;}
  </style>
 </head>
 <body opacity: 0.7 bgcolor='#FFF5EE'>
  <div id='centerLayer_enter'>
    <div id='blockLayerHead_enter'>
      <font size='25' color='white' face='Broadway'>
	      <p align='center'>SafeKeeper</p>
	  </font>
	  		"?>
<?php
if ($_SESSION['auth'] == 'yes_auth')
{
	echo '<p id="acc_hey" align="center" style="display:none;"><font size="5" color="white" face="Broadway">Hey, '.$_SESSION['auth_login'].'!</font></p>';
}
?>
<?php
echo "
	</div>
	<p id='message-auth' class='message_err_auth' align='center'></p>
	<div id='blockLayerBut_enter'>
	  <form method='post'>
	</div>
	<div id='blockLayerText_enter'>
	<ul id='input-email-pass'>
	<li><p></p><input type='text' id='auth_login' autocomplete='on' placeholder='Логин/E-mail' /></li>
	<li><p></p><input placeholder='Пароль' type='password' id='auth_pass' autocomplete='on'  /><span id='button-pass-show-hide' class='pass-show'></span></li>
	</ul>
	</div>
	</form>
	<div id='blockLayerHref_enter'>
	  <font size='2' color='white' face='TimesNewRoman'>
	  	<p align='center'><button onclick='toValid(this)' type='button' id='button_auth' class='c'>Войти</button></p>
		<p align='center' class='auth-loading'><img src='../images/5.gif'/></p>
	    <p align='center'><a href='index.php' class='c1'>Вернуться назад</a></p>
	  </font>
	</div>
  </div>
 </body>
</html>"
?>
