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
            },					            
        },
    seriesDefaults: {					        	
        rendererOptions: {
            smooth: true,
            animation: {
                show: true
            }
        },
        showMarker: true,	
        color: '#f89f28',
    },
    highlighter: {
         show: true,
         showLabel: true, 
			 tooltipAxes: 'y',
			
     }
});
    
jqplotToImg('chartdiv');

var newCanvas;

function jqplotToImg(chartdiv) {
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
	
	displayVals();
}

function displayVals() {
	var dataURL = newCanvas.toDataURL();
	var img_PDF = dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
	
	jQuery.ajax({
	    url: panel_id+'?view=panel',
		type: "POST",
	    data: {img_PDF: img_PDF},											    
	    async: false,
    });
    return 0;									    
}