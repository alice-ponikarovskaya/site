$(document).ready(function() {
	
	$('#logout').click(function(){
		$.ajax({
			type: 'POST',
			url: '../include/logout.php',
			dataType: 'html',
			cache: false,
			success: function(data){
				if (data == 'true')
				{
					document.location.href = "http://localhost/index.php";
				}
			}
		});
	});
		
});
var showMessageData = function(_this, id, title, description) {
	$('.u_store').show();
	let $this = $(_this);
	let $p = $("#chan").show();
	$this.parents('li').hide().after($p);
	$p.find('#id_old').val(id);
	$p.find('#ln_login').val(title);
	$p.find('#ln_email').val(description);
}
var showPass = function(_this, pass) {
	$('.u_store').show();
	let $this = $(_this);
	let $p = $("#chanPass").show();
	$this.parents('li').hide();
}
var toBack = function(_this) {
	let $this = $(_this);
	$this.parents('form').hide();
    $(".u_store").show();
}
var toStart = function(_this) {
	let $this = $(_this);
	$this.parents('form').hide();
    $(".u_store").show();
	$("#plus").show();
}

//<a href='account.php' class='c'>Войти</a>