
 $(document).ajaxStop(function(){
	console.debug("ajaxStop");
	$("#ajax_loader").hide();
 });
 $(document).ajaxStart(function(){
	 console.debug("ajaxStart");
	 $("#ajax_loader").show();
 });
		 
function FormationClasse(){
	
	$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_lstPromo'				: 'ok', 
				'classe'					: $('#classe').val(),
				'groupeleve'				: $('#groupeleve').val(),
				'anneeacad'					: $('#anneeacad').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				    
					$("#lstformationclasse").html(code_html);
					
			   }
			});	
			
}

function liste_search_eleve(){
	$.ajax({
			   url : base_url+'ecoles/eleve/recherche_eleve_2',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_post_cle'			: 'ok',
				'annee_ajax' 			: $('#annee_ajax').val(),
				'cle'					: $('#cle').val()	
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				    
					$("#les_elements").html(code_html);
					
			   }
			});
}

$("#btn_etabfre").click(function(){
    var idetuajax 	= document.getElementById("idetuajax").value;
	var typeetude 	= document.getElementById("te").value;
	var etabfre 	= document.getElementById("etabfre").value;
    var lieu 		= document.getElementById("lieu").value;
    var dateetat 	= document.getElementById("dateetat").value;
	var niveau 		= document.getElementById("niveau").value;
	var mention 	= document.getElementById("mention").value;

	if(typeetude=='' || etabfre=='' || niveau==''){
		AlertMessa(msg_obligatoire);
	}else{
	$.ajax({
       url : base_url+'parser',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
	   data: { 
        'idetuajax': idetuajax, 
        'typeetude': typeetude,
		'etabfre'  : etabfre,
		'lieu'     : lieu,
		'dateetat' : dateetat,
		'niveau'   : niveau,
		'mention'  : mention		
      },
	   
       dataType : 'html', // On désire recevoir du HTML
       success : function(code_html, statut){ // code_html contient le HTML renvoyé
		   $("#tableetab").html(code_html);
       }
    });
	
	document.getElementById("te").value="";
	document.getElementById("etabfre").value="";
    document.getElementById("lieu").value="";
    document.getElementById("dateetat").value="";
	document.getElementById("niveau").value="";
	document.getElementById("mention").value="";
	
	}

   
   
});


