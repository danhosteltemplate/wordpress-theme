/*  JavaScript Document                                                         */
var marqueeVars = {
    screenSize: "",
    width: 0,
    mobileSize: 600,
    autoPlay: true,
    currentPanel: 1,
    totalPanels: 0,
    timePassed: 0,
    timeToChange: 70,
    inTansition: false,
    panelContent: Array
};

jQuery(document).ready(function() {
    marqueeGatherData();
    marqueeMeasureScreen();
    //setDebuger();
});

function marqueeAdvance() {
    // check browser width
    var browserWidth = jQuery(".marquee").width();
    var currentSize = marqueeVars.screenSize;
    if (browserWidth > marqueeVars.mobileSize) {
        var newWidth = "large";
        marqueeVars.screenSize = "large";
    } else {
        var newWidth = "small";
        marqueeVars.screenSize = "small";
    }
    // detect change in screen size variable
    if (currentSize != newWidth) {
        if (marqueeVars.screenSize == "large") {
            marqueeMultiPanel();
        } else {
            marqueeMultiPanel();
        }
    }
    // advance the timer and large marquee
    if (marqueeVars.timePassed == marqueeVars.timeToChange) {
        marqueeVars.timePassed = 0;
        if (marqueeVars.autoPlay == true) {
            if (marqueeVars.currentPanel == marqueeVars.totalPanels) {
                jQuery(".marquee_nav div:nth-child(1)").trigger("click");
            } else {
                jQuery(".marquee_nav div:nth-child(" + (marqueeVars.currentPanel + 1) + ")").trigger("click");
            }
        }
    } else {
        marqueeVars.timePassed += 1;
    }
    //setDebuger();
}

function marqueeMultiPanel() {
	var sizeOfDevice; 
	if (jQuery(".marquee").width() > marqueeVars.mobileSize){
		sizeOfDevice = 'large';
	} else{
		sizeOfDevice = 'small';
	}

    marqueeVars.timePassed = 0;
    marqueeVars.autoPlay = true;
    // clear HTML from marquee and add stage elements
    	jQuery(".marquee").html("").append('<div class="marquee_stage_' + sizeOfDevice + '"></div>');
    	jQuery(".marquee_stage_" + sizeOfDevice).append('<div class="marquee_container_1""></div><div class="marquee_nav_container"><div class="marquee_nav"></div></div>');

    // Generate navigation and links
    for (i = 0; i < marqueeVars.totalPanels; i++) {
        jQuery(".marquee_nav").append("<div></div>");
    }
    // Detect hover over marquee
    jQuery(".marquee").hover(function() {
        marqueeVars.autoPlay = false;
        jQuery(this).removeClass("autoplay");
    }, function() {
        marqueeVars.autoPlay = true;
        marqueeVars.timePassed = 0;
        jQuery(this).addClass("autoplay");
    });
    // add click events and panel transitions
    jQuery(".marquee_nav div").on("click", function() {
        var navClicked = jQuery(this).index();
        if (marqueeVars.inTansition) {} else {
            marqueeVars.currentPanel = navClicked + 1;
            marqueeVars.inTansition = true;
            // set the navigation state
            jQuery(".marquee_nav div").removeClass("selected");
            jQuery(this).addClass("selected");
            // inject panel container
            jQuery(".marquee_stage_" + sizeOfDevice ).append('<div class="marquee_container_2" style="opacity:0;"></div>');
            jQuery(".marquee_container_2").html(marqueeVars.panelContent[navClicked]).animate({
                opacity: 1
            }, 1e3, function() {
                jQuery(".marquee_container_1").remove();
                jQuery(this).addClass("marquee_container_1").removeClass("marquee_container_2");
                marqueeVars.inTansition = false;
                //setDebuger();
            });
        }
        //setDebuger();
    });
    // auto click first nav element
    jQuery(".marquee_nav div:first").trigger("click");
}

function marqueeSinglePanel() {
    // clear HTML from marquee and add stage small
    jQuery(".marquee").html("").append('<div class="marquee_stage_small">' + marqueeVars.panelContent[0] + "</div>");
    var getLink = jQuery(".marquee .marquee_stage_small").find("a:nth-child(1)").attr("href");
    /* grab first hyperlink url, add hyperlink to title */
    var getTitle = jQuery(".marquee .marquee_stage_small h3").html();
    var getFullImage = jQuery(".marquee .marquee_stage_small .marquee_panel").attr("data-full");
    jQuery(".marquee .marquee_stage_small h3").html('<a href="' + getLink + '">' + getTitle + "</a>");
    jQuery(".marquee .marquee_stage_small .marquee_panel").css("background-image", "url(" + getFullImage + ")");
}

function marqueeMeasureScreen() {
    // measure screen size
    if (jQuery(".marquee").width() > marqueeVars.mobileSize) {
        marqueeVars.screenSize = "large";
        marqueeMultiPanel();
    } else {
        marqueeVars.screenSize = "small";
        marqueeMultiPanel();
    }
}

function marqueeGatherData() {
    // create and store HTML for panels
    jQuery(".marquee_data .marquee_panel").each(function(index) {
        marqueeVars.totalPanels = index + 1;
        var imageFull = jQuery(this).attr("data-image-full");
        var imageLarge = jQuery(this).attr("data-image-large");
        var panelCaption = jQuery(this).find(".panel_container").html();
        marqueeVars.panelContent[index] = '<div class="marquee_panel" style="background-image:url(' + imageLarge + ');" data-full="' + imageLarge + '"><div class="panel_container">' + panelCaption + "</div></div>";
    });
    setInterval(marqueeAdvance, 100);
}

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
    fjs.parentNode.insertBefore(js, fjs);
})(document, "script", "facebook-jssdk");