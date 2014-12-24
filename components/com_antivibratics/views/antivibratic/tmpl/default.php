<?php
/**
 * @version     1.0.0
 * @package     com_antivibratics
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      AndrÃ© Borralho <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;
require_once JPATH_BASE . '/libraries/fpdf/fpdf.php';

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_antivibratics', JPATH_ADMINISTRATOR);

$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$document->addScript('scripts/galleria-1.2.9.min.js');

?>


<?php if( $this->item ) : 
	$GLOBALS['antivibratic_name'] = $this->item->name;
?>

    <div class="item_fields">
        
        <ul id="antivibratics_fields_list" class="products_fields_list">
        	
        	<h1 class="product_name">
        		<?php echo $this->item->name; ?>
        	</h1>
        	    			
        	<div id="antivibratic_main_img">
        		<?php if($this->item->photo_300px): ?>
        			<img alt="<?php echo $this->item->name; ?>" src="<?php echo $this->item->photo_300px; ?>">
        		<?php else : ?>
    				<img alt="<?php echo $this->item->name; ?>" src="images/not_available_medium.png" style="padding-top:20px">
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
	        		 	<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_DOCUMENTS'); ?> 
	    		 	</li>  

	        		<?php if($this->item->catalog_page): ?>
        				<li class="product_link">
        					<img src="images/icons/plus_arrow.gif" alt=""> <a class="product_links_a" href="<?php echo $this->item->catalog_page; ?>"> <?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_CATALOG_PAGE') ?></a>
        				</li>
        			<?php endif; ?>

	        		<li class="product_link">
	        			<img src="images/icons/plus_arrow.gif" alt=""> <a class="product_links_a" href="images/pdfs/antivibratics/technical_files/<?php echo $this->item->name; ?>.pdf"> <?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_TECHNICAL_FILE') ?></a>
	        		</li>
	        		
	        		<?php if($this->item->installation_manual): ?>
        				<li class="product_link">
        					<img src="images/icons/plus_arrow.gif" alt=""> <a class="product_links_a" href="<?php echo $this->item->installation_manual; ?>"> <?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_MANUAL') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->warranty): ?>
        				<li class="product_link">
        					<img src="images/icons/plus_arrow.gif" alt=""> <a class="product_links_a" href="<?php echo $this->item->warranty; ?>"> <?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_WARRANTY') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->drawings): ?>
        				<li class="product_link">
        					<img src="images/icons/plus_arrow.gif" alt=""> <a class="product_links_a" href="<?php echo $this->item->drawings; ?>"> <?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_DRAWINGS') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->safety_data): ?>
        				<li class="product_link">
        					<img src="images/icons/plus_arrow.gif" alt=""> <a class="product_links_a" href="<?php echo $this->item->safety_data; ?>"> <?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_SAFETY_DATA') ?></a>
        				</li>
        			<?php endif; ?>
        		</ul>
    		</div>
    		
			<li class="product_description1"><?php echo $this->item->description1; ?></li>
			<br>
			<li class="product_description2">
				<?php if($this->item->description2):
					echo $this->item->description2;
					endif; ?>
			</li>
							
			<div class="product_technical_info">
				<div class="product_technical_title">
					<?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_MAIN_INFO') ?>
				</div>
				
				<div class="product_technical_details">	
					<li><b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_REF'); ?>:</b>
						<?php echo $this->item->ref; ?>
					</li>
					<li><b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_EAN13'); ?>:</b>
						<?php echo $this->item->ean13; ?>
					</li>				
					<li><b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_HS_CODE'); ?>:</b>
						<?php echo $this->item->hs_code; ?>
					</li>		
					<li></li>

					<?php if($this->item->recycle_coefficient > 0):?>
						<li><b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_RECYCLE_COEFFICIENT'); ?>:</b>
							<?php echo $this->item->recycle_coefficient; ?> %
						</li>
					<?php endif; ?>
				</div>

				<div class="product_technical_title">
					<?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_PERFORMANCE'); ?>
				</div>
				
				<div class="product_technical_details">	
					<li>
						<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_MOUNTING_WIDTH'); ?>:</b>
						<?php echo $this->item->mounting_width; ?>
					</li>
					
					<?php if($this->item->rupture_point > 0): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_RUPTURE_POINT'); ?>:</b>
							<?php echo $this->item->rupture_point; ?> kg
						</li>
					<?php endif; ?>

					<li>
						<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_LOAD_WEIGHT'); ?>:</b>
						<?php if($this->item->load_weight_min == $this->item->load_weight_max): ?>
							<?php echo $this->item->load_weight_min; ?> Kg
						<?php else: ?>
							<?php echo $this->item->load_weight_min; ?> to <?php echo $this->item->load_weight_max; ?> Kg
						<?php endif; ?>
					</li>

					<li></li>
					
					<?php if($this->item->fire_class_en != ""): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_EN'); ?>:</b>
							<?php echo $this->item->fire_class_en; ?>
						</li>
					<?php endif; ?>					
					
					<?php if($this->item->fire_class_din != ""): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_DIN'); ?>:</b>
							<?php echo $this->item->fire_class_din; ?>
						</li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_nf_p != ""): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_NF_P'); ?>:</b>
							<?php echo $this->item->fire_class_nf_p; ?>
						</li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_uni != ""): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_UNI'); ?>:</b>
							<?php echo $this->item->fire_class_uni; ?>
						</li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_bs != ""): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_BS'); ?>:</b>
							<?php echo $this->item->fire_class_bs; ?>
						</li>
					<?php endif; ?>										
				</div>
									
				<div class="product_technical_title">
					<?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_INSTALLATION'); ?>
				</div>
					
				<div class="product_technical_details">

					<?php if($this->item->installation_wall == 1 || $this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || 
						$this->item->installation_division_wall == 1): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_PLACE'); ?>: </b>
						
							<?php if($this->item->installation_wall == 1): ?>
								<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_WALL'); ?>
								
								<?php if($this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_division_wall == 1): ?>
									<span>,</span>
								<?php endif; ?>
							
							<?php endif; ?>
							
							<?php if($this->item->installation_ceiling == 1): ?>
								<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_CEILING'); ?>
								
								<?php if($this->item->installation_floor == 1 || $this->item->installation_division_wall == 1): ?>
									<span>,</span>
								<?php endif; ?>
							
							<?php endif; ?>
							
							<?php if($this->item->installation_floor == 1): ?>
								<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_FLOOR'); ?>
								
								<?php if($this->item->installation_division_wall == 1): ?>
									<span>,</span>
								<?php endif; ?>
							
							<?php endif; ?>
							
							<?php if($this->item->installation_division_wall == 1): ?>
								<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_DIVISION_WALL'); ?>																			
							<?php endif; ?>																	
						</li>					
					<?php endif; ?>		

					<li>
						<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_STEEL'); ?>: </b>
						<?php if($this->item->steel == 1): ?>
							Yes		
						<?php else: ?>
							No											
						<?php endif; ?>	
					</li>
					<?php if($this->item->rubber_color): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_RUBBER_COLOR'); ?>: </b>
							<?php echo ucwords($this->item->rubber_color); ?>
						</li>
					<?php endif; ?>

					<?php if($this->item->angle_adaptation == 1): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_ANGLE_ADAPTATION'); ?>: </b>					
							Yes																							
						</li>
					<?php endif; ?>

					<?php if($this->item->hooking_system == 1): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_HOOKING_SYSTEM'); ?>: </b>					
							Yes		
						</li>
					<?php endif; ?>

					<?php if($this->item->security_devices > 0): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_SECURITY_DEVICES'); ?>: </b>
							<?php echo ucwords($this->item->security_devices); ?>
						</li>
					<?php endif; ?>
						
					<li>
						<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_SECURITY_DEVICES'); ?>: </b>
						<?php if($this->item->fire_security_devices == 1): ?>
							Yes		
						<?php else: ?>
							No											
						<?php endif; ?>	
					</li>

					<?php if($this->item->plate_thickness > 0): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_PLATE_THICKNESS'); ?>: </b>
							<?php echo ucwords($this->item->plate_thickness); ?> mm
						</li>
					<?php endif; ?>

					<?php if($this->item->plate_length > 0): ?>
						<li>
							<b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_PLATE_LENGTH'); ?>: </b>
							<?php echo ucwords($this->item->plate_length); ?> mm
						</li>
					<?php endif; ?>
				</div>	

				<div class="product_technical_title">
					<?php echo JText::_('COM_ANTIVIBRATICS_LEGEND_SHIPPING'); ?>
				</div>
				
				<div class="product_technical_details">
					<!--li><b><?php /*echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_MSRP'); */?>:</b>
						<?php /*echo $this->item->msrp; */?> &euro;
					</li-->
					<li><b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_UNITS_PER_BOX'); ?>:</b>
						<?php echo $this->item->units_per_box; ?>						
					</li>
					<li><b><?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_BOX_DIMENSIONS'); ?>:</b>
						<?php echo $this->item->box_length; ?> x <?php echo $this->item->box_width; ?> x <?php echo $this->item->box_height; ?> mm
					</li>
					<li><b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_BOX_WEIGHT'); ?>:</b>
						<?php echo $this->item->box_weight; ?> kg
					</li>
					<li><b><?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_BOX_VOLUME'); ?>:</b>
						<?php echo $this->item->box_volume; ?> m<span style="vertical-align:super; font-size:0.8em">3</span>
					</li>
					<!--li><b><?php /*echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_BOX_MSRP');*/ ?>:</b>					
						<?php /*echo $this->item->box_msrp; */?> &euro;
					</li-->	
					
					<?php if($this->item->mastercarton_box_length > 0): ?>
						<li><b><?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_MASTERCARTON_BOX_DIMENSIONS'); ?>:</b>
							<?php echo $this->item->mastercarton_box_length; ?> x <?php echo $this->item->mastercarton_box_width; ?> x <?php echo $this->item->mastercarton_box_height; ?> mm
						</li>
					<?php endif; ?>	
					
					<?php /*if($this->item->mastercarton_box_msrp > 0): */?>
						<!--li><b><?php /*echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_MASTERCARTON_BOX_MSRP'); */?>:</b>					
							<?php /*echo $this->item->mastercarton_box_msrp;*/ ?> &euro;
						</li-->
					<?php /*endif; */?>				
				</div>
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
						<?php break; ?>	
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
			
			<?php if($has_similars > 1) : ?>				
				<table class="product_similar_table">
					<thead>
						<tr>																		
							<th class='left product_similar_title'>
								<div class="product_similar_title_label">
									<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_SIMILAR_ANTIVIBRATICS'); ?>
								</div>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATICS_REF', 'a.ref'); ?>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATICS_EAN13', 'a.ean13'); ?>
							</th>
							
							<th class='left'>
							<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATICS_MOUNTING_WIDTH', 'a.mounting_width'); ?>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_LOAD_WEIGHT', 'a.load_weight_max'); ?>
							</th>							
						</tr>
					</thead>
					
					<tbody>							
						
					<?php foreach ($this->items as $i => $item) :	?>
					
						<?php if($item->family == $this->item->family) : ?>
							<tr class="row<?php echo $i % 2; ?>">											
				
								<td>
									<?php if($item->photo_150px) : ?>
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_antivibratics&view=antivibratic&id=' . (int)$item->id); ?>"
											rel="../../../../../<?php echo $item->photo_150px; ?>">
											<?php echo $this->escape($item->name); ?>
										</a>	
									<?php else :?>
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_antivibratics&view=antivibratic&id=' . (int)$item->id); ?>" 										
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
									<?php echo $item->mounting_width; ?>
								</td>
								<td>
									<?php if($this->item->load_weight_min == $this->item->load_weight_max): ?>
										<?php echo $this->item->load_weight_min; ?> Kg
									<?php else: ?>
										<?php echo $this->item->load_weight_min; ?> to <?php echo $this->item->load_weight_max; ?> Kg
									<?php endif; ?>
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

			    $antivibratic_name = $GLOBALS['antivibratic_name'];

				$this->Cell(40,10, $antivibratic_name);
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
				$pdf->Image($this->item->photo_300px, 10, 30, 60);
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
		
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_ANTIVIBRATICS_LEGEND_MAIN_INFO'));
		
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_REF') . ": " . $this->item->ref, 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_EAN13') . ": " . $this->item->ean13, 'L');
			$pdf->Ln();			
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_HS_CODE') . ": " . $this->item->hs_code, 'L');
			$pdf->Ln();				
		
			if($this->item->recycle_coefficient != 0) :
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_RECYCLE_COEFFICIENT') . ": " . $this->item->recycle_coefficient . " %", 'L');
			endif;
			$pdf->Ln(9);
			
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_ANTIVIBRATICS_LEGEND_PERFORMANCE'));
			
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_MOUNTING_WIDTH') . ": " . $this->item->mounting_width, 'L');
			$pdf->Ln();
			
			if($this->item->rupture_point > 0):
				$pdf->SetX(37);			
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_RUPTURE_POINT') . ": " . $this->item->rupture_point . " Kg", 'L');
				$pdf->Ln();
			endif;

			$pdf->SetX(37);
			if($this->item->load_weight_min == $this->item->load_weight_max):				
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_LOAD_WEIGHT') . ": " . $this->item->load_weight_min . " Kg", 'L');
			else:
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_LOAD_WEIGHT') . ": " . $this->item->load_weight_min . " to " . $this->item->load_weight_max . " Kg", 'L');
			endif;

			$pdf->Ln(6);
					
			
			if($this->item->fire_class_en):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_EN') . ": " . $this->item->fire_class_en, 'L');
				$pdf->Ln();
			endif;			
			if($this->item->fire_class_din):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_DIN') . ": " . $this->item->fire_class_din, 'L');
				$pdf->Ln();
			endif;
			if($this->item->fire_class_nf_p):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_NF_P') . ": " . $this->item->fire_class_nf_p, 'L');
				$pdf->Ln();
			endif;
			if($this->item->fire_class_uni):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_UNI') . ": " . $this->item->fire_class_uni, 'L');
				$pdf->Ln();
			endif;
			if($this->item->fire_class_bs):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_CLASS_BS') . ": " . $this->item->fire_class_bs, 'L');
				$pdf->Ln();
			endif;			
			$pdf->Ln(9);
			

			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_ANTIVIBRATICS_LEGEND_INSTALLATION'));
			
			$pdf->SetFont('Arial','',9);
			$pdf->SetX(37);	
			
			if($this->item->installation_wall == 1 || $this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || 
				$this->item->installation_division_wall == 1):
				$pdf->Cell(10, 5, JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_PLACE') . ": ", 'L');					
					
				if($this->item->installation_wall == 1):
					$pdf->Cell(6, 5, JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_WALL'));
					
					if($this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_division_wall == 1):
						$pdf->Cell(2, 5, ",");
					endif;						
				endif;
				
				if($this->item->installation_ceiling == 1):
					$pdf->Cell(10, 5, JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_CEILING'));
					
					if($this->item->installation_floor == 1 || $this->item->installation_division_wall == 1):
						$pdf->Cell(2, 5, ",");
					endif;						
				endif;
				
				if($this->item->installation_floor == 1):
					$pdf->Cell(7, 5, JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_FLOOR'));
												
					if($this->item->installation_division_wall == 1):
						$pdf->Cell(2, 5, ",");
					endif;						
				endif;
				
				if($this->item->installation_division_wall == 1):
					$pdf->Cell(8, 5, JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_DIVISION_WALL'));
				endif;											
				
				$pdf->Ln();							
			endif;	


			$pdf->SetX(37);					
			if($this->item->steel == 1):
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_STEEL') . ": Yes", 'L');
			else:
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_STEEL') . ": No", 'L');
			endif;	
			$pdf->Ln();		
								
			if($this->item->rubber_color):
				$pdf->SetX(37);
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_RUBBER_COLOR') . ": " . ucwords($this->item->rubber_color), 'L');
				$pdf->Ln();
			endif;

			if($this->item->angle_adaptation == 1):
				$pdf->SetX(37);
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_ANGLE_ADAPTATION') . ": Yes", 'L');
				$pdf->Ln();
			endif;

			if($this->item->hooking_system == 1):
				$pdf->SetX(37);
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_HOOKING_SYSTEM') . ": Yes", 'L');
				$pdf->Ln();
			endif;	

			if($this->item->security_devices > 0):
				$pdf->SetX(37);
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_SECURITY_DEVICES') . ": " . ucwords($this->item->security_devices), 'L');
				$pdf->Ln();
			endif;			

			$pdf->SetX(37);
			if($this->item->fire_security_devices == 1):				
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_SECURITY_DEVICES') . ": Yes", 'L');
			else:
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_FIRE_SECURITY_DEVICES') . ": No", 'L');
			endif;	
			$pdf->Ln();
						
			if($this->item->plate_thickness > 0):
				$pdf->SetX(37);
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_PLATE_THICKNESS') . ": " . ucwords($this->item->plate_thickness) . " mm", 'L');
				$pdf->Ln();
			endif;	

			if($this->item->plate_length > 0):
				$pdf->SetX(37);
				$pdf->Cell(13, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_PLATE_LENGTH') . ": " . ucwords($this->item->plate_length) . " mm", 'L');
				$pdf->Ln();
			endif;					
						
			$pdf->Ln(9);

			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_ANTIVIBRATICS_LEGEND_SHIPPING'));				
			$pdf->SetFont('Arial','',9);	
						
			if($this->item->units_per_box == 1) :
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_UNITS_PER_BOX') . ": " . $this->item->units_per_box . " box", 'L');						
			else: 
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_UNITS_PER_BOX') . ": " . $this->item->units_per_box . " boxes", 'L');
			endif;
			
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_BOX_DIMENSIONS') . ": " . $this->item->box_length . " x " . $this->item->box_width ." x " . $this->item->box_height ." mm", 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_BOX_WEIGHT') . ": " . $this->item->box_weight . " kg", 'L');
			/*$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_BOX_MSRP') . ": " . $this->item->box_msrp . iconv('UTF-8', 'windows-1252', " €"), 'L');
			*/
			if($this->item->mastercarton_box_length > 0 && $this->item->mastercarton_box_width > 0 && $this->item->mastercarton_box_height > 0):
				$pdf->Ln();
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_MASTERCARTON_BOX_DIMENSIONS') . ": " . $this->item->mastercarton_box_length . " x " . $this->item->mastercarton_box_width . " x " . $this->item->mastercarton_box_height . " mm", 'L');
			endif;
			/*$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ANTIVIBRATICS_FORM_LBL_ANTIVIBRATIC_MASTERCARTON_BOX_MSRP') . ": " . $this->item->mastercarton_box_msrp . iconv('UTF-8', 'windows-1252', " €"), 'L');
		*/
			$pdf->Ln(9);

					
			
			header('Content-Type: application/pdf');
			$pdf->Output("images/pdfs/antivibratics/technical_files/" . $this->item->name . ".pdf"); 		
	?>
	
    
<?php else: ?>
    Could not load the item
<?php endif; ?>