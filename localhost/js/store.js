
$("document").ready(function(){
	$("#save").click(function(){
		var dannie = $("#new").serialize();
		$.ajax({
			url: '../send/handler_new_store.php',
			type: 'POST',
			data: dannie,
			success: function(data) {
			    if (data =='true')
			    {
				    alert("Ваша запись успешно добавлена!");
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
	
	$("#change_save").click(function(){
	var iid = $(this).attr("iid");
	var id = $("#id_old"+iid).val();
	var title = $("#ln_title"+iid).val();
	var descrip = $("#ln_description"+iid).val();
	$.ajax({
		url: '../send/handler_change_store.php',
		type: 'POST',
		data: {
			iid: iid,
			id: id,
			title: title,
			descrip: descrip
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
	
});
	var toDelete = function(_this){
	var iidel = $(_this).attr("iidel");
	var idel = $("#id_del"+iidel).val();
	var ok = confirm("Вы уверены что хотите удалить эту запись?");
    if(ok){
		$.ajax({
		url: '../send/handler_delete_store.php',
		type: 'POST',
		data: {
			iidel: iidel,
			idel: idel
		},
		success: function(data) {
			setTimeout(function() {
                location.reload();
            }, 0);			
		}
	});
    }
	else{
		thisWindow.close();
	}
    }

