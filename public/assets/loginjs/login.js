
 $(document).ajaxStop(function(){
	console.debug("ajaxStop");
	$("#ajax_loader").hide();
 });
 $(document).ajaxStart(function(){
	 console.debug("ajaxStart");
	 $("#ajax_loader").show();
 });
		 
				
function ConnectApp(){
			
			$('#btn_connect').prop('disabled', true);
			
			$.ajax({
					url : `${base_url}login-connect`,
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'loginname'	: $('#username').val(),
					'passlogin'	: $('#password').val(),
					'log'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						$('#btn_connect').prop('disabled', false);
					   
					   var str = code_html;
					   //alert(str.trim());
					   if(str.trim()=="ERR_CONN"){
						$( "#erreur" ).removeClass( "hide" ).addClass( "show" );
					   }else if(str.trim()=="1"){
						
						window.location.replace("app");   
					   }
					   
				   }
				});

}

function ConnectOublie(){
			$('#btn_connect').prop('disabled', true);
			$.ajax({
					url : `${base_url}login-connectoublie`,
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'loginname2'	: $('#username').val(),
					'passlogin2'	: $('#password').val(),
					'log'	 		: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						$('#btn_connect').prop('disabled', false);
					   
					   var str = code_html;
					   //alert(str.trim());
					   if(str.trim()=="ERR_CONN"){
						$( "#erreur" ).removeClass( "hide" ).addClass( "show" );
						$( "#bon" ).removeClass( "show" ).addClass( "hide" );
					   }else if(str.trim()=="1"){
						
						$( "#erreur" ).removeClass( "show" ).addClass( "hide" );
						$( "#bon" ).removeClass( "hide" ).addClass( "show" );
					   }


					   
				   }
				});

}

function ResetPassword(){
			//$('#btn_connect').prop('disabled', true);
			$.ajax({
					url : base_url+'login/login/ResetPassword',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'email'				: $('#lemail').val(),
					'Reset_password'	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						
						//$('#btn_connect').prop('disabled', false);
					   alert('ok');
				   }
				});

}


