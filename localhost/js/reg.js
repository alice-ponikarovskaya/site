$(document).ready(function() {
	  $ ('#form_reg').validate(
	  {
		  rules: {
			  'reg_login': {
				  required:true,
				  minlength:5,
				  maxlength: 15,
				  remote: {
					  type: 'post',
					  url: '/reg/check_login.php'
				  }
			  },
			  'reg_email': {
				  required:true,
				  email: true
			  },
			  'reg_pass': {
				  required:true,
				  minlength:7,
				  maxlength:15
			  }
			  },
			  submitHandler: function(form) {
				  $(form).ajaxSubmit({
					  success:function(data) {
						  
						  if (data =='true')
						  {
							  $('#blockLayerText_register').fadeOut(300,function() {
								  $('#message-reg').addClass('reg_message_good').fadeIn(400).html('Вы успешно зарегестрированы!');
								  $('#form_submit').hide();
								  $('#auth').show();
					              $('#blockLayerText_register').hide();
							  });
						  }
							  else
							  {
								  $('#message-reg').addClass('reg_message_error').fadeIn(400).html(data);
								  alert(data);
							  }
						  }
					  });
				  }
			  });
	  });