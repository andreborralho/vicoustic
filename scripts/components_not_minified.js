//----------------RESOURCES-------------------
jQuery("#catalogs_entry").fadeIn(500);

jQuery("#catalogs_icon").click(function(){
    jQuery('.resource_icon_label').removeClass('resource_icon_checked');
    jQuery('#resource_icon_label_catalogs').addClass('resource_icon_checked');

    jQuery("#technical_files_entry").fadeOut(50).delay(60);
    jQuery("#logos_entry").delay(60).fadeOut(50);
    jQuery("#product_photos_entry").delay(60).fadeOut(50);
    jQuery("#catalogs_entry").delay(60).fadeIn(500);
});
jQuery("#technical_files_icon").click(function(){
    jQuery('.resource_icon_label').removeClass('resource_icon_checked');
    jQuery('#resource_icon_label_technical_files').addClass('resource_icon_checked');

    jQuery("#catalogs_entry").fadeOut(50).delay(60);
    jQuery("#logos_entry").delay(60).fadeOut(50);
    jQuery("#product_photos_entry").delay(60).fadeOut(50);
    jQuery("#technical_files_entry").delay(60).fadeIn(500);
});
jQuery("#logos_icon").click(function(){
    jQuery('.resource_icon_label').removeClass('resource_icon_checked');
    jQuery('#resource_icon_label_logos').addClass('resource_icon_checked');

    jQuery("#technical_files_entry").fadeOut(50).delay(60);
    jQuery("#catalogs_entry").delay(60).fadeOut(50);
    jQuery("#product_photos_entry").delay(60).fadeOut(50);
    jQuery("#logos_entry").delay(60).fadeIn(500);
});
jQuery("#product_photos_icon").click(function(){
    jQuery('.resource_icon_label').removeClass('resource_icon_checked');
    jQuery('#resource_icon_label_product_photos').addClass('resource_icon_checked');

    jQuery("#technical_files_entry").fadeOut(50).delay(60);
    jQuery("#logos_entry").delay(60).fadeOut(50);
    jQuery("#catalogs_entry").delay(60).fadeOut(50);
    jQuery("#product_photos_entry").delay(60).fadeIn(500);
});

var category_button = jQuery('#filter_hidden_field').text();
jQuery('.filter_form').css('display', 'none');
jQuery('.filter_items_list').css('display', 'none');

if(category_button !=""){
    changeCurrentButton('#filter_' + category_button + '_button');
    jQuery('#filter_' + category_button + '_form').css('display', 'block');
    jQuery('#' + category_button + '_filter_items_list').css('display', 'block');
}
else{
    changeCurrentButton('#filter_panels_button');
    jQuery('#filter_panels_form').css('display', 'block');
    jQuery('#panels_filter_items_list').css('display', 'block');
}


//----------------ACOUSTIC SIMULATOR-------------------
fadeIfChecked("panels_wood", "#filter_panels_wood_color");
fadeIfChecked("panels_fabric", "#filter_panels_fabric_color");
fadeIfChecked("panels_foam", "#filter_panels_foam_type");


jQuery('#filter_doors_button').click(function(){
    jQuery('.filter_form').css('display', 'none').addClass('filter_form_transition2').removeClass('filter_form_transition1');
    jQuery('#filter_doors_form').addClass('filter_form_transition1').removeClass('filter_form_transition2').css('display', 'block');

    changeCurrentButton('#filter_doors_button');

    jQuery('.filter_items_list').css('display', 'none');
    jQuery('#doors_filter_items_list').fadeIn();
});
jQuery('#filter_blankets_button').click(function(){
    jQuery('.filter_form').css('display', 'none').addClass('filter_form_transition2').removeClass('filter_form_transition1');
    jQuery('#filter_blankets_form').addClass('filter_form_transition1').removeClass('filter_form_transition2').css('display', 'block');

    changeCurrentButton('#filter_blankets_button');

    jQuery('.filter_items_list').css('display', 'none');
    jQuery('#blankets_filter_items_list').fadeIn();
});
jQuery('#filter_antivibratics_button').click(function(){
    jQuery('.filter_form').css('display', 'none');
    jQuery('#filter_antivibratics_form').fadeIn();

    changeCurrentButton('#filter_antivibratics_button');

    jQuery('.filter_items_list').css('display', 'none');
    jQuery('#antivibratics_filter_items_list').fadeIn();
});
jQuery('#filter_panels_button').click(function(){
    jQuery('.filter_form').css('display', 'none');
    jQuery('#filter_panels_form').fadeIn();

    changeCurrentButton('#filter_panels_button');

    jQuery('.filter_items_list').css('display', 'none');
    jQuery('#panels_filter_items_list').fadeIn();

    fadeIfChecked("panels_wood", "#filter_panels_wood_color");
    fadeIfChecked("panels_fabric", "#filter_panels_fabric_color");
    fadeIfChecked("panels_foam", "#filter_panels_foam_type");
});

