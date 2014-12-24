<?php
/**
 * @version     1.0.0
 * @package     com_doors
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;
require_once JPATH_BASE . '/libraries/fpdf/fpdf.php';

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_doors', JPATH_ADMINISTRATOR);

$document = JFactory::getDocument();

$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$document->addScript('scripts/galleria-1.2.9.min.js');
?>

<?php if( $this->item ) : 
	$GLOBALS['door_name'] = $this->item->name;
?>

    <div class="item_fields">
        
        <ul id="doors_fields_list" class="products_fields_list">
        	
        	<h1 class="product_name">
        		<?php echo $this->item->family; ?> - <?php echo $this->item->name; ?>
        	</h1>
					
			<div id="door_main_img">
        		<?php if($this->item->photo_300px): ?>
        			<img alt="<?php echo $this->item->name; ?>" src="<?php echo $this->item->photo_300px; ?>">
        		<?php else : ?>
        			<img alt="<?php echo $this->item->name; ?>" src="images/not_available_medium.png" style="padding-top:20px">
        		<?php endif; ?>
        		
        		<?php if($this->item->photo_detail1): ?>
        			<img src="<?php echo $this->item->photo_detail1; ?>" alt="Detail Photo">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail2): ?>
        			<img src="<?php echo $this->item->photo_detail2; ?>" alt="Detail Photo">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail3): ?>
        			<img src="<?php echo $this->item->photo_detail3; ?>" alt="Detail Photo">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail4): ?>
        			<img src="<?php echo $this->item->photo_detail4; ?>" alt="Detail Photo">
    			<?php endif; ?>
        		<?php if($this->item->photo_detail5): ?>
        			<img src="<?php echo $this->item->photo_detail5; ?>" alt="Detail Photo">
    			<?php endif; ?>
    		</div>
        	        			    
        	<div class="product_video">
        		<?php echo $this->item->video; ?>
    		</div>
    		
        	<div class="product_links">
        		<ul>
        			<li class="product_links_title">
        				<?php echo JText::_('COM_DOORS_DOOR_DOCUMENTS'); ?>  
        			</li>
        		     			
	        		<?php if($this->item->catalog_page):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"> <a class="product_links_a" href="<?php echo $this->item->catalog_page; ?>"><?php echo JText::_('COM_DOORS_DOOR_CATALOG_PAGE') ?></a>
        				</li>
        			<?php endif; ?>

	        		<li class="product_link">
	        			<img alt="" src="images/icons/plus_arrow.gif"> <a class="product_links_a" href="images/pdfs/doors/technical_files/<?php echo $this->item->name ?>.pdf"> <?php echo JText::_('COM_DOORS_DOOR_TECHNICAL_FILE'); ?></a>
        			</li>

	        		<?php if($this->item->installation_manual):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"> <a class="product_links_a" href="<?php echo $this->item->installation_manual; ?>"> <?php echo JText::_('COM_DOORS_DOOR_INSTALLATION_MANUAL') ?></a>
        				</li>
        			<?php endif; ?>
	        		
	        		<?php if($this->item->sketchup):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"> <a class="product_links_a" href="<?php echo $this->item->sketchup; ?>"><?php echo JText::_('COM_DOORS_DOOR_SKETCHUP') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->warranty):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"> <a class="product_links_a" href="<?php echo $this->item->warranty; ?>"><?php echo JText::_('COM_DOORS_DOOR_WARRANTY') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->drawings):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"> <a class="product_links_a" href="<?php echo $this->item->drawings; ?>"><?php echo JText::_('COM_DOORS_DOOR_DRAWINGS') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->safety_data):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"> <a class="product_links_a" href="<?php echo $this->item->safety_data; ?>"><?php echo JText::_('COM_DOORS_DOOR_SAFETY_DATA') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->acoustic_report):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"> <a class="product_links_a" href="<?php echo $this->item->acoustic_report; ?>"><?php echo JText::_('COM_DOORS_DOOR_ACOUSTIC_REPORT') ?></a>
        				</li>
        			<?php endif; ?>		
        		</ul>
    		</div>
        			
			<li class="product_description1"><?php echo $this->item->description1; ?></li>
			</br>
			<li class="product_description2"><?php echo $this->item->description2; ?></li>
							        	
	        	
	    	<div id="door_icons">
	    		
	    		<div class="door_options_titles">	        			
					<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_FINISH'); ?>     			        												
				</div>
				
				<div class="door_options_icons">
					<div class="door_icon">  					

						<?php if(strcasecmp($this->item->finish, 'Wood')== 0) : ?>
							<img alt="" src="images/doors/options_icons/wood.png" width="60px" height="60px">
							<div><?php echo JText::_('COM_DOORS_LEGEND_WOOD'); ?></div>
						<?php elseif(strcasecmp($this->item->finish, 'Grey Enamel Primer')== 0) : ?>
							<img alt="" src="images/doors/options_icons/steel.png" width="60px" height="60px">
							<div><?php echo JText::_('COM_DOORS_LEGEND_STEEL'); ?></div>
						<?php endif; ?>
					</div>
				</div>
				
				<?php if( $this->item->keylock == 1 || $this->item->antipanic_bar == 1 || $this->item->circular_double_window == 1 || 
						  $this->item->without_floor_frame == 1 || $this->item->autoclose_system == 1) : ?>  
					<div class="door_options_titles">
						<?php echo JText::_('COM_DOORS_LEGEND_INCLUDES'); ?>							      						       	 			       	 			       	 		
		   	 		</div>
		       	 		
		       	 	<div class="door_options_icons">
		       	 		<?php if( $this->item->keylock == 1) : ?>    
		  					<div class="door_icon">  					
								<img alt="" src="images/doors/options_icons/keylock.png" width="60px" height="60px">
								<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_KEYLOCK'); ?>									  
						    </div>
					    <?php endif; ?>	
						    										    								    	
		    			<?php if( $this->item->antipanic_bar == 1) : ?> 
		      				<div class="door_icon">	      				
			       	 			<img alt="" src="images/doors/options_icons/panic_bar.png" width="60px" height="60px">
			       	 			<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_ANTIPANIC_BAR'); ?>	       	 			       	 				       	 		
		       	 			</div>
		   	 			<?php endif; ?>
		       	 				       	 	
		   	 			<?php if( $this->item->circular_double_window == 1) : ?>       	 				
		       	 			<div class="door_icon">	
		       	 				<img alt="" src="images/doors/options_icons/circular_window_2.png" width="60px" height="60px">
		       	 				<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_CIRCULAR_DOUBLE_WINDOW'); ?>
		   	 				</div>
		   	 			<?php endif; ?>
		   	 			       	 				       	 		
		   	 			<?php if( $this->item->without_floor_frame == 1) : ?>
		   	 				<div class="door_icon">	       	 				
			       	 			<img alt="" src="images/doors/options_icons/removed_floor_frame.png" width="60px" height="60px">
			       	 			<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_WITHOUT_FLOOR_FRAME'); ?>       	 			
		       	 			</div>
		       	 		<?php endif; ?>
		       	 			       	 	
		 				<?php if( $this->item->autoclose_system == 1) : ?> 
		 					<div class="door_icon">	    	 					
			       	 			<img alt="" src="images/doors/options_icons/automatic_door.png" width="60px" height="60px">
			       	 			<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_AUTOCLOSE_SYSTEM'); ?>	       	 				       	 		
		       	 			</div>
		       	 		<?php endif; ?>
		       	 		
		       	 	</div>	
	       	 	<?php endif; ?>
	       	 	
	   	 		<div class="door_options_titles">	       	 			
					<?php echo JText::_('COM_DOORS_LEGEND_OPTIONS'); ?>	
	    		</div>
	    		
	    		<div class="door_options_icons">	        			
	    			<?php if( $this->item->keylock == 0) : ?>
						<div class="door_icon">									     					
							<img alt="" src="images/doors/options_icons/keylock.png" width="60px" height="60px">
							<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_KEYLOCK'); ?>								
						</div>	
					<?php endif; ?>							  
								    											    			
	    			<?php if( $this->item->antipanic_bar == 0) : ?>
	    				<div class="door_icon">       				
		       	 			<img alt="" src="images/doors/options_icons/panic_bar.png" width="60px" height="60px">
		       	 			<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_ANTIPANIC_BAR'); ?>	       	 		
	   	 				</div>	
	       	 		<?php endif; ?>
	       	 		
	       	 		<?php if( $this->item->keylock == 0 && $this->item->antipanic_bar == 0) : ?>
						<div class="door_icon">       	 			    	 				
							<img alt="" src="images/doors/options_icons/panic_bar+keylock.png" width="60px" height="60px">
							<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_KEYLOCK_ANTIPANICBAR'); ?>
						</div>
	       	 		<?php endif; ?>
	   	 			       	 			       	 		
	   	 			<?php if( $this->item->circular_double_window == 0) : ?>
						<div class="door_icon">  									      	 				
							<img alt="" src="images/doors/options_icons/circular_window_2.png" width="60px" height="60px">
							<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_CIRCULAR_DOUBLE_WINDOW'); ?>
						</div>
	       	 		<?php endif; ?>
	       	 			       	 			       	 	
	   	 			<?php if( $this->item->without_floor_frame == 0) : ?>       	 				
	       	 			<div class="door_icon">
	       	 				<img alt="" src="images/doors/options_icons/removed_floor_frame.png" width="60px" height="60px">
	       	 				<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_WITHOUT_FLOOR_FRAME'); ?>
	       	 			</div>
	       	 		<?php endif; ?>
	       	 			       	 				       	 	
	 				<?php if( $this->item->autoclose_system == 0) : ?>     	 					
	       	 			<div class="door_icon">			       	 				
							<img alt="" src="images/doors/options_icons/automatic_door.png" width="60px" height="60px">
							<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_AUTOCLOSE_SYSTEM'); ?>	       	 		
						</div>
	       	 		<?php endif; ?>
	    		</div>		        			        												
			</div>		
				
			<div class="product_technical_info">
				<div class="product_technical_title">
					<?php echo JText::_('COM_DOORS_LEGEND_MAIN_INFO'); ?>
				</div>
				
				<div class="product_technical_details">	
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_REF'); ?>:</b>
					<?php echo $this->item->ref; ?></li>
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_EAN13'); ?>:</b>
					<?php echo $this->item->ean13; ?></li>
					
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_HS_CODE'); ?>:</b>
					<?php echo $this->item->hs_code; ?></li>		
					<li></li>					
					<li><b>Free Clearance Dimensions: </b><?php echo number_format((float)$this->item->width, 0, '.', ''); ?> x <?php echo number_format((float)$this->item->height, 0, '.', ''); ?> mm</li>
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_NUMBER_OF_DOORS'); ?>:</b>
					<?php echo $this->item->number_of_doors; ?></li>
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_GROSS_WEIGHT'); ?>:</b>
					<?php echo $this->item->gross_weight; ?> kg</li>

					<?php if($this->item->recycle_coefficient > 0):?>
						<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_RECYCLE_COEFFICIENT'); ?>:</b>
						<?php echo $this->item->recycle_coefficient; ?> %</li>
					<?php endif; ?>
				</div>

				<div class="product_technical_title">
					<?php echo JText::_('COM_DOORS_LEGEND_PERFORMANCE'); ?>
				</div>
				
				<div class="product_technical_details">		
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_FIRE_RESISTANCE'); ?>:</b>
					<?php echo $this->item->fire_resistance . " " . JText::_('COM_DOORS_LEGEND_MINUTES'); ?></li>
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_RW'); ?>:</b>
					<?php echo $this->item->rw; ?> dB</li>

					<?php if($this->item->dnfw): ?>
						<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_DNFW'); ?>:</b>
						<?php echo $this->item->dnfw; ?> dB</li>
					<?php endif; ?>				
				</div>
									
				<div class="product_technical_title">
					<?php echo JText::_('COM_DOORS_LEGEND_INSTALLATION'); ?>
				</div>

				<div class="product_technical_details">								
					<li><b>Outer Measurements: </b><?php echo number_format((float)$this->item->outer_width, 0, '.', ''); ?> x 
						<?php echo number_format((float)$this->item->outer_height, 0, '.', ''); ?> mm</li>
					<li><b>Recommended Measurements for <br>the construction span: </b><?php echo number_format((float)$this->item->recommended_construction_width, 0, '.', ''); ?> x 
						<?php echo number_format((float)$this->item->recommended_construction_height, 0, '.', ''); ?> mm</li>
				</div>

				<div class="product_technical_title">
					<?php echo JText::_('COM_DOORS_LEGEND_SHIPPING_INFO'); ?>
				</div>			
				
				<div class="product_technical_details">
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_UNITS_PER_PALLET'); ?>:</b>
						<?php echo $this->item->units_per_pallet; ?>
						<?php if($this->item->units_per_pallet == 1) : ?>
							<?php echo JText::_('COM_DOORS_LEGEND_DOOR'); ?>
						<?php else: ?>
							<?php echo JText::_('COM_DOORS_LEGEND_DOORS'); ?>
						<?php endif; ?>
					</li>

					<?php if($item->pallet_length != 0 && $item->pallet_width != 0 && $item->pallet_height != 0): ?>
						<li><b><?php echo JText::_('COM_DOORS_LEGEND_PALLET_DIMENSIONS') . ": "; ?></b><?php echo number_format((float)$item->pallet_length, 0, '.', ''); ?> x 
							<?php echo number_format((float)$item->pallet_width, 0, '.', ''); ?> x <?php echo number_format((float)$item->pallet_height, 0, '.', ''); ?> mm
						</li>
					<?php endif; ?>

					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_PALLET_VOLUME'); ?>:</b>
					<?php echo $this->item->pallet_volume; ?> m<span style="vertical-align:super; font-size:0.7em">3</span></li>
					<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_PALLET_WEIGHT'); ?>:</b>
					<?php echo $this->item->pallet_weight; ?> kg</li>
					
					<?php if($this->item->msrp_state == 1) : ?>
						<li><b><?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_MSRP'); ?>:</b>
						<?php echo $this->item->msrp; ?> &euro;</li>
					<?php endif; ?>
				</div>

				<?php
					$has_similars = 0; 
					foreach ($this->items as $i => $item) :
						if($item->family == $this->item->family) :
							$has_similars++;
						endif;
					endforeach;
				?>			

				<table class="door_options_table">
					<thead>
						<tr>																		
							<th class='left door_options_title'>
								<div class="door_options_title_label">
									<?php echo JText::_('COM_DOORS_LEGEND_OPTIONS'); ?>
								</div>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_DOORS_DOORS_REF'); ?>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_DOORS_DOORS_MSRP'); ?>
							</th>																																			
						</tr>
					</thead>
					
					<tbody>																					
							
						<?php if($this->item->keylock == 0) :?>					
							<tr class="row0">															
								<td>																						
									<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_KEYLOCK'); ?>									
								</td>										
								<td>																						
									<?php echo $this->item->keylock_ref; ?>								
								</td>
								<td>
									<?php echo $this->item->keylock_msrp; ?> &euro;
								</td>					              
							</tr>
						<?php endif; ?>	
						
						<?php if($this->item->antipanic_bar == 0) :?>
							<tr class="row1">															
								<td>																						
									<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_ANTIPANIC_BAR'); ?>									
								</td>										
								<td>																						
									<?php echo $this->item->antipanic_bar_ref; ?>								
								</td>
								<td>																						
									<?php echo $this->item->antipanic_bar_msrp; ?> &euro;									
								</td>					              
							</tr>
						<?php endif; ?>	
						
						<?php if($this->item->keylock_antipanicbar == 0) :?>
							<tr class="row0">															
								<td>																						
									<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_KEYLOCK_ANTIPANICBAR'); ?>									
								</td>										
								<td>																						
									<?php echo $this->item->keylock_antipanicbar_ref; ?>								
								</td>
								<td>																						
									<?php echo $this->item->keylock_antipanicbar_msrp; ?>	&euro;									
								</td>					              
							</tr>
						<?php endif; ?>	
						
						<?php if($this->item->circular_double_window == 0) :?>
							<tr class="row1">															
								<td>																						
									<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_CIRCULAR_DOUBLE_WINDOW'); ?> (30 cm)									
								</td>										
								<td>																						
									<?php echo $this->item->circular_double_window_ref; ?>								
								</td>
								<td>																						
									<?php echo $this->item->circular_double_window_msrp; ?>	&euro;									
								</td>					              
							</tr>
						<?php endif; ?>	
						
						<?php if($this->item->without_floor_frame == 0) :?>
							<tr class="row0">															
								<td>																						
									<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_WITHOUT_FLOOR_FRAME'); ?>									
								</td>										
								<td>																						
									<?php echo $this->item->without_floor_frame_ref; ?>								
								</td>
								<td>																						
									<?php echo $this->item->without_floor_frame_msrp; ?> &euro;								
								</td>					              
							</tr>
						<?php endif; ?>	
						
						<?php if($this->item->autoclose_system == 0) :?>
							<tr class="row1">															
								<td>																						
									<?php echo JText::_('COM_DOORS_FORM_LBL_DOOR_AUTOCLOSE_SYSTEM'); ?>									
								</td>										
								<td>																						
									<?php echo $this->item->autoclose_system_ref; ?>								
								</td>
								<td>																						
									<?php echo $this->item->autoclose_system_msrp; ?> &euro;							
								</td>					              
							</tr>
						<?php endif; ?>	
													
					</tbody>
				</table>
			</div>
	
			
		

			<div class="product_portfolio_images">
				<?php foreach ($this->items as $i=>$item) :	?>
												
					<?php if($item->portfolio_photo_id1 != 0 && $item->portfolio_photo_id1 == $this->item->portfolio_photo_id1): ?>
						<div class="product_portfolio_image">
							<img alt="" src="<?php echo $item->portfolio_photo1_thumbnail; ?>" width="260px" height="160px">
							<div><?php echo $item->portfolio_photo1_label; ?></div>
						</div>
					<?php endif;?>
				
					<?php if($item->portfolio_photo_id2 != 0 && $item->portfolio_photo_id2 == $this->item->portfolio_photo_id2): ?>
						<div class="product_portfolio_image">
							<img alt="" src="<?php echo $item->portfolio_photo2_thumbnail; ?>" width="260px" height="160px">
							<div><?php echo $item->portfolio_photo2_label; ?></div>
						</div>
					<?php endif;?>									
				<?php endforeach ;?>
			</div>
			
			
			<?php if($has_similars > 1) : ?>
		
				<table class="product_similar_table">
					<thead>
						<tr>																		
							<th width="19%" class='left product_similar_title'>
								<div class="product_similar_title_label">
									<?php echo JText::_('COM_DOORS_LEGEND_SIMILAR_DOORS'); ?>
								</div>							
							</th>
							<th width="4%" class='left'>
							<?php echo JText::_('COM_DOORS_DOORS_REF', 'a.ref'); ?>
							</th>
							<th width="8%" class='left'>
							<?php echo JText::_('COM_DOORS_DOORS_EAN13', 'a.ean13'); ?>
							</th>																										
							<th width="4%" class='center'>
							<?php echo JText::_('COM_DOORS_LEGEND_NUMBER_OF_DOORS', 'a.number_of_doors'); ?>
							</th>
							<th width="14%" class='left'>
							<?php echo JText::_('COM_DOORS_LEGEND_DIMENSIONS'); ?>
							</th>
							<th width="9%" class='left'>
							<?php echo JText::_('COM_DOORS_DOORS_GROSS_WEIGHT', 'a.gross_weight'); ?>
							</th>
							<th width="12%" class='left'>
							<?php echo JText::_('COM_DOORS_DOORS_FINISH', 'a.finish'); ?>
							</th>
							<th width="5%" class='left'>
							<?php echo JText::_('COM_DOORS_DOORS_RW', 'a.rw'); ?>
							</th>
						</tr>
					</thead>
					
					<tbody>							
						
					<?php foreach ($this->items as $i => $item) :	?>
						
						<?php if($item->family == $this->item->family) : ?>
							<tr class="row<?php echo $i % 2; ?>">											
				
								<td>
									<?php if($item->photo_150px): ?>
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_doors&view=door&id=' . (int)$item->id); ?>" 
											rel="../../../../../<?php echo $item->photo_150px; ?>">
											<?php echo $this->escape($item->name); ?>
										</a>
									<?php else: ?>
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_doors&view=door&id=' . (int)$item->id); ?>" 
											rel="../../../../../images/not_available_medium.png">
											<?php echo $this->escape($item->name); ?>
										</a>
									<?php endif; ?>											
								</td>
								<td>
									<?php echo $item->ref; ?>
								</td>
								<td>
									<?php echo $item->ean13; ?>
								</td>
								
								<td>
									<?php echo $item->number_of_doors; ?>
								</td>
								<td>
									<?php echo number_format((float)$item->width, 0, '.', ''); ?> x <?php echo number_format((float)$item->height, 0, '.', ''); ?> mm 
								</td>
								<td>
									<?php echo $item->gross_weight; ?> kg
								</td>
								
								
								<td>
									<?php echo ucwords($item->finish); ?>
								</td>
								<td>
									<?php echo $item->rw; ?> dB
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

			    $door_name = $GLOBALS['door_name'];

				$this->Cell(40,10, $door_name);
			    $this->Ln(23);
			}	
			function Footer(){
			    $this->Image('images/icons/footer-pdf.jpg', 0, 258, 210);
			}
		}


			$pdf = new PDF();
			
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);

			
			if($this->item->photo_300px):
				$pdf->Image($this->item->photo_300px, 10, 35, 60);
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
						
			$pdf_currentY = $pdf->getY();
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(14, 15, JText::_('COM_DOORS_FORM_LBL_DOOR_FINISH'), 'R');					
			
			$pdf->SetFont('Arial','',7);
			if(strcasecmp($this->item->finish, 'Wood')== 0) :
				$pdf->Image('images/doors/options_icons/wood.png', 29,null,10);
				$pdf->Cell(23, 5, JText::_('COM_DOORS_LEGEND_WOOD'),0,0,'C');	
			elseif(strcasecmp($this->item->finish, 'Grey Enamel Primer')== 0) :
				$pdf->Image('images/doors/options_icons/steel.png', 29,null,10);
				$pdf->Cell(23, 5, JText::_('COM_DOORS_LEGEND_STEEL'),0,0,'C');
			endif;
			$pdf_currentX = $pdf->getX();
			
			if($this->item->keylock == 1 || $this->item->antipanic_bar == 1 || $this->item->circular_double_window == 1 || 
			  	$this->item->without_floor_frame == 1 || $this->item->autoclose_system == 1) :
				$pdf->setY($pdf_currentY);
				$pdf->setX(43);
				$pdf->SetFont('Arial','B',8);
				$pdf->Cell(15, 15, JText::_('COM_DOORS_LEGEND_INCLUDES'), 'R');					
				
				$pdf->SetFont('Arial','',7);
				if($this->item->keylock == 1) :
					$pdf->Image('images/doors/options_icons/keylock.png', 63,null,10);					
					$pdf->Cell(15, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_KEYLOCK'), 0, 0, 'C');
					$pdf_currentX = $pdf->getX();
				endif;
			  	if($this->item->antipanic_bar == 1) :
					$pdf->setX($pdf_currentX);
					$pdf->setY($pdf_currentY);
					$pdf->Image('images/doors/options_icons/panic_bar.png', $pdf_currentX + 5,null,10);
					$pdf->setX($pdf_currentX+2);
					$pdf->Cell(20, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_ANTIPANIC_BAR'), 0, 0, 'C');
					$pdf_currentX = $pdf->getX();				
				endif;				 					
				if($this->item->circular_double_window == 1) :
					$pdf->setX($pdf_currentX);
					$pdf->setY($pdf_currentY);
					$pdf->Image('images/doors/options_icons/circular_window_2.png', $pdf_currentX,null,10);
					$pdf->setX($pdf_currentX+2);
					$pdf->Cell(20, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_CIRCULAR_DOUBLE_WINDOW'), 0, 0, 'C');
					$pdf_currentX = $pdf->getX();			
				endif;											    								    	
			    if($this->item->without_floor_frame == 1) :
					$pdf->setX($pdf_currentX);
					$pdf->setY($pdf_currentY);
					$pdf->Image('images/doors/options_icons/removed_floor_frame.png', $pdf_currentX +7,null,10);
					$pdf->setX($pdf_currentX+2);
					$pdf->Cell(20, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_WITHOUT_FLOOR_FRAME'), 0, 0, 'C');
					$pdf_currentX = $pdf->getX();			
				endif;				
			    if($this->item->autoclose_system == 1) :
					$pdf->setX($pdf_currentX);
					$pdf->setY($pdf_currentY);
					$pdf->Image('images/doors/options_icons/automatic_door.png', $pdf_currentX,null,10);
					$pdf->setX($pdf_currentX+2);
					$pdf->Cell(20, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_AUTOCLOSE_SYSTEM'), 0, 0, 'C');
					$pdf_currentX = $pdf->getX();			
				endif;	   	 				       	 	
		   	 					       	 		
			endif;
			
			$pdf->setY($pdf_currentY);
			$pdf->setX($pdf_currentX+3);
			
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(15, 15, JText::_('COM_DOORS_LEGEND_OPTIONS'), 'R');					
			$pdf_currentX = $pdf->getX();
			
			$pdf->SetFont('Arial','',7);
			if($this->item->keylock == 0) :
				$pdf->Image('images/doors/options_icons/keylock.png', 69,null,10);
				$pdf->setX($pdf_currentX+2);
				$pdf->Cell(15, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_KEYLOCK'), 0, 0, 'C');
				$pdf_currentX = $pdf->getX();
			endif;
		  	if($this->item->antipanic_bar == 0) :
				$pdf->setX($pdf_currentX);
				$pdf->setY($pdf_currentY);
				$pdf->Image('images/doors/options_icons/panic_bar.png', $pdf_currentX + 5,null,10);
				$pdf->setX($pdf_currentX);
				$pdf->Cell(20, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_ANTIPANIC_BAR'), 0, 0, 'C');
				$pdf_currentX = $pdf->getX();				
			endif;				 					
			if($this->item->circular_double_window == 0) :
				$pdf->setX($pdf_currentX+3);
				$pdf->setY($pdf_currentY);
				$pdf->Image('images/doors/options_icons/circular_window_2.png', $pdf_currentX+8,null,10);
				$pdf->setX($pdf_currentX+3);
				$pdf->Cell(20, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_CIRCULAR_DOUBLE_WINDOW'), 0, 0, 'C');
				$pdf_currentX = $pdf->getX();			
			endif;											    								    	
		    if($this->item->without_floor_frame == 0) :
				$pdf->setX($pdf_currentX+7);
				$pdf->setY($pdf_currentY);
				$pdf->Image('images/doors/options_icons/removed_floor_frame.png', $pdf_currentX +12,null,10);
				$pdf->setX($pdf_currentX+7);
				$pdf->Cell(20, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_WITHOUT_FLOOR_FRAME'), 0, 0, 'C');
				$pdf_currentX = $pdf->getX();			
			endif;				
		    if($this->item->autoclose_system == 0) :
				$pdf->setX($pdf_currentX+6);
				$pdf->setY($pdf_currentY);
				$pdf->Image('images/doors/options_icons/automatic_door.png', $pdf_currentX+10,null,10);
				$pdf->setX($pdf_currentX+6);
				$pdf->Cell(20, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_AUTOCLOSE_SYSTEM'), 0, 0, 'C');
				$pdf_currentX = $pdf->getX();			
			endif;
			
			
			
			$pdf->Ln(9);
			
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_DOORS_LEGEND_MAIN_INFO'));			
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_REF') . ": " . $this->item->ref, 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_EAN13') . ": " . $this->item->ean13, 'L');
			$pdf->Ln();			
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_HS_CODE') . ": " . $this->item->hs_code, 'L');
			$pdf->Ln(6);				
			$pdf->SetX(37);							
			$pdf->Cell(90, 5, JText::_('COM_DOORS_LEGEND_DIMENSIONS') . ": " . number_format((float)$this->item->width, 0, '.', '') . " x " . number_format((float)$this->item->height, 0, '.', '') . " mm", 'L');				
			$pdf->Ln();
			$pdf->SetX(37);	
							
			if($this->item->units_per_pallet == 1) :
				$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_NUMBER_OF_DOORS') . ": " .$this->item->number_of_doors . " " . JText::_('COM_DOORS_LEGEND_DOOR'), 'L');
			else:
				$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_NUMBER_OF_DOORS') . ": " .$this->item->number_of_doors . " " . JText::_('COM_DOORS_LEGEND_DOORS'), 'L');
			endif;	
					
			$pdf->Ln();	
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_GROSS_WEIGHT') . ": " . $this->item->gross_weight . " kg", 'L');													
			$pdf->Ln(9);
			
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_DOORS_LEGEND_PERFORMANCE'));
			
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_DOORS_FIRE_RESISTANCE') . ": " . ucwords($this->item->fire_resistance) . " " . JText::_('COM_DOORS_LEGEND_MINUTES'), 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_DOORS_RW') . ": " . ucwords($this->item->rw) . " dB", 'L');
			
			if($this->item->dnfw): 
				$pdf->Ln();
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_DOORS_DOORS_DNFW') . ": " . ucwords($this->item->dnfw) . " dB", 'L');							
			endif;
			$pdf->Ln(9);


			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_DOORS_LEGEND_INSTALLATION'));				
			$pdf->SetFont('Arial','',9);	
						
			$pdf->Cell(90, 5, "Outer Measurements: " . number_format((float)$this->item->outer_width, 0, '.', '') . " x " . number_format((float)$this->item->outer_height, 0, '.', '') . " mm", 'L');						
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, "Recommended Measurements for the construction span: " . number_format((float)$this->item->recommended_construction_width, 0, '.', '') . " x " . number_format((float)$this->item->recommended_construction_height, 0, '.', '') . " mm", 'L');						
			$pdf->Ln(9);

			
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_DOORS_LEGEND_SHIPPING_INFO'));
			$pdf->SetFont('Arial','',9);	
						
			if($this->item->units_per_pallet == 1) :
				$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_UNITS_PER_PALLET') . ": " . $this->item->units_per_pallet . " " . JText::_('COM_DOORS_LEGEND_DOOR'), 'L');						
			else: 
				$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_UNITS_PER_PALLET') . ": " . $this->item->units_per_pallet . " " . JText::_('COM_DOORS_LEGEND_DOORS'), 'L');
			endif;
			
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_LEGEND_PALLET_DIMENSIONS') . ": " . number_format((float)$this->item->pallet_length, 0, '.', '') . " x " . number_format((float)$this->item->pallet_width, 0, '.', '') ." x " . number_format((float)$this->item->pallet_height, 0, '.', '') ." mm", 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_PALLET_VOLUME') . ": " . $this->item->pallet_volume . " m3", 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_PALLET_WEIGHT') . ": " . $this->item->pallet_weight . " kg", 'L');
			/*$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_DOORS_FORM_LBL_DOOR_MSRP') . ": " . $this->item->msrp . " �", 'L');			
			*/$pdf->Ln(9);							
			
			
			
			header('Content-Type: application/pdf');
			$pdf->Output("images/pdfs/doors/technical_files/" . $this->item->name . ".pdf"); 		
	?>
	
<?php else: ?>
    Could not load the item
<?php endif; ?>
