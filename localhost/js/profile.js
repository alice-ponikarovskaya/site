
$("document").ready(function(){
	
	$("#change_save").click(function(){
	var iid = $(this).attr("iid");
	var id = $("#id_old"+iid).val();
	var login = $("#ln_login"+iid).val();
	var email = $("#ln_email"+iid).val();
	$.ajax({
		url: '../send/handler_change_profile.php',
		type: 'POST',
		data: {
			iid: iid,
			id: id,
			login: login,
			email: email
		},
		success: function(data) {
			if (data =='true')
			{
				alert("Ваша запись успешно изменена!");
				setTimeout(function() {
                location.reload();
            }, 0);	
			}
			else
			{
			alert(data);
			}
		}
	});
    });
	
	$("#change_pass").click(function(){
	var iidp = $(this).attr("iidp");
	var idp = $("#id_pass_old"+iidp).val();
	var oldpass = $("#ln_old_pass").val();
	var pass = $("#ln_pass"+iidp).val();
	$.ajax({
		url: '../send/handler_change_pass.php',
		type: 'POST',
		data: {
			iidp: iidp,
			idp: idp,
			oldpass: oldpass,
			pass: pass
		},
		success: function(data) {
			if (data =='true')
			{
				alert("Ваш пароль успешно изменен!");
				setTimeout(function() {
                location.reload();
            }, 0);	
			}
			else
			{
			alert(data);
			}
		}
	});
    });
});

