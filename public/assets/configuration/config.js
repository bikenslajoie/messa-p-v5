
 $(document).ajaxStop(function(){
	console.debug("ajaxStop");
	$("#ajax_loader").hide();
 });
 $(document).ajaxStart(function(){
	 console.debug("ajaxStart");
	 $("#ajax_loader").show();
 });
		 
				
function Get_Les_disciplines(){
	
			$.ajax({
					url : base_url+'ecoles/configuration/lst_discipline',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'log'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						$("#data_discipline").html(code_html);
					}
				});
	
}

function Ajouter_discipline(){
	if($("#libelle").val()==""){
		AlertMessa(msg_obligatoire);
	}else if($("#ordre").val()==""){
		AlertMessa(msg_obligatoire);
	}else{
		$.ajax({
					url : base_url+'parser',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'libelle'	 		: $("#libelle").val(),
					'ordre'	 			: $("#ordre").val(),
					'add_discipline'	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						$("#libelle").val("");
						$("#ordre").val("");
						Get_Les_disciplines();
					}
				});
	}
}

function Delete_discipline(titre,id){
					$("#title-message").html(titre);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp;"+btn_delete,
								"class" : "btn btn-danger btn-minier",
								click: function() {
			$.ajax({
					url : base_url+'parser',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'idfac_del'		: id,
					'delfac'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						if(code_html=="no"){
							AlertMessa("Cette discipline a des matières.");
						}else{
							Get_Les_disciplines();
						}
						
					}
				});								
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

function Update_discipline(id){

	$.ajax({
		url : base_url+'parser',
		type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
		data: { 
		'idfac'	 		: id,
		'libelle'	 	: $("#libelle"+id).val(),
		'ordre'	 		: $("#ordre"+id).val(),
		'information'	: $("#information"+id).val(),
		'codedoralya'	: $("#codedoralya"+id).val()
	  },
	  
	   dataType : 'html', // On désire recevoir du HTML
	   success : function(code_html, statut){ // code_html contient le HTML renvoyé
			$("#btn_save"+id).removeClass( "show" );
			$("#btn_save"+id).addClass( "hide" );
		}
	});
	
}

function View(id){
	$("#btn_save"+id).removeClass( "hide" );
	$("#btn_save"+id).addClass( "show" );
}


function Get_Les_matieres(){
	
			$.ajax({
					url : base_url+'ecoles/configuration/lst_matiere',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'log'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						$("#data_matiere").html(code_html);
					}
				});
	
}

function Save_matiere(id){
			$.ajax({
			url : base_url+'parser',
			type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			data: { 									
			'libelle'			: $('#libelle'+id).val(),
			'coeff'				: $('#coeff'+id).val(),
			'ordre'				: $('#ordre'+id).val(),
			'lecours'			: id,
			'MM_Mod_un_cours'	: 'ok'
		  },
		  
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				$("#btn_save_matiere"+id).removeClass( "show" );
				$("#btn_save_matiere"+id).addClass( "hide" );
		   }
		});
}

function Modifier_cours(id){
	$("#btn_save_matiere"+id).removeClass( "hide" );
	$("#btn_save_matiere"+id).addClass( "show" );
}

function add_matiere(){
	if($('#matiere').val()==""){
		AlertMessa(msg_obligatoire);
	}else if($('#coff').val()==""){
		AlertMessa(msg_obligatoire)
	}else if($('#idfac2').val()==""){
		AlertMessa(msg_obligatoire);
	}else{
		
		
		$.ajax({
		url : base_url+'parser',
		type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
		data: { 
		'coff'	 		: $('#coff').val(),
		'matiere'	 	: $('#matiere').val(),
		'idfac2'	 	: $('#idfac2').val(),
		'dup'			: $('#dup').val(),
		'add_cours'		: "ok"
	  },
	  
	   dataType : 'html', // On désire recevoir du HTML
	   success : function(code_html, statut){ // code_html contient le HTML renvoyé
			$('#coff').val("");
			$('#matiere').val("");
			$('#idfac2').val("");
			$('#dup').val("");
			Get_Les_matieres();			
		}
	});
		
	}
}


