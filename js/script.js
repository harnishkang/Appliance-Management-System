
function onchangeval(typeval){
		if(typeval == "window"){
			$('.ratewin').text("Rs. " + (parseInt($('.windownoval').val()) * 349))
			$('.chkservwinval').val((parseInt($('.windownoval').val()) * 349))
		}
		if(typeval == "split"){
			$('.ratesplit').text("Rs. " + (parseInt($('.splitnoval').val()) * 399))
			$('.chkservsplitval').val((parseInt($('.splitnoval').val()) * 399))
		}
		
	}

function serviceChange(){
	var idval = $('.serviceChange').children('option:selected').val();
	$.ajax({  
		    type: 'POST',  
		    url: '../admin/getter.php', 
		    data: { idval: idval, pageType: 'subservicesdiv' },
		    dataType: "html",
		    success: function(response) {
				$('.subserviceselected').html("<label for='subservice'>Sub Service</label>"+response);

		    }
		});
	}
function printInvoice(idval){
	$.ajax({  
		    type: 'POST',  
		    url: '../admin/getter.php', 
		    data: { idval: idval, pageType: 'userdashboard' },
		    success: function(response) {
		        location.href='printinvoice'
		    }
		});
}

function feedback(idval,useridval){
	$.ajax({  
		    type: 'POST',  
		    url: '../admin/getter.php', 
		    data: { idval: idval,useridval: useridval,pageType: 'feedback' },
		    success: function(response) {
		        location.href='feedback'
		    }
		});
}
function updateStatus(idval){
	$.ajax({  
		    type: 'POST',  
		    url: '../admin/getter.php', 
		    data: { idval: idval, pageType: 'updateStatus' },
		    success: function(response) {
		    	alert("Record Updated Successfully !!!")
		        location.reload();
		    }
		});
}

function callacrepair(){

	var selectedid = "";
		var selectedul = "<h4>Selected Services : </h4><ul class='list-group list-group-flush selectService'>";
		$('.chk').each(function (index, obj) {
	        if (this.checked === true) {
	            selectedul += "<li class='list-group-item' data-text='"+$(this).attr("data-text")+"'>"+$(this).attr("data-text")+"</li>"
	            selectedid += ","+$(this).attr("data-index")
	        }
	    });
	    selectedul += "</ul>";
	    
	    $.ajax({  
		    type: 'POST',  
		    url: '../admin/getter.php', 
		    data: { pageType: 'acrepair', selecttext: selectedul, selectid: selectedid },
		    success: function(response) {
		        
		    }
		});
}

