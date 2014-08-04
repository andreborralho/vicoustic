<?php
/**
 * @version     1.0.0
 * @package     com_panels
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre Borralho <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;
require_once('fpdf/fpdf.php');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_panels', JPATH_ADMINISTRATOR);

$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
//$document->addScript('scripts/jquery.min.js');
	
$document->addScript('components/com_panels/assets/scripts/jquery.jqplot.min.js');
$document->addScript('scripts/galleria-1.2.9.min.js');

//$document->addScript('scripts/components.js');	

$url = JURI::current();
$tokens = explode('/', $url);

$panel_id = 0;
?>


<?php if( $this->item ):

	$panel_id = $this->item->id; 
	$GLOBALS['panel_name'] = $this->item->name;
	$url=getimagesize('images/panels/photos_300px/'. $this->item->ref .'_220.png');
		
	?>
	
    <div class="item_fields">
        
        <ul id="panels_fields_list" class="products_fields_list">
        	
        	<h1 class="product_name">
        		<?php echo $this->item->name; ?>
        	</h1>
        	    			
        	<div id="panel_main_img" class="product_main_img">
        		<?php if($this->item->photo_300px): ?>
        			<img alt="<?php echo $this->item->name; ?>" src="<?php echo $this->item->photo_300px; ?>" data-big="http://www.vicoustic.com/<?php echo $this->item->photo_1024px; ?>">
				<?php elseif(!is_array($url)): ?>
    				<img alt="<?php echo $this->item->name; ?>" src="images/not_available_medium.png" style="padding-top:20px">
        		<?php else : ?>
    				<img alt="<?php echo $this->item->name; ?>" src="images/panels/photos_300px/<?php echo $this->item->ref; ?>_220.png" data-big="http://www.vicoustic.com/images/panels/photos_1024px/<?php echo $this->item->ref; ?>_HD.png">
    			<?php endif; ?>
    			
        		<?php if($this->item->photo_row_material): ?>
        			<img alt="" src="<?php echo $this->item->photo_row_material; ?>">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail1): ?>
        			<img alt="" src="<?php echo $this->item->photo_detail1; ?>">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail2): ?>
        			<img alt="" src="<?php echo $this->item->photo_detail2; ?>">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail3): ?>
        			<img alt="" src="<?php echo $this->item->photo_detail3; ?>">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail4): ?>
        			<img alt="" src="<?php echo $this->item->photo_detail4; ?>">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail5): ?>
        			<img alt="" src="<?php echo $this->item->photo_detail5; ?>">
    			<?php endif; ?>
    		</div>
							    	
        	<div class="product_video">
        		<?php echo $this->item->video; ?>
    		</div>
        		
        	<div class="product_links">
        		<ul>
        			<li class="product_links_title">
        				<?php echo JText::_('COM_PANELS_PANEL_DOCUMENTS'); ?>
        			</li>

        			<?php if($this->item->catalog_page):?>
        				<li class="product_links_list">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->catalog_page; ?>"> <?php echo JText::_('COM_PANELS_PANEL_CATALOG_PAGE') ?></a>
        				</li>
        			<?php endif; ?>

	        		<li class="product_link">
	        			<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a"  href="images/pdfs/panels/technical_files/<?php echo str_replace(" ", "-", $this->item->name); ?>.pdf" onclick="displayVals();"> <?php echo JText::_('COM_PANELS_PANEL_TECHNICAL_FILE') ?></a>
	        		</li>
	        		
	        		<?php if($this->item->installation_manual):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a"  href="<?php echo $this->item->installation_manual; ?>"> <?php echo JText::_('COM_PANELS_PANEL_INSTALLATION_MANUAL') ?></a>
        				</li>
        			<?php endif; ?>
	        		
	        		<?php if($this->item->sketchup):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->sketchup; ?>"> <?php echo JText::_('COM_PANELS_PANEL_SKETCHUP') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->warranty):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->warranty; ?>"> <?php echo JText::_('COM_PANELS_PANEL_WARRANTY') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->drawings):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->drawings; ?>"> <?php echo JText::_('COM_PANELS_PANEL_DRAWINGS') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->safety_data):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->safety_data; ?>"> <?php echo JText::_('COM_PANELS_PANEL_SAFETY_DATA') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->acoustic_report):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->acoustic_report; ?>"> <?php echo JText::_('COM_PANELS_PANEL_ACOUSTIC_REPORT') ?></a>
        				</li>
        			<?php endif; ?>		        		
        		</ul>
    		</div>
        		
			<li class="product_description1">
				<?php echo $this->item->description1; ?>
			</li>

			</br>

			<li class="product_description2">
				<?php if($this->item->description2):
					echo $this->item->description2;
					endif; ?>
			</li>

			<?php 
				$linked_graph = 0;
				
				foreach ($this->items as $i=>$item):
					if($item->graph_id != 0 && $item->graph_id == $this->item->graph_id && $item->graph_state == 1):
						$linked_graph +=1;
					endif;
				endforeach; 
			?>
				
			<?php if($linked_graph > 0): ?>
										
				<div id="panel_graph_title">
					<?php echo JText::_('COM_PANELS_LEGEND_GRAPH'); ?>
				</div>
				 
				<div id="panel_graph_detail">

					<?php foreach ($this->items as $i=>$item) :	?>											
						<?php if($item->graph_id == $this->item->graph_id && $item->id == $this->item->id && $item->graph_state == 1): ?>
							
							&nbsp;<?php echo $item->graph_label; 
						?>					
							
							<div id="panel_graph_panel_id" class="panel_graph_value">
								<?php echo $item->panel_id; ?>
							</div>
							<div id="panel_graph_63hz" class="panel_graph_value">
								<?php echo $item->graph_63hz; ?>
							</div>
							<div id="panel_graph_80hz" class="panel_graph_value">
								<?php echo $item->graph_80hz; ?>
							</div>
							<div id="panel_graph_100hz" class="panel_graph_value">
								<?php echo $item->graph_100hz; ?>
							</div>
							<div id="panel_graph_125hz" class="panel_graph_value">
								<?php echo $item->graph_125hz; ?>
							</div>
							<div id="panel_graph_160hz" class="panel_graph_value">
								<?php echo $item->graph_160hz; ?>
							</div>
							<div id="panel_graph_200hz" class="panel_graph_value">
								<?php echo $item->graph_200hz; ?>
							</div>
							<div id="panel_graph_250hz" class="panel_graph_value">
								<?php echo $item->graph_250hz; ?>
							</div>
							<div id="panel_graph_315hz" class="panel_graph_value">
								<?php echo $item->graph_315hz; ?>
							</div>
							<div id="panel_graph_400hz" class="panel_graph_value">
								<?php echo $item->graph_400hz; ?>
							</div>
							<div id="panel_graph_500hz" class="panel_graph_value">
								<?php echo $item->graph_500hz; ?>
							</div>
							<div id="panel_graph_630hz" class="panel_graph_value">
								<?php echo $item->graph_630hz; ?>
							</div>
							<div id="panel_graph_800hz" class="panel_graph_value">
								<?php echo $item->graph_800hz; ?>
							</div>
							<div id="panel_graph_1000hz" class="panel_graph_value">
								<?php echo $item->graph_1000hz; ?>
							</div>
							<div id="panel_graph_1250hz" class="panel_graph_value">
								<?php echo $item->graph_1250hz; ?>
							</div>
							<div id="panel_graph_1600hz" class="panel_graph_value">
								<?php echo $item->graph_1600hz; ?>
							</div>
							<div id="panel_graph_2000hz" class="panel_graph_value">
								<?php echo $item->graph_2000hz; ?>
							</div>
							<div id="panel_graph_2500hz" class="panel_graph_value">
								<?php echo $item->graph_2500hz; ?>
							</div>
							<div id="panel_graph_3150hz" class="panel_graph_value">
								<?php echo $item->graph_3150hz; ?>
							</div>
							<div id="panel_graph_4000hz" class="panel_graph_value">
								<?php echo $item->graph_4000hz; ?>
							</div>
							<div id="panel_graph_5000hz" class="panel_graph_value">
								<?php echo $item->graph_5000hz; ?>
							</div>							
							
							<div id="chartdiv" style="height:170px;width:100%;"></div>
					
						<?php endif; ?>
					<?php endforeach; ?>		
				</div>
			
			<?php endif; ?>
				
			<div class="product_technical_info">
				<div class="product_technical_title">
					<?php echo JText::_('COM_PANELS_LEGEND_MAIN_INFO') ?>
				</div>
				
				<div class="product_technical_details">	
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_REF'); ?>:</b>
					<span id="panel_ref"><?php echo $this->item->ref; ?></span></li>
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_EAN13'); ?>:</b>
					<?php echo $this->item->ean13; ?></li>

					<?php if($this->item->hs_code != 0): ?>			
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_HS_CODE'); ?>:</b>
						<?php echo $this->item->hs_code; ?></li>
					<?php endif; ?>
					
					<li></li>			
					<li><b><?php echo JText::_('COM_PANELS_PANEL_DIMENSIONS'); ?>:</b>
						
					<?php if($this->item->diameter == 0): ?>			
						<?php echo number_format((float)$this->item->length, 0, '.', ''); ?> x <?php echo number_format((float)$this->item->width, 0, '.', ''); ?> x 
						<?php echo number_format((float)$this->item->thickness, 0, '.', ''); ?> mm
					<?php else :?>
						<?php echo $this->item->thickness; ?> x <?php echo $this->item->diameter; ?> mm
					<?php endif; ?>
					</li>
					
					<?php if($this->item->weight > 0): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_WEIGHT'); ?>:</b>
						<?php echo $this->item->weight; ?> kg</li>
					<?php endif; ?>

					<?php if($this->item->weight > 0): ?>	
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_DENSITY'); ?>:</b>
						<?php echo $this->item->density; ?></li>
					<?php endif; ?>

					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_SCRATCH_RESISTANCE'); ?>:</b>
						<?php if($this->item->scratch_resistance == 1) : ?>
							Yes
						<?php elseif($this->item->scratch_resistance == 0) : ?>
							No
						<?php endif; ?>
					</li>
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_WASHABLE'); ?>:</b>
						<?php if($this->item->washable == 1) : ?>
							Yes
						<?php elseif($this->item->washable == 0) : ?>
							No
						<?php endif; ?>
					</li>
					
					<?php if($this->item->recycle_coefficient > 0): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_RECYCLE_COEFFICIENT'); ?>:</b>
						<?php echo $this->item->recycle_coefficient; ?> %</li>
					<?php endif; ?>
				</div>

				<div class="product_technical_title">
					<?php echo JText::_('COM_PANELS_LEGEND_PERFORMANCE'); ?>
				</div>
				
				<div class="product_technical_details">	
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FUNCTIONALITY'); ?>:</b>
					<?php echo ucwords($this->item->functionality); ?></li>
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_ABSORPTION_FREQUENCY'); ?>:</b>
					<?php echo ucwords($this->item->absorption_frequency); ?> <?php echo JText::_('COM_PANELS_LEGEND_FREQUENCIES'); ?></li>
					
					<?php if($this->item->absorption_class != ""): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_ABSORPTION_CLASS'); ?>:</b>
						<?php echo ucwords($this->item->absorption_class); ?></li>	
					<?php endif; ?>

					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_AW'); ?>:</b>
					<?php echo $this->item->aw; ?></li>
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_NRC'); ?>:</b>
					<?php echo $this->item->nrc; ?></li>
					
					<li></li>
					
					<?php if($this->item->fire_class_en != ""): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_EN'); ?>:</b>
						<?php echo $this->item->fire_class_en; ?></li>
					<?php endif; ?>				
					
					<?php if($this->item->fire_class_din != ""): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_DIN'); ?>:</b>
						<?php echo $this->item->fire_class_din; ?></li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_nf_p != ""): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_NF_P'); ?>:</b>
						<?php echo $this->item->fire_class_nf_p; ?></li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_uni != ""): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_UNI'); ?>:</b>
						<?php echo $this->item->fire_class_uni; ?></li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_bs != ""): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_BS'); ?>:</b>
						<?php echo $this->item->fire_class_bs; ?></li>
					<?php endif; ?>
					
					<li></li>

					<?php if($this->item->humidity_class > 0): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_HUMIDITY_CLASS'); ?>:</b>
						<?php echo $this->item->humidity_class; ?></li>
					<?php endif; ?>

					<?php if($this->item->light_reflection > 0): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_LIGHT_REFLECTION'); ?>:</b>
						<?php echo $this->item->light_reflection; ?> %</li>
					<?php endif; ?>

					<?php if($this->item->humidity_resistance > 0): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_HUMIDITY_RESISTANCE'); ?>:</b>
						<?php echo $this->item->humidity_resistance; ?> %</li>
					<?php endif; ?>

					<?php if($this->item->thermal_conductivity > 0): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_THERMAL_CONDUCTIVITY'); ?>:</b>
						<?php echo $this->item->thermal_conductivity; ?> W/mK</li>
					<?php endif; ?>
				</div>
								
				
				<div class="product_technical_title">
					<?php echo JText::_('COM_PANELS_LEGEND_SHIPPING'); ?>
				</div>
				
				<div class="product_technical_details">
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_UNITS_PER_BOX'); ?>:</b>
						<?php echo $this->item->units_per_box; ?>						
					</li>
					<li><b><?php echo JText::_('COM_PANELS_PANEL_BOX_DIMENSIONS'); ?>:</b>
					<?php echo number_format((float)$this->item->box_length, 0, '.', ''); ?> x <?php echo number_format((float)$this->item->box_width, 0, '.', ''); ?> x 
					<?php echo number_format((float)$this->item->box_height, 0, '.', ''); ?> mm</li>
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_BOX_WEIGHT'); ?>:</b>
					<?php echo $this->item->box_weight; ?> kg</li>
					<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_BOX_VOLUME'); ?>:</b>
					<?php echo $this->item->box_volume; ?> m<span style="vertical-align:super; font-size:0.8em">3</span></li>
					<!--li><b><?php /*echo JText::_('COM_PANELS_FORM_LBL_PANEL_BOX_MSRP'); */?>:</b>					
					<?php /*echo $this->item->box_msrp; */?> &euro;</li-->	
					
					<?php if($this->item->mastercarton_box_length > 0): ?>
						<li><b><?php echo JText::_('COM_PANELS_PANEL_MASTERCARTON_BOX_DIMENSIONS'); ?>:</b>
						<?php echo $this->item->mastercarton_box_length; ?> x <?php echo $this->item->mastercarton_box_width; ?> x <?php echo $this->item->mastercarton_box_height; ?> mm</li>	
					<?php endif; ?>

					<?php if($this->item->mastercarton_box_msrp > 0): ?>
						<!--li><b><?php /*echo JText::_('COM_PANELS_FORM_LBL_PANEL_MASTERCARTON_BOX_MSRP'); */?>:</b>					
						<?php /*echo $this->item->mastercarton_box_msrp; */?> &euro;</li-->
					<?php endif; ?>					
				</div>

				<div class="product_technical_title">
					<?php echo JText::_('COM_PANELS_LEGEND_ROW_MATERIALS'); ?>
				</div>
				
				<div class="product_technical_details">				
					<li><b><?php echo JText::_('COM_PANELS_PANEL_MATERIAL'); ?>: </b>
					
					<?php if($this->item->wood == 1): ?>
						<?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_WOOD'); ?>
						
						<?php if($this->item->metal == 1 || $this->item->fabric == 1 || $this->item->foam == 1 || $this->item->polystyrene == 1): ?>
							<span>,</span>
						<?php endif; ?>
					
					<?php endif; ?>
					
					<?php if($this->item->metal == 1): ?>
						<?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_METAL'); ?>
						
						<?php if($this->item->fabric == 1 || $this->item->foam == 1 || $this->item->polystyrene == 1): ?>
							<span>,</span>
						<?php endif; ?>
					
					<?php endif; ?>
					
					<?php if($this->item->fabric == 1): ?>
						<?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FABRIC'); ?>
						
						<?php if($this->item->foam == 1 || $this->item->polystyrene == 1): ?>
							<span>,</span>
						<?php endif; ?>
					
					<?php endif; ?>

					<?php if($this->item->foam == 1): ?>
						<?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FOAM'); ?>
						
						<?php if($this->item->polystyrene == 1): ?>
							<span>,</span>
						<?php endif; ?>
					
					<?php endif; ?>
					
					<?php if($this->item->polystyrene == 1): ?>
						<?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_POLYSTYRENE'); ?>
					<?php endif; ?>												
					
					</li>		
														
					<?php if($this->item->wood_type) : ?>								
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_WOOD_TYPE'); ?>:</b>
						<?php echo ucwords($this->item->wood_type); ?></li>
					<?php endif; ?>	
					<?php if($this->item->fabric_type) : ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FABRIC_TYPE'); ?>:</b>
						<?php echo ucwords($this->item->fabric_type); ?></li>
					<?php endif; ?>	
					<?php if($this->item->foam_type) : ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FOAM_TYPE'); ?>:</b>
						<?php echo ucwords($this->item->foam_type); ?></li>	
					<?php endif; ?>			
					<?php if($this->item->polystyrene_density != 0) : ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_POLYSTYRENE_DENSITY'); ?>:</b>
						<?php echo $this->item->polystyrene_density; ?></li>			
					<?php endif; ?>				
								
				</div>
				
				<div class="product_technical_title">
					<?php echo JText::_('COM_PANELS_LEGEND_DESIGN'); ?>
				</div>
				
				<div class="product_technical_details">
					<?php if($this->item->wood_color): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_WOOD_COLOR'); ?>:</b>
						<?php echo ucwords($this->item->wood_color); ?></li>	
					<?php endif; ?>
									
					<?php if($this->item->metal_color): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_METAL_COLOR'); ?>:</b>
						<?php echo ucwords($this->item->metal_color); ?></li>
					<?php endif; ?>
					
					<?php if($this->item->fabric_color): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_FABRIC_COLOR'); ?>:</b>
						<?php echo ucwords($this->item->fabric_color); ?></li>
					<?php endif; ?>
					
					<?php if($this->item->polystyrene): ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_POLYSTYRENE_COLOR'); ?>:</b>
						<?php echo ucwords($this->item->polystyrene_color); ?></li>
					<?php endif; ?>					
					
					<?php if($this->item->edge_leveled == 1 || $this->item->edge_angled == 1): ?>
						<li><b><?php echo JText::_('COM_PANELS_PANEL_EDGES'); ?>: </b>
						
							<?php if($this->item->edge_leveled == 1): ?>
								<?php echo JText::_('COM_PANELS_PANEL_EDGE_LEVELED'); ?>

								<?php if($this->item->edge_angled == 1): ?>
									<span>,</span>
								<?php endif; ?>
							
							<?php endif; ?>
							
							<?php if($this->item->edge_angled == 1): ?>
								<?php echo JText::_('COM_PANELS_PANEL_EDGE_ANGLED'); ?>
							<?php endif; ?>
						
						</li>		
					<?php endif; ?>																								
				</div>
		
				<div class="product_technical_title">
					<?php echo JText::_('COM_PANELS_LEGEND_INSTALLATION'); ?>
				</div>
				
				<div class="product_technical_details">
	
					<?php if($this->item->installation_wall == 1 || $this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || 
						$this->item->installation_corner == 1): ?>
						<li><b><?php echo JText::_('COM_PANELS_PANEL_INSTALLATION_PLACE'); ?>: </b>
						
						<?php if($this->item->installation_wall == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_INSTALLATION_WALL'); ?>
							
							<?php if($this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_corner == 1): ?>
								<span>,</span>
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if($this->item->installation_ceiling == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_INSTALLATION_CEILING'); ?>
							
							<?php if($this->item->installation_floor == 1 || $this->item->installation_corner == 1): ?>
								<span>,</span>
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if($this->item->installation_floor == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_INSTALLATION_FLOOR'); ?>
							
							<?php if($this->item->installation_corner == 1): ?>
								<span>,</span>
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if($this->item->installation_corner == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_INSTALLATION_CORNER'); ?>																			
						<?php endif; ?>												
						
						</li>		
					<?php endif; ?>		
					
					<?php if($this->item->load_weight > 0) : ?>
						<li><b><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_LOAD_WEIGHT'); ?>:</b>
						<?php echo $this->item->load_weight; ?> kg</li>
					<?php endif; ?>				
					
					<?php if($this->item->fixing_type_standard15 == 1 || $this->item->fixing_type_standard24 == 1 || $this->item->fixing_type_clipin == 1 ||
						$this->item->fixing_type_screwed == 1 || $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1): ?>
						<li><b><?php echo JText::_('COM_PANELS_PANEL_FIXING_TYPE'); ?>: </b>
						
						<?php if($this->item->fixing_type_standard15 == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_FIXING_TYPE_STANDARD15'); ?>
							
							<?php if($this->item->fixing_type_standard24 == 1 || $this->item->fixing_type_clipin == 1 || $this->item->fixing_type_screwed == 1 ||
							 $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1): ?>
								,
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if($this->item->fixing_type_standard24 == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_FIXING_TYPE_STANDARD24'); ?>
							
							<?php if($this->item->fixing_type_clipin == 1 || $this->item->fixing_type_screwed == 1 ||
							$this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1): ?>
								,
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if($this->item->fixing_type_clipin == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_FIXING_TYPE_CLIPIN'); ?>
							
							<?php if($this->item->fixing_type_screwed == 1 || $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1): ?>
								,
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if($this->item->fixing_type_screwed == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_FIXING_TYPE_SCREWED'); ?>
							
							<?php if($this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1): ?>
								,
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if($this->item->fixing_type_glued == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_FIXING_TYPE_GLUED'); ?>
							
							<?php if($this->item->fixing_type_adhesive == 1): ?>
								,
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if($this->item->fixing_type_adhesive == 1): ?>
							<?php echo JText::_('COM_PANELS_PANEL_FIXING_TYPE_ADHESIVE'); ?>							
						<?php endif; ?>
						
						</li>		
					<?php endif; ?>		
					
				</div>	
			</div>	
				
			<div class="product_portfolio_images">
				<?php 
					$visited1 = false;
					$visited2 = false;
					$visited3 = false; 
				?>

				<?php foreach ($this->items as $i=>$item) :	?>
												
					<?php if($item->portfolio_photo_id1 != 0 && !$visited1 && $item->portfolio_photo_id1 == $this->item->portfolio_photo_id1): ?>
						<a class="product_portfolio_image" href="<?php echo $tokens[3] . '/portfolio/portfolio/'. (int)$item->portfolio_photo_id1; ?>">
							<img alt="" src="<?php echo $item->portfolio_photo1_thumbnail; ?>" width="260px" height="160px">
							<div><?php echo $item->portfolio_photo1_label; ?></div>
						</a>
						<?php $visited1 = true; ?>
					<?php endif;?>
				
					<?php if($item->portfolio_photo_id2 != 0 && !$visited2 && $item->portfolio_photo_id2 == $this->item->portfolio_photo_id2): ?>
						<a class="product_portfolio_image" href="<?php echo $tokens[3] . '/portfolio/portfolio/'. (int)$item->portfolio_photo_id2; ?>">
							<img alt="" src="<?php echo $item->portfolio_photo2_thumbnail; ?>" width="260px" height="160px">
							<div><?php echo $item->portfolio_photo2_label; ?></div>
						</a>
						<?php $visited2 = true; ?>
					<?php endif;?>
				
					<?php if($item->portfolio_photo_id3 != 0 && !$visited3 && $item->portfolio_photo_id3 == $this->item->portfolio_photo_id3): ?>
						<a class="product_portfolio_image" href="<?php echo $tokens[3] . '/portfolio/portfolio/'. (int)$item->portfolio_photo_id3; ?>">
							<img alt="" src="<?php echo $item->portfolio_photo3_thumbnail; ?>" width="260px" height="160px">
							<div><?php echo $item->portfolio_photo3_label; ?></div>
						</a>
						<?php $visited3 = true; ?>
					<?php endif;?>
				<?php endforeach ;?>
			</div>								
			
			<?php
				$has_similars = 0; 
				foreach ($this->items as $i => $item) :
					if($item->family == $this->item->family) :
						$has_similars++;
					endif;
				endforeach;
			?>
			
			<?php if($has_similars > 1): ?>
				<table class="product_similar_table">
					<thead>
						<tr>																		
							<th class='left product_similar_title'>
								<div class="product_similar_title_label">
									<?php echo JText::_('COM_PANELS_PANEL_SIMILAR_PANELS'); ?>
								</div>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_PANELS_PANELS_REF', 'a.ref'); ?>
							</th>
							
							<?php if($this->item->wood == 1) : ?>								
								<th class='left'>
								<?php echo JText::_('COM_PANELS_PANELS_WOOD_COLOR', 'a.wood_color'); ?>
								</th>
							<?php endif; ?>
							<?php if($this->item->metal == 1) : ?>
								<th class='left'>
								<?php echo JText::_('COM_PANELS_PANELS_METAL_COLOR', 'a.metal_color'); ?>
								</th>
							<?php endif; ?>
							<?php if($this->item->fabric == 1) : ?>
								<th class='left'>
								<?php echo JText::_('COM_PANELS_PANELS_FABRIC_COLOR', 'a.fabric_color'); ?>
								</th>	
							<?php endif; ?>
							<?php if($this->item->polystyrene == 1) : ?>
								<th class='left'>
								<?php echo JText::_('COM_PANELS_PANELS_POLYSTYRENE_COLOR', 'a.polystyrene_color'); ?>
								</th>
							<?php endif; ?>
					
							<th class='left'>
								<?php echo JText::_('COM_PANELS_PANELS_ABSORPTION_FREQUENCY', 'a.absorption_frequency'); ?>
							</th>
							<th class='left'>
								<?php echo JText::_('COM_PANELS_PANELS_AW', 'a.aw'); ?>
							</th>						
							<th class='left'>
								<?php echo JText::_('COM_PANELS_PANELS_NRC', 'a.nrc'); ?>
							</th>
							
						</tr>
					</thead>
					
					<tbody>							
						
					<?php foreach ($this->items as $i => $item) :	?>
					
						<?php if($item->family == $this->item->family) : 
							$url=getimagesize('images/panels/photos_150px/'. $item->ref .'_150.png'); ?>

							<tr class="row<?php echo $i % 2; ?>">											
				
								<td>
									<?php if($item->photo_150px) : ?>
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>"	rel="../../../../../<?php echo $item->photo_150px; ?>">
											<?php echo $this->escape($item->name); ?>
										</a>
									<?php elseif(!is_array($url)): ?>
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>" 
											rel="../../../../../images/not_available_small.png">
											<?php echo $this->escape($item->name); ?>
										</a>
									<?php else :?>										
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>" 
											rel="../../../../../images/panels/photos_150px/<?php echo $item->ref; ?>_150.png">
											<?php echo $this->escape($item->name); ?>
										</a>
									<?php endif; ?>
								</td>
								<td>
									<?php echo $item->ref; ?>
								</td>
								
								<?php if($this->item->wood == 1) : ?>								
									<td>
									<?php echo ucwords($item->wood_color); ?>
									</td>
								<?php endif; ?>
								<?php if($this->item->metal == 1) : ?>
									<td>
									<?php echo ucwords($item->metal_color); ?>
									</td>
								<?php endif; ?>
								<?php if($this->item->fabric == 1) : ?>
									<td>
									<?php echo ucwords($item->fabric_color); ?>
									</td>	
								<?php endif; ?>
								<?php if($this->item->polystyrene == 1) : ?>
									<td>
									<?php echo ucwords($item->polystyrene_color); ?>
									</td>
								<?php endif; ?>
							
								<td>
									<?php echo ucwords($item->absorption_frequency); ?>
								</td>
								<td>
									<?php echo $item->aw; ?>
								</td>								
								<td>
									<?php echo $item->nrc; ?>
								</td>									              
							</tr>
						
						<?php endif; ?>
					<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
	    </ul>	  
	</div>
    
    
    
	<?php 
		
		class PDF extends FPDF{ 					
				
			function Header(){
			    $this->Image('images/icons/cab-pdf.jpg', 0, 0, 210);
			    $this->SetFont('Arial','B',16);

			    $panel_name = $GLOBALS['panel_name'];

				$this->Cell(40,10, $panel_name);
			    $this->Ln(23);
			}	
			function Footer(){
			    $this->Image('images/icons/footer-pdf.jpg', 0, 258, 210);
			    //$this->Ln(23);
			}
		}


		if (isset($_POST['img_PDF'])):
			$img_PDF = $_POST['img_PDF']; 
			file_put_contents('images/graphs/graph_' . $this->item->name . '.png', base64_decode($img_PDF));
			
			if(file_exists('images/graphs/graph_' . $this->item->name . '.png')){
		        // We'll be outputting a PNG
		        header('Content-type: image/png');
		        // It will be called name.png
		        header('Content-Disposition: attachment; filename="images/graphs/graph_' . $this->item->name . '.png"');
		       
				readfile("images/graphs/graph_' . $this->item->name . '.png");
			}					
		endif;	
		
	
		$pdf = new PDF();
		$pdf->SetAutoPageBreak(true, 40);
		$pdf->AddPage();
		
		$url=getimagesize('images/panels/photos_300px/'. $this->item->ref .'_220.png');

		if($this->item->photo_300px):						
			$pdf->Image($this->item->photo_300px, 10, 30, 60);
		elseif(!is_array($url)):
			$pdf->Image('images/not_available_medium.png', 10, 30, 60);    				
		else :
    		$pdf->Image('images/panels/photos_300px/' . $this->item->ref . '_220.png', 10, 30, 67);
		endif;

		$pdf->Image('images/icons/contactos-pdf.jpg', 155, 33, 46);

		
		$pdf->SetDrawColor(150);
		$pdf->SetFont('Arial','',9);
		$pdf->SetXY(10, 87);								
		
		$description1 = iconv('UTF-8', 'windows-1252', $this->item->description1);
		$description2 = iconv('UTF-8', 'windows-1252', $this->item->description2);
		
		$pdf->Ln();
		$pdf->MultiCell(190,4,strip_tags($description1));
		$pdf->Ln();
		$pdf->MultiCell(190,4,strip_tags($description2));
		$pdf->Ln();				
		
		if(isset($img_PDF)) :
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 39, JText::_('COM_PANELS_LEGEND_GRAPH'), 'R');
			//$pdf->SetX(10);
			//$pdf->Cell(27, 39, "", 'R');
			$pdf->Image('images/graphs/graph_' . $this->item->name . '.png', 40, null, 150);
			$pdf->Ln(9);
		endif;
		
		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('COM_PANELS_LEGEND_MAIN_INFO'));
		
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_REF') . ": " . $this->item->ref, 'L');
		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_EAN13') . ": " . $this->item->ean13, 'L');
		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_HS_CODE') . ": " . $this->item->hs_code, 'L');
		$pdf->Ln(6);				
		$pdf->SetX(37);
		
		if($this->item->diameter == 0):		
			$pdf->Cell(90, 5, JText::_('COM_PANELS_PANEL_DIMENSIONS') . ": " .$this->item->length . " x " . $this->item->width . " x " . $this->item->thickness . " mm", 'L');				
		else :
			$pdf->Cell(90, 5, JText::_('COM_PANELS_PANEL_DIMENSIONS') . ": " .$this->item->thickness . " x " . $this->item->diameter . " mm", 'L');
		endif; 
		
		$pdf->Ln();

		if($this->item->weight != 0) :
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_WEIGHT') . ": " . $this->item->weight . " kg", 'L');
			$pdf->Ln();
		endif;

		if($this->item->density != 0) :
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_DENSITY') . ": " . $this->item->density, 'L');
			$pdf->Ln();
		endif;

		$pdf->SetX(37);
		
		if($this->item->scratch_resistance == 1) :
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_SCRATCH_RESISTANCE') . ": Yes", 'L');
		elseif($this->item->scratch_resistance == 0) :
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_SCRATCH_RESISTANCE') . ": No", 'L');
		endif;
								
		$pdf->Ln();
		$pdf->SetX(37);
		
		if($this->item->washable == 1) :
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_WASHABLE') . ": Yes", 'L');
		elseif($this->item->washable == 0) :
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_WASHABLE') . ": No", 'L');
		endif;
		
		$pdf->Ln();

		if($this->item->recycle_coefficient != 0) :
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_RECYCLE_COEFFICIENT') . ": " . $this->item->recycle_coefficient . " %", 'L');
			$pdf->Ln();
		endif;

		$pdf->Ln(9);
		
		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('COM_PANELS_LEGEND_PERFORMANCE'));
		
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FUNCTIONALITY') . ": " . ucwords($this->item->functionality), 'L');
		$pdf->Ln();
		$pdf->SetX(37);			
		$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_ABSORPTION_FREQUENCY') . ": " . ucwords($this->item->absorption_frequency), 'L');
		$pdf->Ln();

		if($this->item->absorption_class != ""):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_ABSORPTION_CLASS') . ": " . ucwords($this->item->absorption_class), 'L');
			$pdf->Ln();
		endif;

		if($this->item->aw != ""):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, iconv('UTF-8', 'windows-1252', JText::_('COM_PANELS_FORM_LBL_PANEL_AW')) . ": " .  ' ' . $this->item->aw, 'L');
			$pdf->Ln();
		endif;

		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_NRC') . ": " . $this->item->nrc, 'L');
		$pdf->Ln(6);
												
		
		if($this->item->fire_class_en):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_EN') . ": " . $this->item->fire_class_en, 'L');
			$pdf->Ln();
		endif;			
		if($this->item->fire_class_din):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_DIN') . ": " . $this->item->fire_class_din, 'L');
			$pdf->Ln();
		endif;
		if($this->item->fire_class_nf_p):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_NF_P') . ": " . $this->item->fire_class_nf_p, 'L');
			$pdf->Ln();
		endif;
		if($this->item->fire_class_uni):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_UNI') . ": " . $this->item->fire_class_uni, 'L');
			$pdf->Ln();
		endif;
		if($this->item->fire_class_bs):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FIRE_CLASS_BS') . ": " . $this->item->fire_class_bs, 'L');
			$pdf->Ln();
		endif;
		if($this->item->humidity_class != 0):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_HUMIDITY_CLASS') . ": " . $this->item->humidity_class, 'L');
			$pdf->Ln();
		endif;
		if($this->item->light_reflection != 0):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_LIGHT_REFLECTION') . ": " . $this->item->light_reflection . " %", 'L');
			$pdf->Ln();
		endif;
		if($this->item->humidity_resistance != 0):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_HUMIDITY_RESISTANCE') . ": " . $this->item->humidity_resistance . " %", 'L');
			$pdf->Ln();
		endif;
		if($this->item->thermal_conductivity != 0):
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_THERMAL_CONDUCTIVITY') . ": " . $this->item->thermal_conductivity . " W/mK", 'L');					
		endif;
		$pdf->Ln(9);
		
		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('COM_PANELS_LEGEND_SHIPPING'));				
		$pdf->SetFont('Arial','',9);	
					
		if($this->item->units_per_box == 1) :
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_UNITS_PER_BOX') . ": " . $this->item->units_per_box . " box", 'L');						
		else: 
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_UNITS_PER_BOX') . ": " . $this->item->units_per_box . " boxes", 'L');
		endif;
		
		$pdf->Ln();

		if($this->item->box_weight != 0 || $this->item->box_width != 0 || $this->item->box_height != 0) :
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_PANEL_BOX_DIMENSIONS') . ": " . $this->item->box_length . " x " . $this->item->box_width ." x " . $this->item->box_height ." mm", 'L');
			$pdf->Ln();
		endif;

		if($this->item->box_weight != 0) :
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_BOX_WEIGHT') . ": " . $this->item->box_weight . " kg", 'L');
			$pdf->Ln();
		endif;

		/*$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_BOX_MSRP') . ": " . $this->item->box_msrp . iconv('UTF-8', 'windows-1252', " €"), 'L');
		$pdf->Ln();*/

		if($this->item->mastercarton_box_length != 0 || $this->item->mastercarton_box_width != 0 || $this->item->mastercarton_box_height != 0) :
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_PANELS_PANEL_MASTERCARTON_BOX_DIMENSIONS') . ": " . $this->item->mastercarton_box_length . " x " . $this->item->mastercarton_box_width . " x " . $this->item->mastercarton_box_height . " mm", 'L');
			$pdf->Ln();
		endif;

		/*
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_MASTERCARTON_BOX_MSRP') . ": " . $this->item->mastercarton_box_msrp . iconv('UTF-8', 'windows-1252', " €"), 'L');
		*/
		$pdf->Ln(9);
		
		
		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('COM_PANELS_LEGEND_ROW_MATERIALS'));
		
		$pdf->SetFont('Arial','',9);
		$pdf->SetX(37);
		$pdf->Cell(13, 5, JText::_('COM_PANELS_PANEL_MATERIAL') . ": ", 'L');
		
		if($this->item->wood == 1):										
			$pdf->Cell(8, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_WOOD'));
													
			if($this->item->metal == 1 || $this->item->fabric == 1 || $this->item->foam == 1 || $this->item->polystyrene == 1):
				$pdf->Cell(2, 5, ",");						
			endif;					
		endif;		
					
		if($this->item->metal == 1):
			$pdf->Cell(8, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_METAL'));
			
			if($this->item->foam == 1 || $this->item->fabric == 1 || $this->item->polystyrene == 1):
				$pdf->Cell(2, 5, ",");	
			endif;				
		endif;	
					
		if($this->item->fabric == 1):
			$pdf->Cell(9, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FABRIC'));
								
			if($this->item->foam == 1 || $this->item->polystyrene == 1):
				$pdf->Cell(2, 5, ",");	
			endif;				
		endif;	
					
		if($this->item->foam == 1):
			$pdf->Cell(9, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FOAM'));
								
			if($this->item->polystyrene == 1): 
				$pdf->Cell(2, 5, ",");	
			endif;				
		endif;	

		if($this->item->polystyrene == 1):
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_POLYSTYRENE'));					
		endif;	
									
		$pdf->Ln();	
		
		if($this->item->wood_type) :
			$pdf->SetX(37);										
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_WOOD_TYPE') . ": " . ucwords($this->item->wood_type), 'L');
			$pdf->Ln();
		endif;	
		
		if($this->item->fabric_type) :
			$pdf->SetX(37);	
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FABRIC_TYPE') . ": " . ucwords($this->item->fabric_type), 'L');
			$pdf->Ln();								
		endif;
		if($this->item->foam_type) :
			$pdf->SetX(37);	
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FOAM_TYPE') . ": " . ucwords($this->item->foam_type), 'L');
			$pdf->Ln();	
		endif;			
		if($this->item->polystyrene_density != 0) :
			$pdf->SetX(37);	
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_POLYSTYRENE_DENSITY') . ": " . ucwords($this->item->polystyrene_density), 'L');	
			$pdf->Ln();								
		endif;		
		
		$pdf->Ln(9);
		
		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('COM_PANELS_LEGEND_DESIGN'), 'R');
		
		$pdf->SetFont('Arial','',9);
		$pdf->SetX(37);							
		
		if($this->item->wood_color):
			$pdf->SetX(37);	
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_WOOD_COLOR') . ": " . ucwords($this->item->wood_color), 'L');	
			$pdf->Ln();
		endif;
						
		if($this->item->metal_color):
			$pdf->SetX(37);	
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_METAL_COLOR') . ": " . ucwords($this->item->metal_color), 'L');	
			$pdf->Ln();				
		endif;
		
		if($this->item->fabric_color):
			$pdf->SetX(37);	
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_FABRIC_COLOR') . ": " . ucwords($this->item->fabric_color), 'L');	
			$pdf->Ln();				
		endif;
		
		if($this->item->polystyrene):
			$pdf->SetX(37);	
			$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_POLYSTYRENE_COLOR') . ": " . ucwords($this->item->polystyrene_color), 'L');	
			$pdf->Ln();				
		endif;			
		
		if($this->item->edge_leveled == 1 || $this->item->edge_angled == 1):					
			$pdf->SetX(37);	
			$pdf->Cell(11, 5, JText::_('COM_PANELS_PANEL_EDGES') . ": ", 'L');					
			
			if($this->item->edge_leveled == 1):
				$pdf->Cell(11.5, 5, JText::_('COM_PANELS_PANEL_EDGE_LEVELED'));						

				if($this->item->edge_angled == 1):
					$pdf->Cell(2, 5, ",");
				endif;					
			endif;
			
			if($this->item->edge_angled == 1):
				$pdf->Cell(13, 5, JText::_('COM_PANELS_PANEL_EDGE_ANGLED'));	
				$pdf->Ln();	
			endif;
		endif;		
		
		$pdf->Ln(9);
		
		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('COM_PANELS_LEGEND_INSTALLATION'));
		
		$pdf->SetFont('Arial','',9);
		$pdf->SetX(37);	
		
		if($this->item->installation_wall == 1 || $this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_corner == 1):
			$pdf->Cell(10, 5, JText::_('COM_PANELS_PANEL_INSTALLATION_PLACE') . ": ", 'L');					
				
				if($this->item->installation_wall == 1):
					$pdf->Cell(6, 5, JText::_('COM_PANELS_PANEL_INSTALLATION_WALL'));
					
					if($this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_corner == 1):
						$pdf->Cell(2, 5, ",");
					endif;						
				endif;
				
				if($this->item->installation_ceiling == 1):
					$pdf->Cell(10, 5, JText::_('COM_PANELS_PANEL_INSTALLATION_CEILING'));
					
					if($this->item->installation_floor == 1 || $this->item->installation_corner == 1):
						$pdf->Cell(2, 5, ",");
					endif;						
				endif;
				
				if($this->item->installation_floor == 1):
					$pdf->Cell(7, 5, JText::_('COM_PANELS_PANEL_INSTALLATION_FLOOR'));
												
					if($this->item->installation_corner == 1):
						$pdf->Cell(2, 5, ",");
					endif;						
				endif;
				
				if($this->item->installation_corner == 1):
					$pdf->Cell(8, 5, JText::_('COM_PANELS_PANEL_INSTALLATION_CORNER'));
				endif;											
				
				$pdf->Ln();							
			endif;	
			
			if($this->item->load_weight != 0):
				$pdf->SetX(37);
				$pdf->Cell(13, 5, JText::_('COM_PANELS_FORM_LBL_PANEL_LOAD_WEIGHT') . ": " . $this->item->load_weight . " kg", 'L');
				$pdf->Ln();
			endif;
				
			if($this->item->fixing_type_standard15 == 1 || $this->item->fixing_type_standard24 == 1 || $this->item->fixing_type_clipin == 1 ||
				$this->item->fixing_type_screwed == 1 || $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1):				
				$pdf->SetX(37);
				$pdf->Cell(18, 5, JText::_('COM_PANELS_PANEL_FIXING_TYPE') . ": ", 'L');

				if($this->item->fixing_type_standard15 == 1):
					$pdf->Cell(23, 5, JText::_('COM_PANELS_PANEL_FIXING_TYPE_STANDARD15'));
					
					if($this->item->fixing_type_standard24 == 1 || $this->item->fixing_type_clipin == 1 || $this->item->fixing_type_screwed == 1 ||
					 $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1):
						$pdf->Cell(2, 5, ",");
					endif;
				
				endif;
				
				if($this->item->fixing_type_standard24 == 1): 
					$pdf->Cell(23, 5, JText::_('COM_PANELS_PANEL_FIXING_TYPE_STANDARD24'));
					
					if($this->item->fixing_type_clipin == 1 || $this->item->fixing_type_screwed == 1 || $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1):
						$pdf->Cell(2, 5, ",");
					endif;
				
				endif;
				
				if($this->item->fixing_type_clipin == 1):
					$pdf->Cell(9, 5, JText::_('COM_PANELS_PANEL_FIXING_TYPE_CLIPIN'));
					
					if($this->item->fixing_type_screwed == 1 || $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1):
						$pdf->Cell(2, 5, ",");
					endif;
				
				endif;
				
				if($this->item->fixing_type_screwed == 1):
					$pdf->Cell(12.5, 5, JText::_('COM_PANELS_PANEL_FIXING_TYPE_SCREWED'));
												
					if($this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1):
						$pdf->Cell(2, 5, ",");
					endif;
				
				endif;
				
				if($this->item->fixing_type_glued == 1):
					$pdf->Cell(8.5, 5, JText::_('COM_PANELS_PANEL_FIXING_TYPE_GLUED'));
												
					if($this->item->fixing_type_adhesive == 1):
						$pdf->Cell(2, 5, ",");
					endif;
				
				endif;
				
				if($this->item->fixing_type_adhesive == 1):
					$pdf->Cell(15, 5, JText::_('COM_PANELS_PANEL_FIXING_TYPE_ADHESIVE'));							
				endif;						
					
			endif;	
			
		
		header('Content-Type: application/pdf');
		$pdf->Output("images/pdfs/panels/technical_files/" . str_replace(" ", "-", $this->item->name) . ".pdf"); 
	?>
	
    
<?php else: ?>
    Could not load the item
<?php endif; ?>