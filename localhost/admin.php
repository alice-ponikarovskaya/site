<?php
session_start();
include("/include/db_connect.php");
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
   <div id='content_account'>
     <p><font face='sans-serif' size='6px' color=' #DDA0DD'>Хранимые данные:</font>
	 <span style='padding-left:656px;'></span>
	</p>
	<br></br>
	"?>
	<?php
 
$result = mysql_query("SELECT * FROM reg_user ",$link) or die("Ошибка " . mysql_error($link)); 
if($result)
{
    $rows = mysql_num_rows($result); // количество полученных строк
     
    echo "<table align='center' border='1' cellspacing='10' cellpadding='15'><tr><th>Id</th><th>Логин</th><th>Email</th><th>Пароль</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysql_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
     
    // очищаем результат
    mysql_free_result($result);
}
 
mysql_close($link);
?>
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