function userinfoSubmit(cnt){

	$.ajax({  
		    type: 'POST',  
		    url: '../admin/getter.php', 
		    data: { cnt: cnt, pageType: 'callbooking',firstName: $('[name=firstName]').val(),lastName: $('[name=lastName]').val(),
		    contactNum: $('[name=contactNum]').val(),houseNum: $('[name=houseNum]').val(),street: $('[name=street]').val(),
		    state: $('[name=state]').val(),city: $('[name=city]').val(),pincode: $('[name=pincode]').val(),email: $('[name=email]').val(),
		    password: $('[name=password]').val() },
		    success: function(response) {
		    	$("#myModal").modal('show');
		    }
		});
}
$(document).ready(function(){

	$('#servicedt').datepicker({
		format: 'yyyy-mm-dd',
		startDate: '-0d'
	});
	$('.step2,.subservice,.procstep,.restep,.servwin,.servsplit,.servwinliinnum,.servwinliunnum,.servsplitliinnum,.servsplitliunnum').hide();

	var sPath=window.location.pathname;
	var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
	if((sPage == "acrepair") || (sPage == "refrigerator") || (sPage == "geyser")  || (sPage == "microwave")  || (sPage == "ro") || (sPage == "tv") || (sPage == "wm") || (sPage == "cooler")){
		var res = $(".selectId").val().split(",");
		for (var i in res) {
		  
		  $(".subservice").each(function(){
				
				if($(this).attr('subservice-index') == res[i]){
					$(this).show();
				}
				
			});
		}

	}
	$(".serviceDrop").change(function(){	


  		$(".subServiceDrop").load("getter.php?serviceId=" + $(this).val());
  		
	});

	$('.gasli').click(function(){
		if ($(this).find('.radiowh').prop("checked") == true){
			$(this).find('.radiowh').prop("checked",false)
			$(".tonnagecost").val(0)
		}
		else{
			$(this).find('.radiowh').prop("checked",true)
			$(".tonnagecost").val($(this).find('.radiowh').val())
		}
	});

	$('.gasliwinin').click(function(){
		if ($(this).find('.radiowh').prop("checked") == true){
			$(this).find('.radiowh').prop("checked",false)
			$(".wininstallcost").val(0)
		}
		else{
			$(this).find('.radiowh').prop("checked",true)
			$(".wininstallcost").val($(this).find('.radiowh').val())
		}
	});

$('.gaslisplitin').click(function(){
		if ($(this).find('.radiowh').prop("checked") == true){
			$(this).find('.radiowh').prop("checked",false)
			$(".splitinstallcost").val(0)
		}
		else{
			$(this).find('.radiowh').prop("checked",true)
			$(".splitinstallcost").val($(this).find('.radiowh').val())
		}
	});
$('.gasliwinun').click(function(){
		if ($(this).find('.radiowh').prop("checked") == true){
			$(this).find('.radiowh').prop("checked",false)
			$(".winuninstallcost").val(0)
		}
		else{
			$(this).find('.radiowh').prop("checked",true)
			$(".winuninstallcost").val($(this).find('.radiowh').val())
		}
	});
$('.gaslisplitun').click(function(){
		if ($(this).find('.radiowh').prop("checked") == true){
			$(this).find('.radiowh').prop("checked",false)
			$(".splituninstallcost").val(0)
		}
		else{
			$(this).find('.radiowh').prop("checked",true)
			$(".splituninstallcost").val($(this).find('.radiowh').val())
		}
	});
	$('.servwinliin').click(function(){
    	if ($('.chkservwinin').prop("checked") == true){
			$('.chkservwinin').prop("checked",false)
			$('.servwinliinnum').hide()
			$('.wininstallcost').val(0)
			$('.gasliwinin').find('.radiowh').prop("checked",false)
		}
		else{
			$('.chkservwinin').prop("checked",true)
			$('.servwinliinnum').show()
		}
    });

    $('.servwinliun').click(function(){
    	if ($('.chkservwinun').prop("checked") == true){
			$('.chkservwinun').prop("checked",false)
			$('.servwinliunnum').hide()
			$('.splituninstallcost').val(0)
			$('.servwinliunnum').find('.radiowh').prop("checked",false)
		}
		else{
			$('.chkservwinun').prop("checked",true)
			$('.servwinliunnum').show()
		}
    });

	$('.servsplitliin').click(function(){
    	if ($('.chkservsplitin').prop("checked") == true){
			$('.chkservsplitin').prop("checked",false)
			$('.servsplitliinnum').hide()
			$('.splitinstallcost').val(0)
			$('.gaslisplitin').find('.radiowh').prop("checked",false)
		}
		else{
			$('.chkservsplitin').prop("checked",true)
			$('.servsplitliinnum').show()
		}
    });

    $('.servsplitliun').click(function(){
    	if ($('.chkservsplitun').prop("checked") == true){
			$('.chkservsplitun').prop("checked",false)
			$('.servsplitliunnum').hide()
			$('.splituninstallcost').val(0)
			$('.gaslisplitun').find('.radiowh').prop("checked",false)
		}
		else{
			$('.chkservsplitun').prop("checked",true)
			$('.servsplitliunnum').show()
		}
    });


    $('.servwinli').click(function(){
    	if ($('.chkservwin').prop("checked") == true){
			$('.chkservwin').prop("checked",false)
			$('.servwin').hide()
			$('.servwin').val("")
			$('.chkservwinval').val("0")
			$('.ratewin').text("Rs. 349")
			$('.windownoval').val("0")
		}
		else{
			$('.chkservwin').prop("checked",true)
			$('.servwin').show()
		}
    });

    

    $('.servsplitli').click(function(){
    	if ($('.chkservsplit').prop("checked") == true){
			$('.chkservsplit').prop("checked",false)
			$('.servsplit').hide()
			$('.servsplit').val("")
			$('.chkservsplitval').val("0")
			$('.ratesplit').text("Rs. 399")
			$('.splitnoval').val("0")
		}
		else{
			$('.chkservsplit').prop("checked",true)
			$('.servsplit').show()
		}
    });

	$(".serviceBtn").click(function(){
		$.ajax({  
		    type: 'POST',  
		    url: '../admin/getter.php', 
		    data: { serviceId: $(this).attr("data-index"), pageType: 'subService' },
		    success: function(response) {
		        $(".modal-body .step1").html("<ul class='list-group servicelink'>" + response+ "</ul>");
		        $(".servicelink li").click(function(){
					if ($(this).find("input[type=checkbox]").prop("checked") == true){
						$(this).find("input[type=checkbox]").prop("checked",false)
					}
					else{
						$(this).find("input[type=checkbox]").prop("checked",true)
					}
				});
		    }
		});
	});

	$(".nextstep").click(function(){
		var selectedul = "<h4>Selected Services : </h4><ul>";
		$('.chkwh').each(function (index, obj) {
	        if (this.checked === true) {
	            selectedul += "<li>"+$(this).attr("data-text")+"</li>"
	        }
	    });
	    selectedul += "</ul>";
	    $('.step2').html(selectedul);
		$('.step1').hide();
		$('.nextstep').hide();
		$('.step2').show();
		$('.procstep').show();
		$('.restep').show();
	});

	$(".procstep").click(function(){
		var selectedid = "";
		var selectedul = "<h4>Selected Services : </h4><ul class='list-group list-group-flush selectService'>";
		$('.chkwh').each(function (index, obj) {
	        if (this.checked === true) {
	            selectedul += "<li class='list-group-item' data-text='"+$(this).attr("data-text")+"'>"+$(this).attr("data-text")+"</li>"
	            selectedid += ","+$(this).attr("data-index")
	        }
	    });
	    selectedul += "</ul>";


	    $.ajax({  
		    type: 'POST',  
		    url: '../admin/getter.php', 
		    data: { pageType: 'acrepair', selecttext: selectedul, selectid: selectedid },
		    success: function(response) {
		    	if(response == "ac"){
		    		location.href='acrepair';
		    	}
		    	if(response == "refri"){
		    		location.href='refrigerator';
		    	}
		    	if(response == "geyser"){
		    		location.href='geyser';
		    	}
		    	if(response == "micro"){
		    		location.href='microwave';
		    	}
		    	if(response == "ro"){
		    		location.href='ro';
		    	}
		    	if(response == "tv"){
		    		location.href='tv';
		    	}
		    	if(response == "cooler"){
		    		location.href='cooler';
		    	}
		    	if(response == "wm"){
		    		location.href='wm';
		    	}
		        
		    }
		});
	});

	$(".nextstep1").click(function(){
		if($('#servicedt').val() == ""){
			alert("Select Service Date");
		}
		else{
			var total = 0;
			if(sPage == "acrepair"){
				total = parseFloat($('.chkservwinval').val()) + parseFloat($('.chkservsplitval').val()) + parseFloat($('.repaircost').val()) + parseFloat($('.wininstallcost').val()) + parseFloat($('.splitinstallcost').val()) + parseFloat($('.winuninstallcost').val()) + parseFloat($('.splituninstallcost').val()) + parseFloat($('.tonnagecost').val());
			}
			else if(sPage == "refrigerator"){
				total = parseFloat($('.radiowh').val());
			}
			else if(sPage == "geyser"){
				var repair = 0;
				var install = 0;
				var uninstall = 0;
				if($("input[name='geyrepair']:checked").is(':checked')) { 
					repair = $("input[name='geyrepair']:checked").val();
				 }
				 else{
				 	repair = 0;
				 }

				 if($("input[name='geyinst']:checked").is(':checked')) { 
					install = $("input[name='geyinst']:checked").val();
				 }
				 else{
				 	install = 0;
				 }

				 if($("input[name='geyuninst']:checked").is(':checked')) { 
					uninstall = $("input[name='geyuninst']:checked").val();
				 }
				 else{
				 	uninstall = 0;
				 }
				total = parseFloat(repair) + parseFloat(install) + parseFloat(uninstall);
			}
			else if(sPage == "microwave"){
				total = parseFloat($('.radiowh').val());
			}
			else if(sPage == "ro"){
				var repair = 0;
				var install = 0;
				var uninstall = 0;
				if($("input[name='rorepair']:checked").is(':checked')) { 
					repair = $("input[name='rorepair']:checked").val();
				 }
				 else{
				 	repair = 0;
				 }

				 if($("input[name='roinst']:checked").is(':checked')) { 
					install = $("input[name='roinst']:checked").val();
				 }
				 else{
				 	install = 0;
				 }

				 if($("input[name='rouninst']:checked").is(':checked')) { 
					uninstall = $("input[name='rouninst']:checked").val();
				 }
				 else{
				 	uninstall = 0;
				 }
				total = parseFloat(repair) + parseFloat(install) + parseFloat(uninstall);
			}
			else if(sPage == "tv"){
				var repair = 0;
				var install = 0;
				var uninstall = 0;
				if($("input[name='tvrepair']:checked").is(':checked')) { 
					repair = $("input[name='tvrepair']:checked").val();
				 }
				 else{
				 	repair = 0;
				 }

				 if($("input[name='tvinst']:checked").is(':checked')) { 
					install = $("input[name='tvinst']:checked").val();
				 }
				 else{
				 	install = 0;
				 }

				 if($("input[name='tvuninst']:checked").is(':checked')) { 
					uninstall = $("input[name='tvuninst']:checked").val();
				 }
				 else{
				 	uninstall = 0;
				 }
				total = parseFloat(repair) + parseFloat(install) + parseFloat(uninstall);
			}
			else if(sPage == "wm"){
				var repair = 0;
				var install = 0;
				var uninstall = 0;
				if($("input[name='wmrepair']:checked").is(':checked')) { 
					repair = $("input[name='wmrepair']:checked").val();
				 }
				 else{
				 	repair = 0;
				 }

				 if($("input[name='wminst']:checked").is(':checked')) { 
					install = $("input[name='wminst']:checked").val();
				 }
				 else{
				 	install = 0;
				 }

				 if($("input[name='wmuninst']:checked").is(':checked')) { 
					uninstall = $("input[name='wmuninst']:checked").val();
				 }
				 else{
				 	uninstall = 0;
				 }
				total = parseFloat(repair) + parseFloat(install) + parseFloat(uninstall);
			}
			else if(sPage == "cooler"){
				var grasschange = 0;
				var servicing = 0;
				var motor = 0;
				var pump = 0;
				var fan = 0;
				var other = 0;

				if($("input[name='grasschange']:checked").is(':checked')) { 
					grasschange = $("input[name='grasschange']:checked").val();
				 }
				 else{
				 	grasschange = 0;
				 }

				 if($("input[name='servicing']:checked").is(':checked')) { 
					servicing = $("input[name='servicing']:checked").val();
				 }
				 else{
				 	servicing = 0;
				 }

				 if($("input[name='motor']:checked").is(':checked')) { 
					motor = $("input[name='motor']:checked").val();
				 }
				 else{
				 	motor = 0;
				 }

				 if($("input[name='pump']:checked").is(':checked')) { 
					pump = $("input[name='pump']:checked").val();
				 }
				 else{
				 	pump = 0;
				 }

				 if($("input[name='fan']:checked").is(':checked')) { 
					fan = $("input[name='fan']:checked").val();
				 }
				 else{
				 	fan = 0;
				 }

				 if($("input[name='other']:checked").is(':checked')) { 
					other = $("input[name='other']:checked").val();
				 }
				 else{
				 	other = 0;
				 }
				 
				total = parseFloat(grasschange) + parseFloat(servicing) + parseFloat(motor) + parseFloat(pump) + parseFloat(fan) + parseFloat(other);
			}
			
			$.ajax({  
			    type: 'POST',  
			    url: '../admin/getter.php', 
			    data: { pageType: 'selectedServices', total: total, servicedt: $('#servicedt').val()},
			    success: function(response) {
			    	
			    	if(response == "callbooking"){
			    		location.href='success';
			    	}
			    	else if(response == "loggedin"){
			    		location.href='success';
			    	}
			    	else{
			    		location.href='userinfo';
			    	}
			    }
			});
		}
	});

	$(".restep").click(function(){
		$('.step1').show();
		$('.nextstep').show();
		$('.step2').hide();
		$('.procstep').hide();
		$('.restep').hide();
	});
});