function Delete_matiere(titre,id){
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
					'idcours'		: id,
					'delcours'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						Get_Les_matieres();
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


function Get_Les_classes(){
	
			$.ajax({
					url : base_url+'ecoles/configuration/lst_classe',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'log'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						$("#data_classe").html(code_html);
					}
				});
	
}


function Modifier_classe(id){
	$("#btn_save_classe"+id).removeClass( "hide" );
	$("#btn_save_classe"+id).addClass( "show" );
}

function Save_classe(id){
			$.ajax({
			url : base_url+'parser',
			type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			data: { 									
			'gp'			: $('#gp'+id).val(),
			'ord'			: $('#ord'+id).val(),
			'b1'			: $('#b1'+id).val(),
			'mp'			: $('#mp'+id).val(),
			'pr'			: $('#pr'+id).val(),
			'insc'			: $('#insc'+id).val(),
			'id'			: id,
			'MM_classe'		: 'ok'
		  },
		  
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				$("#btn_save_classe"+id).removeClass( "show" );
				$("#btn_save_classe"+id).addClass( "hide" );
		   }
		});
}

function get_les_montants_economat(){

			$.ajax({
					url : base_url+'ecoles/configuration/lst_economat',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'classe'	: $('#classe').val(),
					'log'	 	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						$("#data_economat").html(code_html);
					}
				});
	
}


function ajouter_economat(){
	if($('#classe').val() == ""){
		AlertMessa(msg_obligatoire);
	}else if($('#desc').val()==""){
		AlertMessa(msg_obligatoire);
	}else if($('#montant').val() == ""){
		AlertMessa(msg_obligatoire);
	}else if($('#monnaie').val() == ""){
		AlertMessa(msg_obligatoire);
	}else{
			$.ajax({
					url : base_url+'ecoles/configuration/ajout_economat',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'anneeacad'		: $('#anneeacad').val(),
					'classe'		: $('#classe').val(),
					'desc'			: $('#desc').val(),
					'montant'		: $('#montant').val(),
					'monnaie'		: $('#monnaie').val(),
					'dup'			: $('#dup').val(),
					'add_economat'	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						get_les_montants_economat();
					}
				}); 
	}

	
}


function save_economat(id){
	var debut = "<economat>";	
	var fin = "</economat>"; 
	
	 var arr = id.split(';');
	 var el = "";
	 for(t=0;t<arr.length;t++){
		 if(arr[t] != ""){
	el +="<info> \
			<idconfig_eco>"+arr[t]+"</idconfig_eco>  \
			<description>"+$('#description'+arr[t]).val()+"</description>  \
			<montant>"+$('#montant'+arr[t]).val()+"</montant>  \
			<monnaie>"+$('#monnaie'+arr[t]).val()+"</monnaie>  \
			<b11>"+$('#b11'+t).val()+"</b11>  \
			<b10>"+$('#b10'+arr[t]).val()+"</b10>  \
			<ordre>"+$('#ordre'+arr[t]).val()+"</ordre>  \
		</info>";
		 }		 
	 }
	
	 $.ajax({
					url : base_url+'ecoles/configuration/save_economat',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'xml'			: debut+el+fin,
					'save_economat'	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						get_les_montants_economat();
					}
				});
}


function Delete_ajax(titre,id,action){	
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
					url : base_url+'ecoles/configuration/delete_economat',
					type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
					data: { 
					'id'			: id,
					'delecoconfig'	: 'ok'
				  },
				  
				   dataType : 'html', // On désire recevoir du HTML
				   success : function(code_html, statut){ // code_html contient le HTML renvoyé
						get_les_montants_economat();
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

function SyncEconomat(annee,classe,laclassetext){
	
			$("#title-message").html("Voulez-vous réinitialiser les dettes des élèves de la classe: "+laclassetext+" ?");			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-cogs bigger-110'></i>&nbsp; Synchroniser",
								"class" : "btn btn-success btn-minier",
								click: function() {
																
									
								$.ajax({
									url : base_url+'parser',
									type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									data: { 
									'MM_ResetEconomat'	: 'ok',
									'annee'				: annee,
									'classe'			: classe
								  },
								  
								   dataType : 'html', // On désire recevoir du HTML
								   success : function(code_html, statut){ // code_html contient le HTML renvoyé
									   AlertMessa("Economat synchronisé avec succès.");
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








