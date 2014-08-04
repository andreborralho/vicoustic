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
    //	  	fadeIfChecked("panels_polystyrene", "#filter_panels_polystyrene_color");
    fadeIfChecked("panels_foam", "#filter_panels_foam_type");
});

jQuery('input[name=panels_wood]').click(function(){
    fadeIfChecked("panels_wood", "#filter_panels_wood_color");
});
jQuery('input[name=panels_fabric]').click(function(){
    fadeIfChecked("panels_fabric", "#filter_panels_fabric_color");
});
/* jQuery('input[name=panels_polystyrene]').click(function(){
 fadeIfChecked("panels_polystyrene", "#filter_panels_polystyrene_color");
 });*/
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

