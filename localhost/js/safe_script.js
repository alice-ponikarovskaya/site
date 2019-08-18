$(document).ready(function() {
	
	$("#plus").click(function() {
		$("#plus").hide();
		$("#ch").hide();
		$("#del").hide();
		$("#new").show();
	});
	
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
	
	$('#button-pass-show-hide').click(function() {
    var statuspass =$('#button-pass-show-hide').attr("class");
    if(statuspass == "pass-show")
	{
        $('#button-pass-show-hide').attr("class","pass-hide");
        var $input = $("#auth_pass");
        var change ="text";
        var rep = $("<input placeholder='Пароль' type='" + change + "' />")
        .attr("id",$input.attr("id"))
        .attr("name",$input.attr("name"))
        .attr('class',$input.attr('class'))
        .val($input.val())
        .insertBefore($input);
        $input.remove();
        $input = rep;
    }
	else
	{
        $('#button-pass-show-hide').attr("class","pass-show");
        var $input = $("#auth_pass");
        var change ="password";
        var rep = $("<input placeholder='Пароль' type='" + change + "' />")
        .attr("id",$input.attr("id"))
        .attr("name",$input.attr("name"))
        .attr('class',$input.attr('class'))
        .val($input.val())
        .insertBefore($input);
        $input.remove();
        $input = rep;
    }
    });﻿
		
});
var showMessageData = function(_this, id, title, description) {
	$('.u_store').show();
	let $this = $(_this);
	let $p = $("#chan").show();
	$this.parents('li').hide().after($p);
	$p.find('#id_old').val(id);
	$p.find('#ln_title').val(title);
	$p.find('#ln_description').val(description);
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