
 $(document).ajaxStop(function(){
	console.debug("ajaxStop");
	$("#ajax_loader").hide();
 });
 $(document).ajaxStart(function(){
	 console.debug("ajaxStart");
	 $("#ajax_loader").show();
 });

