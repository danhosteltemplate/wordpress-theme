jQuery(document).ready(function() { 
	// Drop Down Menu
	/*jQuery("ul#main-menu").superfish({ 
        delay:       0,
        animation:   {opacity:'show',height:'show'},
        speed:       'fast',
        autoArrows:  true,
        dropShadows: true
    });*/

	// Accordion
	jQuery(".accordion").accordion( { autoHeight: false } );

	// Toggle
	jQuery(".toggle > .inner").hide();
	jQuery(".toggle .title").toggle(function(){
		jQuery(this).addClass("active").closest('.toggle').find('.inner').slideDown(200, 'easeOutCirc');
	}, function () {
		jQuery(this).removeClass("active").closest('.toggle').find('.inner').slideUp(200, 'easeOutCirc');
	});

	// Tabs
	jQuery(function() {
		jQuery("#tabs").tabs();
	});
	
	// Gallery Hover Effect
	jQuery(".gallery-item .gallery-thumbnail .zoom-wrapper").hover(function(){		
		jQuery(this).animate({ opacity: 1 }, 300);
	}, function(){
		jQuery(this).animate({ opacity: 0 }, 300);
	});
	
	// PrettyPhoto
	jQuery(document).ready(function(){
		jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	});

	// Mobile Menu
/*
	jQuery("<select />").appendTo(".nav-wrapper");
      
	jQuery("#mobile-menu a").each(function() {
		var el = jQuery(this);
		jQuery("<option />", {
			"value"   : el.attr("href"),
			"text"    : el.text()
		}).appendTo(".nav-wrapper select");
	});
	
	jQuery(".nav-wrapper select").change(function() {
		window.location = jQuery(this).find("option:selected").val();
	});
*/	
	onchange="if (this.value) window.location.href=this.value"
	
	
jQuery(function() {
      jQuery("<select />").appendTo(".nav-wrapper");
      jQuery("<option />", {
         "selected": "selected",
		 "disabled": "disabled",
		 "hidden"  : "hidden",
         "value"   : "",
         "text"    : "Menu"
      }).appendTo(".nav-wrapper select");
      jQuery("#mobile-menu a").each(function() {
       var el = jQuery(this);
       jQuery("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo(".nav-wrapper select");
      });
      jQuery(".nav-wrapper select").change(function() {
        window.location = jQuery(this).find("option:selected").val();
      });    
     });	
	
	
	
	// Datepicker
	
    var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
if( !isMobile.any() ) {
	
	jQuery("#fromdate").datepicker({
		minDate: 0,
        //maxDate:"+60D",
        numberOfMonths: 2,
		dateFormat: 'yy-mm-dd',
		onSelect: function (selectedDate) {
        if (this.id == 'fromdate') {
			//var selectedDate = jQuery(this).val();
           	var arr = selectedDate.split("-");
            var date = new Date(arr[0]+"-"+arr[1]+"-"+arr[2]);
            var d = date.getDate();
            var m = date.getMonth();
           	var y = date.getFullYear();
            var nextDate = new Date(y, m, d + 1);
			jQuery("#todate").datepicker('option','minDate', selectedDate);
            jQuery("#todate").datepicker('setDate', nextDate);
			}
			}
		});

	jQuery("#todate").datepicker({
		//maxDate:"+60D",
        numberOfMonths: 2,
		dateFormat: 'yy-mm-dd',
		 onSelect: function(selected) {
           jQuery("#fromdate").datepicker('option','maxDate', selected)
        }
	});
}
		var map_toggle  = "closed";
	
	// Google Map Slide Down
	jQuery(".gmap-btn").click(function(){
		
		jQuery('#header-google-map').slideToggle('slow');
		
		if (!map) {
			initialize();
		}
		
		jQuery('.gmap-btn').toggleClass('gmap-btn-hover');
		
	});
	
	// Google Map Display
var map = null;
	
	function initialize() {
		var latlng = new google.maps.LatLng(mapLat,mapLng);
		var myOptions = {
			zoom: 15,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: true,
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			}
		};

		map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
		var contentString = '<div class="gmap-content">'+mapContent+'</div>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		var marker = new google.maps.Marker({
			position: latlng, 
			map: map
		});

		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		});

	}
	
	// Booking Form Validation
	jQuery(".booking-validation").submit(function() {		
		
		if ( jQuery("#room").val() == "none" ) {
			jQuery("#room").effect("pulsate", { times:3 }, 250);
			alert(msgSelectRoom);
			return false;
		}
		
		if (jQuery("#fromdate").val() == "From") {
			jQuery("#fromdate").effect("pulsate", { times:3 }, 250);
			alert(msgSelectArrDate);
			return false;
		}
		
		if (jQuery("#todate").val() == "To") {
			jQuery("#todate").effect("pulsate", { times:3 }, 250);
			alert(msgSelectDepDate);
			return false;
		}
		
		// Checks if end date is tha same as start date. 
		
		if ( jQuery("#fromdate").val() == jQuery("#todate").val() ) {
			jQuery("#fromdate").effect("pulsate", { times:3 }, 250);
			jQuery("#todate").effect("pulsate", { times:3 }, 250);
			alert(msgArrDepMatch);
			return false;
		}	
		
		if(datepickerformat == 'yy-mm-dd') {	
			var fromdate = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#fromdate").val());
			var dateTo = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#todate").val());
		} else {
			var fromdate = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#fromdate").val());
			var dateTo = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#todate").val());
		}
		
		// Checks if end date is before start date. 
		
		if ( dateTo < fromdate ) {
			jQuery("#fromdate").effect("pulsate", { times:3 }, 250);
			jQuery("#dateto").effect("pulsate", { times:3 }, 250);
			alert(msgDepBeforeArr);
			return false;
		}	 
		
		return true;
	});
	
	// Booking Form Validation (Widget)
	jQuery(".booking-validation-widget").submit(function() {
		if ( jQuery("#room_widget").val() == "none" ) {
			jQuery("#room_widget").effect("pulsate", { times:3 }, 250);
			alert(msgSelectRoom);
			return false;
		}
		
		if (jQuery("#fromdate_widget").val() == "From") {
			jQuery("#fromdate_widget").effect("pulsate", { times:3 }, 250);
			alert(msgSelectArrDate);
			return false;
		}
		
		if (jQuery("#dateto_widget").val() == "To") {
			jQuery("#dateto_widget").effect("pulsate", { times:3 }, 250);
			alert(msgSelectDepDate);
			return false;
		}
		
		if ( jQuery("#fromdate_widget").val() == jQuery("#dateto_widget").val() ) {
			jQuery("#fromdate_widget").effect("pulsate", { times:3 }, 250);
			jQuery("#dateto_widget").effect("pulsate", { times:3 }, 250);
			alert(msgArrDepMatch);
			return false;
		}
		
		if(datepickerformat == 'yy-mm-dd') {	
			var fromdateWidget = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#fromdate_widget").val());
			var dateToWidget = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#dateto_widget").val());
		} else {
			var fromdateWidget = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#fromdate_widget").val());
			var dateToWidget = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#dateto_widget").val());
		}
		
		if ( dateToWidget < fromdateWidget ) {
			jQuery("#fromdate_widget").effect("pulsate", { times:3 }, 250);
			jQuery("#dateto_widget").effect("pulsate", { times:3 }, 250);
			alert(msgDepBeforeArr);
			return false;
		}	
		
		return true;
	});
});

// Slider
jQuery(window).load(function(){
	
	
	jQuery('.slider').flexslider({
		animation: "slide",
		controlNav: true,
		directionNav: false,
		touch: false,
		slideshow: true,
		slideshowSpeed:7000 
	});
	
	
	
	jQuery('.booknow-wrapper-main').removeClass("hidden");
	


});




 function fbs_click(width, height) {
      var leftPosition, topPosition;
      //Allow for borders.
      leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
      //Allow for title and status bars.
      topPosition = (window.screen.height / 2) - ((height / 2) + 50);
      var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
      u=location.href;
      t=document.title;
      window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
      return false;
  }