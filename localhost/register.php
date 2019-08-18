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
  <script type='text/javascript' src='/js/jquery.cookie.js'></script>
  <script type='text/javascript' src='/js/jquery.form.js'></script>
  <script type='text/javascript' src='/js/jquery.validate.js'></script>
  <script type='text/javascript' src='/js/reg.js'></script>
  <title>SafeKeeper</title>
  <style>
  li {
    list-style-type: none; /* Убираем маркеры */
   }
   ul {
    margin-left: 0; /* Отступ слева */
    padding-left: 0; /* Отступ слева  */
   }
  body {background-image: url(images/dataprotection.png);
  background-size: 160px 160px;}
  </style>
 </head>
 <body opacity: 0.7 bgcolor='#FFF5EE'>
  <div id='centerLayer_register'>
    <div id='blockLayerHead_register'>
      <font size='25' color='white' face='Broadway'>
	    <p align='center'>SafeKeeper</p>
	    <div id = 'message'>
	        <p id='message-reg' align='center'>Вы успешно зарегестрированы!</p>
	    </div>
	  </font>
	</div>
	<div id='blockLayerBut_register'>
	  <form method='post' id='form_reg' action='/reg/handler_reg.php'>
		<p align='center'>
			<input type='submit' name='reg_submit' id='form_submit' value='Зарегистрироваться' class='c'>
			<div id = 'auth'>
			  <p id='href_auth'><a href='enter.php' class='c'>Авторизоваться</a></p>
			</div>
		</p>
	</div>
	<div id='blockLayerText_register'>
	<ul id='form_registration'>
	<li>
	  <label for='lastname'>Логин<font color='#FFF5EE'>*</font>: </label><p></p><input type='text' name='reg_login' id='reg_login' SIZE=30 id='ln' autocomplete='off'>
	</li>
	<li>
	  <p><label for='Email'>E-mail<font color='#FFF5EE'>*</font>: </label><p></p><input type='text' name='reg_email' id='reg_email' SIZE=30 id='em' autocomplete='off'></p>
	 </li>
	<li>
	  <p><label for='lastname'>Пароль<font color='#FFF5EE'>*</font>: </label><p></p><input type='text' name='reg_pass' id='reg_pass' SIZE=30 id='pw' autocomplete='off'></p>
	</li>
	</ul>
	</div>
	</form>
	<div id='blockLayerHref_register'>
	  <font size='2' color='white' face='TimesNewRoman'>
	  <p align='center'><a href='index.php' class='c1'>Вернуться назад</a></p>
	  </font>
	</div>
  </div>
 </body>
</html>"
?>
