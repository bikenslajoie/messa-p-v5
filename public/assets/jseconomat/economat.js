
 $(document).ajaxStop(function(){
	console.debug("ajaxStop");
	$("#ajax_loader").hide();
 });
 $(document).ajaxStart(function(){
	 console.debug("ajaxStart");
	 $("#ajax_loader").show();
 });
		 

function DeletePaiement(id, etudiant){
					$("#title-message").html(msg_delete);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-trash bigger-110'></i>&nbsp; "+btn_delete,
								"class" : "btn btn-danger btn-minier",
								click: function() {
									//=============================
$.ajax({
		url : base_url+'parser',
		type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
		data: { 
		'MM_delete_paiement'	: 'ok',
		'idpaie'				: id
	  },
	  
	   dataType : 'html', // On désire recevoir du HTML
	   success : function(code_html, statut){ // code_html contient le HTML renvoyé
			window.location.replace(base_url+'paiement-eleve/'+etudiant);
	   }
	});									
									
									//=============================
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; "+btn_close,
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});

}

function DeletePaiementAnticiper(id, etudiant){
					$("#title-message").html(msg_delete);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-trash bigger-110'></i>&nbsp; "+btn_delete,
								"class" : "btn btn-danger btn-minier",
								click: function() {
									//=============================
			$.ajax({
					url : base_url+'parser',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'MM_delete_paiement'	: 'ok',
					'idpaie'				: id
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						window.location.replace(base_url+'paiement-anticipe/'+etudiant);
				   }
				});									
									
									//=============================
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; "+btn_close,
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});

}