function DeleteEtab(id){
	var idetuajax 	= document.getElementById("idetuajax").value;	
					$("#title-message").html(msg_delete);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; "+btn_delete,
								"class" : "btn btn-danger btn-minier",
								click: function() {
									
									
									$.ajax({
									   url : base_url+'parser',
									   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									   data: { 
										'iddiplome' : id,
										'idetuajax' : idetuajax,
										'del'       : 'ok'		
									  },
									   
									   dataType : 'html', // On désire recevoir du HTML
									   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										  $("#tableetab").html(code_html);
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

  function DeleteParent(id){

					var idetuajax 	= document.getElementById("idetuajax").value;	
					$("#title-message").html(msg_delete);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; "+btn_delete,
								"class" : "btn btn-danger btn-minier",
								click: function() {
									
									
									$.ajax({
									   url : base_url+'parser',
									   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									   data: { 
										'idparent' 	: id,
										'idetuajax' : idetuajax,
										'delparent' : 'ok'		
									  },
									   
									   dataType : 'html', // On désire recevoir du HTML
									   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										   $("#lstpersonneresp").html(code_html);
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


  function DeleteMatiereClassePromo(idcours, annee, idprogramme, ideleve){

					var idetuajax 	= document.getElementById("idetuajax").value;	
					$("#title-message").html('Voulez-vous supprimer cette matière pour tous les élèves de cette classe?');			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '420',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; "+btn_delete,
								"class" : "btn btn-danger btn-minier",
								click: function() {
																		
									$.ajax({
									   url : base_url+'parser',
									   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									   data: { 
										'idcours' 		: idcours,
										'annee' 		: annee,
										'idprogramme' 	: idprogramme,
										'ideleve' 		: ideleve,
										'delcours_classe_programme' : 'ok'		
									  },
									   
									   dataType : 'html', // On désire recevoir du HTML
									   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										  window.location.replace(base_url+'modifier-eleve/'+ideleve);
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


  function UpdateParent(id){

		$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'idparent' 	: id,
				'UpParent'  : 'ok'		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				   //$("#lstpersonneresp").html(code_html);
				   
				   $("#btn_personneRes").removeClass( "show" );
				   $("#btn_personneRes").addClass( "hide" );

				   $(".bk_save").removeClass( "hide" );
				   $(".bk_save").addClass( "show" );

				   

				   var xmlDoc = $.parseXML( code_html ); 

					var $xml = $(xmlDoc);

					var $person = $xml.find("code");

					$person.each(function(){

					    var id  	= $(this).find('id').text(),
					        nom 	= $(this).find('nom').text(),
					        prenom 	= $(this).find('prenom').text(),
					        idetud 	= $(this).find('idetud').text(),
					        email 	= $(this).find('email').text(),
					        telephone = $(this).find('telephone').text(),
					        lien_parente = $(this).find('lien_parente').text(),
					        adressepostale = $(this).find('adressepostale').text(),
					        information = $(this).find('information').text(),
					        occupation 	= $(this).find('occupation').text(),
					        pin 		= $(this).find('pin').text(),
					        codedoralya = $(this).find('codedoralya').text();

					        $("#nomt").val( nom );
					        $("#prenomt").val( prenom );
					        $("#emailt").val( email );
					        $("#telt").val( telephone );
					        $("#lient").val( lien_parente );
					        $("#telt").val( telephone );
					        $("#adresset").val( adressepostale );
					        $("#infot").val( information );
					        $("#idpersonne").val( id );

					});



			   }
			});
}


$(function(){
	 
	 $('#btn_personneRes_save').click(function(){
		
		
		if($('#nomt').val()=='' || $('#prenomt').val()=='' || $('#lient').val()==''){
			AlertMessa(msg_obligatoire);
		}
		else{
		
			$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_personneresponsable_save'	: 'ok', 
				'id'							: $('#idpersonne').val(),
				'idetuajax'						: $('#idetuajax').val(),
				'nom'							: $('#nomt').val(),
				'prenom'						: $('#prenomt').val(),
				'email'							: $('#emailt').val(),
				'tel'							: $('#telt').val(),
				'lien'							: $('#lient').val(),
				'adresse'						: $('#adresset').val(),
				'info'							: $('#infot').val()			
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				    
					$("#lstpersonneresp").html(code_html);
					
			   }
			});		
			
	document.getElementById("nomt").value="";
    document.getElementById("prenomt").value="";
    document.getElementById("emailt").value="";
	document.getElementById("telt").value="";
	document.getElementById("lient").value="";
	document.getElementById("adresset").value="";
    document.getElementById("infot").value="";

    $("#btn_personneRes").removeClass( "hide" );
	$("#btn_personneRes").addClass( "show" );

	$(".bk_save").removeClass( "show" );
	$(".bk_save").addClass( "hide" );

		}
				
		
	  });
  });




function creation_groupe(monchamps1,monchamps2,combo1){
	
	$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'legroupe'	: $('#addgroupe').val()	
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				    

			$('#'+combo1).empty();
			$('#'+combo1).append(code_html);
			$('#'+combo1).trigger("chosen:updated");
			$('#addgroupe').val('');
			
			Hide(monchamps1,monchamps2);
					
			   }
			});	
			
}


$("#inscrire").click(function(){
    
	var idetuajax 			= document.getElementById("idetuajax").value;
	var lclasse   			= document.getElementById("lclasse").value;
	var groupeleve   		= document.getElementById("groupeleve").value;
	var annee_academique   	= document.getElementById("annee_academique").value;
	
	
	if(lclasse=='' || groupeleve==''){
		AlertMessa(msg_obligatoire);
	}else{
		
		
		//============================
		$("#title-message").html(msg_confirmation);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-plus bigger-110'></i>&nbsp; Inscrire",
								"class" : "btn btn-danger btn-minier",
								click: function() {
									//=================
									$.ajax({
									   url : base_url+'parser',
									   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									   data: { 
										'MM_Inscrire'		:'ok',
										'idetuajax'			: idetuajax, 
										'lclasse'			: lclasse,
										'groupeleve'  		: groupeleve,
										'annee_academique' 	: annee_academique	
									  },
									   
									   dataType : 'html', // On désire recevoir du HTML
									   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										   $("#tablepromo").html(code_html);
									   }
									});
								
									ComboPromo();
									//=================
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
		//============================

		
	}
	
	
});

function AnneeProchaine(annee, etat){
	
	if(etat == 1){
		var res = annee.split("-");
		$("#annee_academique").val((parseInt(res[0])+1)+'-'+(parseInt(res[1])+1));
		document.getElementById("bt_back").style.display = "block";	
		document.getElementById("next").style.display = "none";	
	}else{
		var res = annee.split("-");
		$("#annee_academique").val(annee);
		document.getElementById("bt_back").style.display = "none";	
		document.getElementById("next").style.display = "block";	
	}
}

function ComboPromo(){
	var idetuajax 			= document.getElementById("idetuajax").value;
	$.ajax({
		   url : base_url+'parser',
		   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
		   data: { 
			'MM_ReloadCombo'	:'ok',
			'idetuajax'			: idetuajax	
		  },
		   
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
			    
				$('#anneepromoid').empty(); //remove all child nodes		
				var newOption = code_html;
				$('#anneepromoid').append(newOption);
				$('#anneepromoid').trigger("chosen:updated");
				
				//====================
				EtudPaie();
			   
		   }
		});
		
		return "ok";
}


function EtudPaie() {

			$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_paiementEtud'	: 'ok', 
				'annee_ajax'		: $('#annee_ajax').val(), 
				'idetuajax'			: $('#idetuajax').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				   //document.getElementById("tablepaiementetu").innerHTML = code_html;
				   $("#tablepaiementetu").html(code_html);
				   
			   }
			});
	 
}

$('#anneepromoid').on('change', function () {
     if($('#anneepromoid').val()==""){
	   }else{
			$.ajax({
			   url : base_url+'ecoles/Eleve/get_bulletin_eleve',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'idpromotion': $('#anneepromoid').val(), 
				'codedoralya': $('#codedoralyaentete').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				   	   var result = code_html.split('_BIKENS_');
					
		$("#tablebulletin").html(result[0]);
		$('#pp').empty(); //remove all child nodes		
		var newOption = result[1];
		$('#pp').append(newOption);
		$('#pp').trigger("chosen:updated");
			   }
			});
		 
	 }
});