jQuery('input[name=panels_wood]').click(function(){
    fadeIfChecked("panels_wood", "#filter_panels_wood_color");
});
jQuery('input[name=panels_fabric]').click(function(){
    fadeIfChecked("panels_fabric", "#filter_panels_fabric_color");
});
jQuery('input[name=panels_foam]').click(function(){
    fadeIfChecked("panels_foam", "#filter_panels_foam_type");
});


function fadeIfChecked(input_name, category_attribute){
    if (jQuery('input[name='+input_name+']').is(':checked'))
        jQuery(category_attribute).fadeIn();
    else
        jQuery(category_attribute).fadeOut();
}
function changeCurrentButton(button){
    jQuery('.filter_button').removeClass('filter_button_current');
    jQuery(button).addClass('filter_button_current');
}

/* CONFIG */
xOffset = 5;
yOffset = 20;

// these 2 variable determine popup's distance from the cursor
// you might want to adjust to get the right result

/* END CONFIG */
jQuery(".acoustic_simulator_other_options_preview").hover(function(e){
        this.t = this.title;
        this.title = "";
        var c = (this.t != "") ? "<br/>" + this.t : "";
        jQuery("body").append("<p id='option_preview'><img src='"+ this.href +"' alt='url preview'>"+ c +"</p>");
        jQuery("#option_preview")
            .css("top",(e.pageY - xOffset) + "px")
            .css("left",(e.pageX + yOffset) + "px")
            .fadeIn("slow");
    },
    function(){
        this.title = this.t;
        jQuery("#option_preview").remove();
    });
jQuery(".acoustic_simulator_other_options_preview").mousemove(function(e){
    jQuery("#option_preview").css("top",(e.pageY - xOffset) + "px").css("left",(e.pageX + yOffset) + "px");
});

//----------------ISOLATION SIMULATOR-------------------
var currency_value = 1, unit_value = 1;

$('#currency_list_form').change(function() {
    var currency_symbol = $(this).find('option:selected').data('symbol');

    currency_value = $(this).val();

    $('.iso_currency_symbol').text(currency_symbol);

    $('.iso_price').each(function(){
        $(this).text(($(this).data('price') * currency_value * unit_value).toFixed(2));
    });
});

$('#unit_list_form').change(function() {
    var unit_symbol = $(this).find('option:selected').data('symbol');

    unit_value = $(this).val();

    $('.iso_unit_symbol').text(unit_symbol);

    $('.iso_price').each(function(){
        $(this).text(($(this).data('price') * currency_value * unit_value).toFixed(2));
    });
});

jQuery('.iso_category_button').click(function(category){
    if(jQuery('#' + category.target.id).hasClass('iso_simulator_button_checked')){
        jQuery('.' + category.target.id).css('display', 'none');
        jQuery('#' + category.target.id).removeClass('iso_simulator_button_checked');
    }
    else{
        jQuery('.' + category.target.id).css('display', 'block');
        jQuery('#' + category.target.id).addClass('iso_simulator_button_checked');
    }
});


//----------------PRODUCTS-------------------
function screenshotPreview(){
    // these 2 variable determine popup's distance from the cursor
    // you might want to adjust to get the right result
    var xOffset = 10;
    var yOffset = 30;

    /* END CONFIG */
    jQuery(".product_similar_link").hover(function(e){
            this.t = this.title;
            this.title = "";
            var c = (this.t != "") ? "<br/>" + this.t : "";
            jQuery("body").append("<p id='product_preview'><img src='"+ this.rel +"' alt='url preview'>"+ c +"</p>");
            jQuery("#product_preview").css("top",(e.pageY - xOffset) + "px").css("left",(e.pageX + yOffset) + "px").fadeIn("fast");
        },
        function(){
            this.title = this.t;
            jQuery("#product_preview").remove();
        }
    ).mousemove(function(e){
            jQuery("#product_preview").css("top",(e.pageY - xOffset) + "px").css("left",(e.pageX + yOffset) + "px");
        });
}

