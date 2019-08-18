$("document").ready(function(){
});
var toValid = function(_this){
	
    var auth_login = $("#auth_login").val();
	var auth_pass = $("#auth_pass").val();
	
	if (auth_login == "" || auth_login.length > 30)
	{
		$("#auth_login").css("borderColor", "#FDB6B6");
		send_login = 'no';
	}
	else
	{
		$("#auth_login").css("borderColor", "#DBDBDB");
		send_login = 'yes';
	}
	
	
	if (auth_pass == "" || auth_pass.length > 15)
	{
		$("#auth_pass").css("borderColor", "#FDB6B6");
		send_pass = 'no';
	}
	else
	{
		$("#auth_pass").css("borderColor", "#DBDBDB");
		send_pass = 'yes';
	}
	
	
	if (send_login == 'yes' && send_pass == 'yes')
	{
		$("#button_auth").hide();
		$(".auth-loading").show();
		
		$.ajax({
			url: '../include/auth.php',
			type: 'POST',
			data:{
				login: auth_login,
				pass: auth_pass
			},
			success: function(data){
				if (data == 'true')
				{
					$("#message-auth").hi
					$(".auth-loading").hide();
					if ($.cookie('account') == 'admin+admin00')
					{
					document.location.href = "http://localhost/admin.php";
					}
					else
					{
					$("#acc_hey").show();
					document.location.href = "http://localhost/account.php";
					}
				}
				else
				{
					$("#message-auth").slideDown(400).html(data);;
					$(".auth-loading").hide();
					$("#button_auth").show();
				}
			}
	    });
	}
}

/*var allcookies = document.cookie;            // Отыскать начало cookie-файла с именем "version"
                    var pos = allcookies.indexOf("version=");   // Если cookie с данным именем найден, извлечь и использовать его значение
                    if (pos != -1)
                    {
                     var start = pos + 8;                              // Начало значения cookie
                     var end = allcookies.indexOf(";", start);    // Конец значения cookie
                     if (end == -1) end = allcookies.length;
                     var value = allcookies.substring(start, end); // Извлекаем значение
                     value = decodeURIComponent (value);
					 alert(value);*/