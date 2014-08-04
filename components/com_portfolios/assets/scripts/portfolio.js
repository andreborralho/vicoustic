if(jQuery('#portfolio_galleria').length != 0) {
Galleria.ready(function() {
	var galleria = this;
	
	jQuery('#portfolio_galleria').click(function(event) {
		if(event.target != '[object HTMLDivElement]')
			galleria.enterFullscreen(); // toggles the fullscreen
	});
});

Galleria.run('#portfolio_galleria');
}