$('#anneepromoid2').on('change', function () {
     if($('#anneepromoid2').val()==""){
	   }else{
			$.ajax({
			   url : base_url+'ecoles/Eleve/get_bulletin_eleve',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'idpromotion2': $('#anneepromoid2').val(), 
				'codedoralya': $('#codedoralyaentete').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				  
				   $("#tablebulletin2").html(code_html);
				
			   }
			});
			 
	 }
});

function DeletePromo(id){
		var idetuajax 	= document.getElementById("idetuajax").value;
					$("#title-message").html(msg_delete);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; "+btn_delete,
								"class" : "btn btn-danger btn-minier",
								click: function() {
									
									
									$.ajax({
									   url : base_url+'parser',
									   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									   data: { 
										'idpromolst' : id,
										'idetuajax'	 : idetuajax,
										'MM_promo'   : 'ok',
										'del'        : 'ok'		
									  },
									   
									   dataType : 'html', // On désire recevoir du HTML
									   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										   //document.getElementById("tablepromo").innerHTML = code_html;
										   $("#tablepromo").html(code_html);
									   }
									});
									
									
									ComboPromo();
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


function PosteGroupeEtu(id){

		$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_updategp'	:'ok', 
				'idp'			: id,
				'groupep'		: $('#elgroupe'+id).val(),
				'groupep2'		: $('#elsgroupe'+id).val(),
				'annee'			: $('#lannee'+id).val(),
				'mat'			: $('#matricule'+id).val(),
				'ext_int'		: $('#ext_int'+id).val()
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
	
			   }
			});	
	
	if($('#elgroupe'+id).val()==""){
		$('#elgroupe'+id).val('---');
	}
	
}	


