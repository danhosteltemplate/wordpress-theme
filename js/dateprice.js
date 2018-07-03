// Function to calculate length of stay
alert('This is the datapicker');

function dateDiff(dateFrom,dateTo) {
	
	// Set dates
	if(datepickerformat == 'mm/dd/yyyy') {	
		var datefrom = jQuery.datepicker.parseDate('mm/dd/yy', dateFrom);
		var dateto = jQuery.datepicker.parseDate('mm/dd/yy', dateTo);
	} else {
		var datefrom = jQuery.datepicker.parseDate('dd/mm/yy', dateFrom);
		var dateto = jQuery.datepicker.parseDate('dd/mm/yy', dateFrom);
	}
	
	if ( datefrom == 'From' ) { datefrom = 0; }
	if ( dateto == 'To' ) { dateto = 0; }
	
	// Calculate difference between dates
	var start = new Date(datefrom);
	var end = new Date(dateto);
	var diff = new Date(end - start);
	var days = diff/1000/60/60/24;
	
	return days;
	
}

jQuery("#datefrom").change(function () {
	
	// Calculate length of stay
	days = dateDiff(jQuery(this).val(),jQuery("#dateto").val());
	
	// Calculate new price based on price of room
	var roomprice = getPrice;
	
	// Calculate new price based on price of room and length of stay
	var newprice = days * roomprice;
	
	// Display new price
  	jQuery(".room-price").text(newprice);
	jQuery(".price-detail-value").text(days);
	
	if(datepickerformat == 'mm/dd/yyyy') {	
		var datefrom = jQuery.datepicker.parseDate('mm/dd/yy', jQuery("#datefrom").val());
		var dateto = jQuery.datepicker.parseDate('mm/dd/yy', jQuery("#dateto").val());
	} else {
		var datefrom = jQuery.datepicker.parseDate('dd/mm/yy', jQuery("#datefrom").val());
		var dateto = jQuery.datepicker.parseDate('dd/mm/yy', jQuery("#dateto").val());
	}
	
	if ( dateto < datefrom ) {
		jQuery("#dateto").effect("pulsate", { times:3 }, 250);
		jQuery(".room-price").text("0");
		jQuery(".price-detail-value").text("0");
		alert(msgDepBeforeArr);
	}
	
}).keyup();

jQuery("#dateto").change(function () {
	
	// Calculate length of stay
	days = dateDiff(jQuery("#datefrom").val(),jQuery(this).val());
	
	// Calculate new price based on price of room
	var roomprice = getPrice;
	
	// Calculate new price based on price of room and length of stay
	var newprice = days * roomprice;
	
	// Display new price
  	jQuery(".room-price").text(newprice);
	jQuery(".price-detail-value").text(days);
	
	if(datepickerformat == 'mm/dd/yyyy') {	
		var datefrom = jQuery.datepicker.parseDate('mm/dd/yy', jQuery("#datefrom").val());
		var dateto = jQuery.datepicker.parseDate('mm/dd/yy', jQuery("#dateto").val());
	} else {
		var datefrom = jQuery.datepicker.parseDate('dd/mm/yy', jQuery("#datefrom").val());
		var dateto = jQuery.datepicker.parseDate('dd/mm/yy', jQuery("#dateto").val());
	}
	
	if ( dateto < datefrom ) {
		jQuery("#dateto").effect("pulsate", { times:3 }, 250);
		jQuery(".room-price").text("0");
		jQuery(".price-detail-value").text("0");
		alert(msgDepBeforeArr);
	}

}).keyup();