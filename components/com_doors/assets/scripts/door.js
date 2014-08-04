if(jQuery('#portfolio_galleria').length == 0) {
	Galleria.ready(function() {
		var galleria = this;
		
		jQuery('#door_main_img').click(function(event) {
			if(event.target != '[object HTMLDivElement]')
				galleria.openLightbox(); 
		});					
	});

	Galleria.run('#door_main_img');
}


this.screenshotPreview = function(){	
	/* CONFIG */		
	xOffset = 10;
	yOffset = 30;
	
	// these 2 variable determine popup's distance from the cursor
	// you might want to adjust to get the right result
		
	/* END CONFIG */
	jQuery(".product_similar_link").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		jQuery("body").append("<p id='product_preview'><img src='"+ this.rel +"' alt='url preview'>"+ c +"</p>");
		jQuery("#product_preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		jQuery("#product_preview").remove();
    });	
	jQuery(".product_similar_link").mousemove(function(e){
		jQuery("#product_preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};

// starting the script on page load
jQuery(document).ready(function(){
	screenshotPreview();
});