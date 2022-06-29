
 $(document).ajaxStop(function(){
	console.debug("ajaxStop");
	$("#ajax_loader").hide();
 });
 $(document).ajaxStart(function(){
	 console.debug("ajaxStart");
	 $("#ajax_loader").show();
 });
		 
				
function Get_Les_annees(){
	
			$.ajax({
					url : `${base_url}lister-annee-academique`,
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'log'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : (code_html) => {
					   $("#value_annee").html(code_html);
				   }
				});
	
}

function Add_anneeAcademique(){
	if($('#anneeacad').val()==""){
		AlertMessa(msg_erreur_annee);
	}else{
		$.ajax({
					url : `${base_url}parser`,
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'anneeacad'		: $("#anneeacad").val(),
					'session1'	 	: $("#session1").val(),
					'session2'	 	: $("#session2").val(),
					'session3'	 	: $("#session3").val(),
					'session4'	 	: $("#session4").val(),
					'add_anneeacad'	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						Get_Les_annees();
					}
				});
	}
}


function Delete_anneeAcademique(titre,id){
					$("#title-message").html(titre);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Supprimer",
								"class" : "btn btn-danger btn-minier",
								click: function() {
			$.ajax({
					url : base_url+'parser',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'idannee'		: id,
					'delannee'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						Get_Les_annees();
					}
				});								
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Fermer",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});

}


function Active_anneeAcademique(id,periode){
	
	$("#title-message").html("Je veux activer cette année académique: ");			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '550',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-save bigger-110'></i>&nbsp; Pour toute l'école",
								"class" : "btn btn-danger btn-minier",
								click: function() {
									//
		$.ajax({
			url : base_url+'parser',
			type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			data: { 
			'idannee'		: id,
			'activee'	 	: 'ok'
		  },
		  
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				//Get_Les_annees();
				window.location.replace('app');
			}
		});
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-save bigger-110'></i>&nbsp; Pour moi seulement",
								"class" : "btn btn-info btn-minier",
								click: function() {
									//
$.ajax({
			url : base_url+'parser',
			type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			data: { 
			'idannee_periode'		: periode,
			'activee'	 			: 'ok'
		  },
		  
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				//Get_Les_annees();
				window.location.replace('app');
			}
		});									
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Fermer",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
}