function initGalleria() {
    if(jQuery('.product_main_img').length || jQuery('#portfolio_galleria').length || jQuery('#acoustic_simulator_solution_gallery').length) {
        Galleria.ready(function() {
            var galleria = this;

            jQuery('.product_main_img, #portfolio_galleria, #acoustic_simulator_solution_gallery').click(function(event) {
                if(event.target != '[object HTMLDivElement]')
                    galleria.openLightbox(); // toggles the fullscreen
            });
        });

        if(jQuery('.product_main_img').length) {
            Galleria.run('.product_main_img');
        }
        else if(jQuery('#portfolio_galleria').length) {
            Galleria.run('#portfolio_galleria');
        }
        else if(jQuery('#acoustic_simulator_solution_gallery').length) {
            Galleria.run('#acoustic_simulator_solution_gallery');
        }
    }
}


//----------------PANELS-------------------
var newCanvas;

function initJQPlot() {
    var panel_id = jQuery('#panel_graph_panel_id').val();
    var graph_63hz = jQuery('#panel_graph_63hz').val();
    var graph_80hz = jQuery('#panel_graph_80hz').val();
    var graph_100hz = jQuery('#panel_graph_100hz').val();
    var graph_125hz = jQuery('#panel_graph_125hz').val();
    var graph_160hz = jQuery('#panel_graph_160hz').val();
    var graph_200hz = jQuery('#panel_graph_200hz').val();
    var graph_250hz = jQuery('#panel_graph_250hz').val();
    var graph_315hz = jQuery('#panel_graph_315hz').val();
    var graph_400hz = jQuery('#panel_graph_400hz').val();
    var graph_500hz = jQuery('#panel_graph_500hz').val();
    var graph_630hz = jQuery('#panel_graph_630hz').val();
    var graph_800hz = jQuery('#panel_graph_800hz').val();
    var graph_1000hz = jQuery('#panel_graph_1000hz').val();
    var graph_1250hz = jQuery('#panel_graph_1250hz').val();
    var graph_1600hz = jQuery('#panel_graph_1600hz').val();
    var graph_2000hz = jQuery('#panel_graph_2000hz').val();
    var graph_2500hz = jQuery('#panel_graph_2500hz').val();
    var graph_3150hz = jQuery('#panel_graph_3150hz').val();
    var graph_4000hz = jQuery('#panel_graph_4000hz').val();
    var graph_5000hz = jQuery('#panel_graph_5000hz').val();

    jQuery.jqplot('chartdiv',
        [[graph_63hz, graph_80hz, graph_100hz, graph_125hz, graph_160hz, graph_200hz, graph_250hz, graph_315hz, graph_400hz, graph_500hz,
            graph_630hz, graph_800hz, graph_1000hz, graph_1250hz, graph_1600hz, graph_2000hz, graph_2500hz, graph_3150hz, graph_4000hz, graph_5000hz]], {

            stackseries : true,
            axes: {
                xaxis: {
                    renderer: jQuery.jqplot.CategoryAxisRenderer,
                    ticks: ["63 Hz", "80 Hz","100 Hz","125 Hz","160 Hz","200 Hz","250 Hz","315 Hz","400 Hz","500 Hz","630 Hz","800 Hz",
                        "1 kHz","1.25 kHz","1.6 kHz","2 kHz","2.5 kHz","3.15 kHz","4 kHz","5 kHz"],
                    tickOptions: {
                        fontSize: '8px',
                        formatString: '%.2f'
                    }
                },
                yaxis: {
                    min: 0.00,
                    max: 1.1,
                    tickOptions: {
                        fontSize: '8px',
                        formatString: '%.2f'
                    }
                }
            },
            seriesDefaults: {
                rendererOptions: {
                    smooth: true,
                    animation: {
                        show: true
                    }
                },
                showMarker: true,
                color: '#f89f28'
            },
            highlighter: {
                show: true,
                showLabel: true,
                tooltipAxes: 'y'

            }
        });
    return panel_id;
}