function fermerDossier(id,etat,action,idp){
		
					if(etat=='0'){
						$("#title-message").html(msg_ouvrir_dossier);
					}else{
						$("#title-message").html(msg_fermer_dossier);		
					}
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-check bigger-110'></i>&nbsp; "+btn_yes,
								"class" : "btn btn-success btn-minier",
								click: function() {
									
									
									$.ajax({
									   url : base_url+'parser',
									   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									   data: { 
										'etat'				: etat,
										'id_pp_close'		: idp,
										'id'				: id,
										'MM_close_dossier'  : 'ok'	
									  },
									   
									   dataType : 'html', // On désire recevoir du HTML
									   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										   if(action=='list'){
											 window.location.replace(base_url+"liste-eleve");
										   }else{
											 FormationClasse();  
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

$(function(){
	 
	 $('#btn_personneRes').click(function(){
		
		
		if($('#nomt').val()=='' || $('#prenomt').val()=='' || $('#lient').val()==''){
			AlertMessa(msg_obligatoire);
		}
		else{
		
			$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_personneresponsable'	: 'ok', 
				'idetuajax'					: $('#idetuajax').val(),
				'nom'						: $('#nomt').val(),
				'prenom'					: $('#prenomt').val(),
				'email'						: $('#emailt').val(),
				'tel'						: $('#telt').val(),
				'lien'						: $('#lient').val(),
				'adresse'					: $('#adresset').val(),
				'info'						: $('#infot').val()			
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				    
					$("#lstpersonneresp").html(code_html);
					
			   }
			});		
			
	document.getElementById("nomt").value="";
    document.getElementById("prenomt").value="";
    document.getElementById("emailt").value="";
	document.getElementById("telt").value="";
	document.getElementById("lient").value="";
	document.getElementById("adresset").value="";
    document.getElementById("infot").value="";


		}
				
		
	  });
  });

function MailMessageEleve(id){
	
	if($('#sujet').val()==""){
		AlertMessa(msg_titre_message);
	}else{//$('#message').val()==""
		if(CKEDITOR.instances.message.getData()==""){
			AlertMessa(msg_message);
		}else{
			$("#title-message").html(msg_email);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-save bigger-110'></i>&nbsp; "+btn_send,
								"class" : "btn btn-success btn-minier",
								click: function() {
																
									
								$.ajax({
									url : base_url+'parser',
									type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									data: { 
									'MM_SendMailEleve'	: 'ok',
									'id'				: id,
									'message'			: CKEDITOR.instances.message.getData(),
									'sujet'				: $('#sujet').val()
								  },
								  
								   dataType : 'html', // On désire recevoir du HTML
								   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										$("#dmessage").removeClass( "hide" );
										$("#dmessage").addClass( "show" );		
								   }
								});
									
								$.ajax({
									url : base_url+'parser',
									type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									data: { 
									'MM_save_file4'	: 'ok',
									'classe'		: $('#idclasse').val()+'___'+$('#classe').val(),
									'desc'			: $('#sujet').val(),
									'idetudiants'	: id,
									'groupeleve'	: '---',
									'lien'			: CKEDITOR.instances.message.getData()
								  },
								  
								   dataType : 'html', // On désire recevoir du HTML
								   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										//window.location.replace(base_url+'message-off');
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
	}
	
}
  
 function MailMessage(idclasse, gp){
	if($('#sujet').val()==""){
		AlertMessa(msg_obligatoire);
	}else{
		if(CKEDITOR.instances.message.getData()==""){
			AlertMessa(msg_obligatoire);
		}else{
			$("#title-message").html(msg_confirmation);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-save bigger-110'></i>&nbsp; Envoyer",
								"class" : "btn btn-success btn-minier",
								click: function() {

								$.ajax({
									url : base_url+'parser',
									type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									data: { 
									'MM_save_file3'	: 'ok',
									'classe'		: idclasse+'___'+$('#libelle').val(),
									'desc'			: $('#sujet').val(),
									'groupeleve'	: gp,
									'lien'			: CKEDITOR.instances.message.getData()
								  },
								  
								   dataType : 'html', // On désire recevoir du HTML
								   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										//window.location.replace(base_url+'message-off');
								   }
								});

								$.ajax({
										url : base_url+'parser',
										type : 'POST', // Le type de la requête HTTP, ici devenu POST      
										data: { 
										'MM_SendMail'   : 'ok',
										'idclasse'      : idclasse,
										'gp'            : gp,
										'annee'         : $('#annee_ajax').val(),
										'message'       : CKEDITOR.instances.message.getData(), //CKEDITOR.instances['message'].getData(),
										'sujet'         : $('#sujet').val()
									  },
									  
									   dataType : 'html', // On désire recevoir du HTML
									   success : function(code_html, statut){ // code_html contient le HTML renvoyé
											//AlertMessa("Message envoyé avec succès."); 
											$("#dmessage").removeClass( "hide" );
										$("#dmessage").addClass( "show" );	                                        
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
	}
	
}

function MessageTxt(titre, lien){
	let msg = '';
	msg = '<p>Bonjour,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; vous avez re&ccedil;u un document.</p><p style="font-size: 16px; font-weight: bold">Titre: '+titre+'</p><a href="'+lien+'" target="_blank"><p style="border: solid; width:60%; padding: 10px; font-size: 16px; text-align: center">Cliquer ici pour afficher le document.</p></a>';
	//msg = 'hello';
	return msg;
}

function MailMessageLink(id){
	
	if($('#sujet').val()==""){
		AlertMessa(msg_titre_message);
	}else{//$('#message').val()==""
		$("#title-message").html(msg_email);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Confirmation</h4></div>",
						title_html: true,
						
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-save bigger-110'></i>&nbsp; "+btn_send,
								"class" : "btn btn-success btn-minier",
								click: function() {
									

									var array = id.split(',');

								
						for (let i = 0; i < array.length; i++) {
								 	
								 if(array[i] != ''){
								 		 		
								 if($('#lien'+array[i]).val() != ''){

								 			
								//===========================
								
								$.ajax({
									url : base_url+'parser',
									type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									data: { 
									'MM_SendMailEleve'	: 'ok',
									'id'				: array[i],
									'message'			: MessageTxt($('#sujet').val(), $('#lien'+array[i]).val()),
									'sujet'				: $('#sujet').val()
								  },
								  
								   dataType : 'html', // On désire recevoir du HTML
								   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										$("#dmessage").removeClass( "hide" );
										$("#dmessage").addClass( "show" );		
								   }
								});
									
								$.ajax({
									url : base_url+'parser',
									type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									data: { 
									'MM_save_file4'	: 'ok',
									'classe'		: $('#idclasse').val()+'___'+$('#classe').val(),
									'desc'			: $('#sujet').val(),
									'idetudiants'	: array[i],
									'groupeleve'	: $('#groupe').val(),
									'lien'			: MessageTxt($('#sujet').val(),$('#lien'+array[i]).val())
								  },
								  
								   dataType : 'html', // On désire recevoir du HTML
								   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										//window.location.replace(base_url+'message-off');
								   }
								});
								
								

								//===========================



								 		}


								 	}
								}
									
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
	
}




function PosterNotePre(id){
	
	var n1 	= document.getElementById("p1"+id) ? document.getElementById("p1"+id).value  : "";
	var n2 	= document.getElementById("p2"+id) ? document.getElementById("p2"+id).value  : "";
    var n3 	= document.getElementById("p3"+id) ? document.getElementById("p3"+id).value  : "";
    var n4 	= document.getElementById("p4"+id) ? document.getElementById("p4"+id).value  : "";
	var n5 	= document.getElementById("p5"+id) ? document.getElementById("p5"+id).value  : "";
	var n6 	= document.getElementById("p6"+id) ? document.getElementById("p6"+id).value  : "";
    var n7 	= document.getElementById("p7"+id) ? document.getElementById("p7"+id).value  : "";
	var n8 	= document.getElementById("p8"+id) ? document.getElementById("p8"+id).value  : "";
    var n9 	= document.getElementById("p9"+id) ? document.getElementById("p9"+id).value  : "";
    var n10 = document.getElementById("p10"+id) ? document.getElementById("p10"+id).value  : "";
	var n11	= document.getElementById("p11"+id) ? document.getElementById("p11"+id).value  : "";
	var n12	= document.getElementById("p12"+id) ? document.getElementById("p12"+id).value  : "";	

	$.ajax({
		   url : base_url+'parser',
		   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
		   data: { 
			'idbulletin2':id,
			'n1'  : n1, 
			'n2'  : n2,
			'n3'  : n3,
			'n4'  : n4,
			'n5'  : n5,
			'n6'  : n6,
			'n7'  : n7,
			'n8'  : n8, 
			'n9'  : n9,
			'n10' : n10,
			'n11' : n11,
			'n12' : n12		
		  },	   
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
			
		   }
		});
		
}

function NoteAppreciation(annee,prog,idcours,choix){
	
				$("#title-message").html(msg_note_appreciative);			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						resizable: false,
						width: '420',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle info'></i> Confirmation</h4></div>",
						title_html: true,
						buttons: [ 
							{
								html: "<i class='ace-icon fa fa-save bigger-110'></i>&nbsp; "+btn_yes,
								"class" : "btn btn-primary btn-minier",
								click: function() {
										
								$.ajax({
									url : base_url+'parser',
									type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
									data: { 
									'MM_NoteAppreciation'	: 'ok',
									'idclasse'				: prog,
									'annee'					: annee,
									'idcours'				: idcours,
									'idchoix'				: choix
							  },
								  
								   dataType : 'html', // On désire recevoir du HTML
								   success : function(code_html, statut){ // code_html contient le HTML renvoyé
										if(typeof $('#anneepromoid').val() === 'undefined'){}else{
										  $.ajax({
										   url : base_url+'ecoles/Eleve/get_bulletin_eleve',
										   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
										   data: { 
											'idpromotion': $('#anneepromoid').val(), 
											'codedoralya': $('#codedoralyaentete').val()		
										  },
										   
										   dataType : 'html', // On désire recevoir du HTML
										   success : function(code_html, statut){ // code_html contient le HTML renvoyé
											   //document.getElementById("tablebulletin").innerHTML = code_html;
											   //$("#tablebulletin").html(code_html);
											   
											   var result = code_html.split('_BIKENS_');
											   $("#tablebulletin").html(result[0]);
										   }
										});
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
		
		
function PosterMemo(id){


$.ajax({
       url : base_url+'parser',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
	   data: { 
        'idbulletinmemo':id,
		'r1'  : $('#r1'+id).val(), 
        'r2'  : $('#r2'+id).val(),
		'r3'  : $('#r3'+id).val(),
		'r4'  : $('#r4'+id).val(),
		'r5'  : $('#r5'+id).val(),
		'r6'  : $('#r6'+id).val(),
		'r7'  : $('#r7'+id).val(),
        'r8'  : $('#r8'+id).val(), 
        'r9'  : $('#r9'+id).val(),
		'r10' : $('#r10'+id).val(),
		'r11' : $('#r11'+id).val(),
		'r12' : $('#r12'+id).val()		
      },	   
       dataType : 'html', // On désire recevoir du HTML
       success : function(code_html, statut){ // code_html contient le HTML renvoyé
		
       }
    });

}

function PosterMemo2(id){


$.ajax({
       url : base_url+'parser',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
	   data: { 
        'idbulletinmemo2':id,
		'r1'  : $('#rb1'+id).val(), 
        'r2'  : $('#rb2'+id).val(),
		'r3'  : $('#rb3'+id).val(),
		'r4'  : $('#rb4'+id).val(),
		'r5'  : $('#rb5'+id).val(),
		'r6'  : $('#rb6'+id).val(),
		'r7'  : $('#rb7'+id).val(),
        'r8'  : $('#rb8'+id).val(), 
        'r9'  : $('#rb9'+id).val(),
		'r10' : $('#rb10'+id).val(),
		'r11' : $('#rb11'+id).val(),
		'r12' : $('#rb12'+id).val()		
      },	   
       dataType : 'html', // On désire recevoir du HTML
       success : function(code_html, statut){ // code_html contient le HTML renvoyé
		
       }
    });

}

function PosterAbsence(idetudiants, etape, annee_academique, classe, abs){
		
		$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_PosterTotalAbsence'		: 'ok', 
				'idetudiants'				: idetudiants,
				'etape'						: etape,
				'annee_academique'			: annee_academique,
				'classe'					: classe,
				'total'						: $('#'+abs+idetudiants).val()
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
					
			   }
			});	
}

function PosterRetard(idetudiants, etape, annee_academique, classe, ret){
		
		$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_PosterTotalRetard'		: 'ok', 
				'idetudiants'				: idetudiants,
				'etape'						: etape,
				'annee_academique'			: annee_academique,
				'classe'					: classe,
				'total'						: $('#'+ret+idetudiants).val()
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
					
			   }
			});	
}

function PosterNotecond(id){
	
	
	var c1 	= document.getElementById("c1"+id) ? document.getElementById("c1"+id).value  : "-1000";
	var c2 	= document.getElementById("c2"+id) ? document.getElementById("c2"+id).value  : "-1000";
    var c3 	= document.getElementById("c3"+id) ? document.getElementById("c3"+id).value  : "-1000";
    var c4 	= document.getElementById("c4"+id) ? document.getElementById("c4"+id).value  : "-1000";
	var c5 	= document.getElementById("c5"+id) ? document.getElementById("c5"+id).value  : "-1000";
	var c6 	= document.getElementById("c6"+id) ? document.getElementById("c6"+id).value  : "-1000";
    var c7 	= document.getElementById("c7"+id) ? document.getElementById("c7"+id).value  : "-1000";
	var c8 	= document.getElementById("c8"+id) ? document.getElementById("c8"+id).value  : "-1000";
    var c9 	= document.getElementById("c9"+id) ? document.getElementById("c9"+id).value  : "-1000";
    var c10 = document.getElementById("c10"+id) ? document.getElementById("c10"+id).value  : "-1000";
	var c11	= document.getElementById("c11"+id) ? document.getElementById("c11"+id).value  : "-1000";
	var c12	= document.getElementById("c12"+id) ? document.getElementById("c12"+id).value  : "-1000";
	
	if (c1 == "" || c1 == "0" ){c1="-1000"};
	if (c2 == "" || c2 == "0" ){c2="-1000"};
	if (c3 == "" || c3 == "0" ){c3="-1000"};
	if (c4 == "" || c4 == "0" ){c4="-1000"};
	if (c5 == "" || c5 == "0" ){c5="-1000"};
	if (c6 == "" || c6 == "0" ){c6="-1000"};
	if (c7 == "" || c7 == "0" ){c7="-1000"};
	if (c8 == "" || c8 == "0" ){c8="-1000"};
	if (c9 == "" || c9 == "0" ){c9="-1000"};
	if (c10 == "" || c10 == "0" ){c10="-1000"};
	if (c11 == "" || c11 == "0" ){c11="-1000"};
	if (c12 == "" || c12 == "0" ){c12="-1000"};


$.ajax({
       url : base_url+'parser',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
	   data: { 
        'idbulletinc':id,
		'c1'  : c1, 
        'c2'  : c2,
		'c3'  : c3,
		'c4'  : c4,
		'c5'  : c5,
		'c6'  : c6,
		'c7'  : c7,
        'c8'  : c8, 
        'c9'  : c9,
		'c10' : c10,
		'c11' : c11,
		'c12' : c12		
      },	   
       dataType : 'html', // On désire recevoir du HTML
       success : function(code_html, statut){ // code_html contient le HTML renvoyé
		
       }
    });
	
}


function PosterNoteBlanc(id){
	
	var cof = document.getElementById("coef"+id).value;
	
	var e1 	= document.getElementById("ap1"+id) ? document.getElementById("ap1"+id).value  : "-1000";
	var e2 	= document.getElementById("ap2"+id) ? document.getElementById("ap2"+id).value  : "-1000";
    var e3 	= document.getElementById("ap3"+id) ? document.getElementById("ap3"+id).value  : "-1000";
    var e4 	= document.getElementById("ap4"+id) ? document.getElementById("ap4"+id).value  : "-1000";
	var e5 	= document.getElementById("ap5"+id) ? document.getElementById("ap5"+id).value  : "-1000";
	var e6 	= document.getElementById("ap6"+id) ? document.getElementById("ap6"+id).value  : "-1000";
    var e7 	= document.getElementById("ap7"+id) ? document.getElementById("ap7"+id).value  : "-1000";
	var e8 	= document.getElementById("ap8"+id) ? document.getElementById("ap8"+id).value  : "-1000";
    var e9 	= document.getElementById("ap9"+id) ? document.getElementById("ap9"+id).value  : "-1000";
    var e10 = document.getElementById("ap10"+id) ? document.getElementById("ap10"+id).value  : "-1000";
	var e11	= document.getElementById("ap11"+id) ? document.getElementById("ap11"+id).value  : "-1000";
	var e12	= document.getElementById("ap12"+id) ? document.getElementById("ap12"+id).value  : "-1000";
	
	if (e1 == ""){e1="-1000"};
	if (e2 == ""){e2="-1000"};
	if (e3 == ""){e3="-1000"};
	if (e4 == ""){e4="-1000"};
	if (e5 == ""){e5="-1000"};
	if (e6 == ""){e6="-1000"};
	if (e7 == ""){e7="-1000"};
	if (e8 == ""){e8="-1000"};
	if (e9 == ""){e9="-1000"};
	if (e10 == ""){e10="-1000"};
	if (e11 == ""){e11="-1000"};
	if (e12 == ""){e12="-1000"};
	

$.ajax({
       url : base_url+'parser',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
	   data: { 
        'idbulletinblanc':id,
		'e1'  : e1, 
        'e2'  : e2,
		'e3'  : e3,
		'e4'  : e4,
		'e5'  : e5,
		'e6'  : e6,
		'e7'  : e7,
        'e8'  : e8, 
        'e9'  : e9,
		'e10' : e10,
		'e11' : e11,
		'e12' : e12		
      },	   
       dataType : 'html', // On désire recevoir du HTML
       success : function(code_html, statut){ // code_html contient le HTML renvoyé
		
       }
    });

}		



function PosterNote(id){
	
	var cof = document.getElementById("coef"+id).value;
	
	var e1 	= document.getElementById("p1"+id) ? document.getElementById("p1"+id).value  : "-1000";
	var e2 	= document.getElementById("p2"+id) ? document.getElementById("p2"+id).value  : "-1000";
    var e3 	= document.getElementById("p3"+id) ? document.getElementById("p3"+id).value  : "-1000";
    var e4 	= document.getElementById("p4"+id) ? document.getElementById("p4"+id).value  : "-1000";
	var e5 	= document.getElementById("p5"+id) ? document.getElementById("p5"+id).value  : "-1000";
	var e6 	= document.getElementById("p6"+id) ? document.getElementById("p6"+id).value  : "-1000";
    var e7 	= document.getElementById("p7"+id) ? document.getElementById("p7"+id).value  : "-1000";
	var e8 	= document.getElementById("p8"+id) ? document.getElementById("p8"+id).value  : "-1000";
    var e9 	= document.getElementById("p9"+id) ? document.getElementById("p9"+id).value  : "-1000";
    var e10 = document.getElementById("p10"+id) ? document.getElementById("p10"+id).value  : "-1000";
	var e11	= document.getElementById("p11"+id) ? document.getElementById("p11"+id).value  : "-1000";
	var e12	= document.getElementById("p12"+id) ? document.getElementById("p12"+id).value  : "-1000";
	
	if (e1 == ""){e1="-1000"};
	if (e2 == ""){e2="-1000"};
	if (e3 == ""){e3="-1000"};
	if (e4 == ""){e4="-1000"};
	if (e5 == ""){e5="-1000"};
	if (e6 == ""){e6="-1000"};
	if (e7 == ""){e7="-1000"};
	if (e8 == ""){e8="-1000"};
	if (e9 == ""){e9="-1000"};
	if (e10 == ""){e10="-1000"};
	if (e11 == ""){e11="-1000"};
	if (e12 == ""){e12="-1000"};
	//alert(e1);
/*	
	if(e1>cof){
		AlertMessa("Erreur note 1");
		document.getElementById("p1"+id).value = cof;
	}
	
	if(e2>cof){
		AlertMessa("Erreur note 2");
		document.getElementById("p2"+id).value = cof;
	}	
	if(e3>cof){
		AlertMessa("Erreur note 3");
		document.getElementById("p3"+id).value = cof;
	}
	if(e4>cof){
		AlertMessa("Erreur note 4");
		document.getElementById("p4"+id).value = cof;
	}	
	if(e5>cof){
		AlertMessa("Erreur note 5");
		document.getElementById("p5"+id).value = cof;
	}
	if(e6>cof){
		AlertMessa("Erreur note 6");
		document.getElementById("p6"+id).value = cof;
	}	
	if(e7>cof){
		AlertMessa("Erreur note 7");
		document.getElementById("p7"+id).value = cof;
	}
	if(e8>cof){
		AlertMessa("Erreur note 8");
		document.getElementById("p8"+id).value = cof;
	}	
	if(e9>cof){
		AlertMessa("Erreur note 9");
		document.getElementById("p9"+id).value = cof;
	}
	if(e10>cof){
		AlertMessa("Erreur note 10");
		document.getElementById("p10"+id).value = cof;
	}	
	if(e11>cof){
		AlertMessa("Erreur note 11");
		document.getElementById("p1"+id).value = cof;
	}
	if(e12>cof){
		AlertMessa("Erreur note 12");
		document.getElementById("p12"+id).value = cof;
	}	
*/


$.ajax({
       url : base_url+'parser',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
	   data: { 
        'idbulletin':id,
		'e1'  : e1, 
        'e2'  : e2,
		'e3'  : e3,
		'e4'  : e4,
		'e5'  : e5,
		'e6'  : e6,
		'e7'  : e7,
        'e8'  : e8, 
        'e9'  : e9,
		'e10' : e10,
		'e11' : e11,
		'e12' : e12		
      },	   
       dataType : 'html', // On désire recevoir du HTML
       success : function(code_html, statut){ // code_html contient le HTML renvoyé
		
       }
    });
	
}

function ModCours(){

	$.ajax({
	   url : base_url+'parser',
	   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
	   data: { 
		'MM_Mod_leCours' 	: 'ok',
		'idcours' 			: $("#idcours").val(),
		'titre' 			: $("#titre").val()
	  },
	   
	   dataType : 'html', // On désire recevoir du HTML
	   success : function(code_html, statut){ // code_html contient le HTML renvoyé	
		AlertMessa("Modification éffectuée avec succès.");
	   }
	});
	
}

function Ordonner(annee, programme, cours, bulletin){
	//alert(annee+"_"+programme+"_"+cours+"_"+bulletin+"___"+$("#ordre"+bulletin).val());
	$.ajax({
		url : base_url+'parser',
		type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
		data: { 
		'MM_OrdreMatiere'	: 'ok',
		'annee'				: annee,
		'programme'			: programme,
		'cours'				: cours,
		'lordre'			: $("#ordre"+bulletin).val()
	  },
	  
	   dataType : 'html', // On désire recevoir du HTML
	   success : function(code_html, statut){ // code_html contient le HTML renvoyé

	   }
	});
}


function DeletePaiement(id){
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
			EtudPaie();
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

function VersPage(id){
	$.ajax({
		url : base_url+'parser',
		type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
		data: { 
		'MM_versPage'	: 'ok',
		'nopage'		: id
	  },
	  
	   dataType : 'html', // On désire recevoir du HTML
	   success : function(code_html, statut){ // code_html contient le HTML renvoyé
			
	   }
	});
}


function FormationClassePalmaresse(){
$("#tablebulletin").html("");
	$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'MM_lstPromoPalmaresse'		: 'ok', 
				'classe'					: $('#classe').val(),
				'groupeleve'				: $('#groupeleve').val(),
				'anneeacad'					: $('#anneeacad').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				    
					$("#lstpalmaresse").html(code_html);
					
			   }
			});	
			
}

function AfficherBulletin(id){
	
	if($('#btnblanc').is(':checked')==true){
		$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'idpromotion2': id, 
				'codedoralya': $('#codedoralyaentete').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				   //document.getElementById("tablebulletin").innerHTML = code_html;
				   var result = code_html.split('_BIKENS_');				
					$("#tablebulletin").html(result[0]);
			   }
			});
	}else{
			$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'idpromotion': id, 
				'codedoralya': $('#codedoralyaentete').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				   //document.getElementById("tablebulletin").innerHTML = code_html;
				   var result = code_html.split('_BIKENS_');				
					$("#tablebulletin").html(result[0]);
			   }
			});
	}
	
	$('.myCheckbox').prop('checked', false);
	$('#choix'+id).prop('checked', true);
	
}

function AfficherBulletin_access(id, matiere){
	
	if($('#btnblanc').is(':checked')==true){
		$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'idpromotion2_access': id,
				'matiere'	 		 : matiere, 
				'codedoralya': $('#codedoralyaentete').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				   //document.getElementById("tablebulletin").innerHTML = code_html;
				   var result = code_html.split('_BIKENS_');				
					$("#tablebulletin").html(result[0]);
			   }
			});
	}else{
			$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'idpromotion_access'	: id, 
				'matiere'	 			: matiere, 
				'codedoralya'			: $('#codedoralyaentete').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				   //document.getElementById("tablebulletin").innerHTML = code_html;
				   var result = code_html.split('_BIKENS_');				
					$("#tablebulletin").html(result[0]);
			   }
			});
	}
	
	$('.myCheckbox').prop('checked', false);
	$('#choix'+id).prop('checked', true);
	
}


	function ChangeEtat(letat){
			
			switch(letat) {
			  case 'cours':
			   		$( "#bt_cours" ).removeClass( "btn-info" ).addClass( "btn-primary active" );
			   		$( "#gp_cours" ).removeClass( "hide" ).addClass( "show" );

			        $( "#bt_devoir" ).removeClass( "btn-primary active" ).addClass( "btn-info" );
			        $( "#bt_evaluation" ).removeClass( "btn-primary active" ).addClass( "btn-info" );
			        $( "#bt_lecon" ).removeClass( "btn-primary active" ).addClass( "btn-info" );

			        $( "#gp_devoir" ).removeClass( "show" ).addClass( "hide" );
			        $( "#gp_evaluation" ).removeClass( "show" ).addClass( "hide" );
			        $( "#gp_lecon" ).removeClass( "show" ).addClass( "hide" );
			        $( "#type_doc" ).val('cours');
			        
			    break;
			  case 'devoir':
			        $( "#bt_devoir" ).removeClass( "btn-info" ).addClass( "btn-primary active" );
			        $( "#gp_devoir" ).removeClass( "hide" ).addClass( "show" );

			        $( "#bt_cours" ).removeClass( "btn-primary active" ).addClass( "btn-info" );
			        $( "#bt_evaluation" ).removeClass( "btn-primary active" ).addClass( "btn-info" );
			        $( "#bt_lecon" ).removeClass( "btn-primary active" ).addClass( "btn-info" );

			        $( "#gp_cours" ).removeClass( "show" ).addClass( "hide" );
			        $( "#gp_evaluation" ).removeClass( "show" ).addClass( "hide" );
			        $( "#gp_lecon" ).removeClass( "show" ).addClass( "hide" );
			        $( "#type_doc" ).val('devoir');

			    break;
			    case 'evaluation':
			        $( "#bt_evaluation" ).removeClass( "btn-info" ).addClass( "btn-primary active" );
			        $( "#gp_evaluation" ).removeClass( "hide" ).addClass( "show" );

			        $( "#bt_cours" ).removeClass( "btn-primary active" ).addClass( "btn-info" );
			        $( "#bt_devoir" ).removeClass( "btn-primary active" ).addClass( "btn-info" );
			        $( "#bt_lecon" ).removeClass( "btn-primary active" ).addClass( "btn-info" );

			        $( "#gp_cours" ).removeClass( "show" ).addClass( "hide" );
			        $( "#gp_devoir" ).removeClass( "show" ).addClass( "hide" );
			        $( "#gp_lecon" ).removeClass( "show" ).addClass( "hide" );
			        $( "#type_doc" ).val('evaluation');

			    break;
			     case 'lecon':
			        $( "#bt_lecon" ).removeClass( "btn-info" ).addClass( "btn-primary active" );
			        $( "#gp_lecon" ).removeClass( "hide" ).addClass( "show" );

			        $( "#bt_cours" ).removeClass( "btn-primary active" ).addClass( "btn-info" );
			        $( "#bt_devoir" ).removeClass( "btn-primary active" ).addClass( "btn-info" );
			        $( "#bt_evaluation" ).removeClass( "btn-primary active" ).addClass( "btn-info" );

			        $( "#gp_cours" ).removeClass( "show" ).addClass( "hide" );
			        $( "#gp_devoir" ).removeClass( "show" ).addClass( "hide" );
			        $( "#gp_evaluation" ).removeClass( "show" ).addClass( "hide" );
			        $( "#type_doc" ).val('lecon');

			    break;
			  default:
			    // code block
			}
	}




function PosterDecisionAnnuelle(id){
		$('#btn_m_f').html('Please wait ...').attr('disabled','disabled');
		$.ajax({
			   url : base_url+'parser',
			   type : 'POST', // Le type de la requête HTTP, ici devenu POST	   
			   data: { 
				'idpromotion_memo_final'	: id,  
				'memo_final'				: $('#memo_fin_promotion').val()		
			  },
			   
			   dataType : 'html', // On désire recevoir du HTML
			   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				   AlertMessa('Memo posté avec succès.');
				   $('#btn_m_f').html('Sauvegarder la remarque').removeAttr('disabled');
			   }
			});

}