function jqplotToImg(chartdiv, panel_id) {
    // first we draw an image with all the chart components
    newCanvas = document.createElement("canvas");
    newCanvas.width = jQuery("#" + chartdiv).width();
    newCanvas.height = jQuery("#" + chartdiv).height();
    var baseOffset = jQuery("#" + chartdiv).offset();

    jQuery("#" + chartdiv).children().each(
        function() {
            // for the div's with the X and Y axis
            if (jQuery(this)[0].tagName.toLowerCase() == 'div') {
                // X axis is built with canvas
                jQuery(this).children("canvas").each(
                    function() {
                        var offset = jQuery(this).offset();
                        newCanvas.getContext("2d").drawImage(this, offset.left - baseOffset.left, offset.top - baseOffset.top);
                    });

                // Y axis got div inside, so we get the text and draw it on
                // the canvas
                jQuery(this).children("div").each(
                    function() {
                        var offset = jQuery(this).offset();
                        var context = newCanvas.getContext("2d");
                        context.font = jQuery(this).css('font-style') + " " + jQuery(this).css('font-size') + " " + jQuery(this).css('font-family');
                        context.fillText(jQuery(this).html(), offset.left - baseOffset.left, offset.top - baseOffset.top + 10);
                    });
            }
            // all other canvas from the chart
            else if (jQuery(this)[0].tagName.toLowerCase() == 'canvas') {
                var offset = jQuery(this).offset();
                newCanvas.getContext("2d").drawImage(this, offset.left - baseOffset.left, offset.top - baseOffset.top);
            }
        });

    // add the point labels
    jQuery("#" + chartdiv).children(".jqplot-point-label").each(
        function() {
            var offset = jQuery(this).offset();
            var context = newCanvas.getContext("2d");
            context.font = jQuery(this).css('font-style') + " " + jQuery(this).css('font-size') + " " + jQuery(this).css('font-family');
            context.fillText(jQuery(this).html(), offset.left - baseOffset.left, offset.top - baseOffset.top + 10);
        });

    // add the rectangles
    jQuery("#" + chartdiv + " *").children(".jqplot-table-legend-swatch").each(
        function() {
            var offset = jQuery(this).offset();
            var context = newCanvas.getContext("2d");
            context.setFillColor(jQuery(this).css('background-color'));
            context.fillRect(offset.left - baseOffset.left, offset.top - baseOffset.top, 15, 15);
        });

    // add the legend
    jQuery("#" + chartdiv + " *").children(".jqplot-table-legend td:last-child").each(
        function() {
            var offset = jQuery(this).offset();
            var context = newCanvas.getContext("2d");
            context.font = jQuery(this).css('font-style') + " " + jQuery(this).css('font-size') + " " + jQuery(this).css('font-family');
            context.fillText(jQuery(this).html(), offset.left - baseOffset.left, offset.top - baseOffset.top + 15);
        });

    postValues(panel_id);
}

function postValues(panel_id) {
    var dataURL = newCanvas.toDataURL();
    var img_PDF = dataURL.replace(/^data:image\/(png|jpg);base64,/, "");

    jQuery.ajax({
        url: panel_id+'?view=panel',
        type: "POST",
        data: {img_PDF: img_PDF},
        async: false
    });
}

function initFrontPageSlideshow() {
    jQuery('div[id^=camera_wrap_]').camera({
        height: '360',
        minHeight: '',
        pauseOnClick: false,
        hover: 1,
        fx: 'simpleFade',
        loader: 'pie',
        pagination: 1,
        thumbnails: 1,
        thumbheight: 75,
        thumbwidth: 100,
        time: 2000,
        transPeriod: 1000,
        alignment: 'center',
        autoAdvance: 1,
        mobileAutoAdvance: 1,
        portrait: 0,
        barDirection: 'leftToRight',
        imagePath: 'http://vicoustic.com/modules/mod_slideshowck/images/',
        lightbox: 'mediaboxck',
        fullpage: 0,
        navigationHover: true,
        navigation: true,
        playPause: true,
        barPosition: 'bottom'
    });
}

// starting the script on page load
jQuery(document).ready(function(){
    screenshotPreview();
    if(typeof Galleria !== 'undefined') {
        initGalleria();
    }
    if(jQuery('#chartdiv').length) {
        jQuery.getScript("/components/com_panels/assets/scripts/jquery.jqplot.min.js").done(function() {
            panel_id = initJQPlot();
            jqplotToImg('chartdiv', panel_id);
        });
    }
    if(jQuery('#distributors-map').length) {
        jQuery.getScript("/scripts/jquery-jvectormap-1.2.2.min.js");
    }
    if(jQuery('.camera_wrap').length) {
        jQuery.getScript("/modules/mod_slideshowck/assets/camera.min.js").done(function() {
            initFrontPageSlideshow();
        });
    }
});
