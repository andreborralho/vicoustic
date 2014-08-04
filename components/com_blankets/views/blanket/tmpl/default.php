<?php
/**
 * @version     1.0.0
 * @package     com_blankets
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      AndrÃ© Borralho <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;
require_once('fpdf/fpdf.php');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_blankets', JPATH_ADMINISTRATOR);

$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$document->addScript('scripts/galleria-1.2.9.min.js');
?>


<?php if( $this->item ) : 

	$GLOBALS['blanket_name'] = $this->item->name;
	$url=getimagesize('images/blankets/photos_300px/'. $this->item->ref .'_220.png');

?>

    <div class="item_fields">
        
        <ul id="blankets_fields_list" class="products_fields_list">
        	
        	<h1 class="product_name">
        		<?php echo $this->item->name; ?>
        	</h1>
        	    			
        	<div id="blanket_main_img">
        		<?php if($this->item->photo_300px): ?>
        			<img alt="<?php echo $this->item->name; ?>" src="<?php echo $this->item->photo_300px; ?>" data-big="http://www.vicoustic.com/<?php echo $this->item->photo_1024px; ?>">>
        		<?php elseif(!is_array($url)): ?>
    				<img alt="<?php echo $this->item->name; ?>" src="images/not_available_medium.png" style="padding-top:20px">
				<?php else : ?>
    				<img alt="<?php echo $this->item->name; ?>" src="images/blankets/photos_300px/<?php echo $this->item->ref; ?>_220.png" data-big="http://www.vicoustic.com/images/blankets/photos_1024px/<?php echo $this->item->ref; ?>_HD.png">
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
        				<?php echo JText::_('COM_BLANKETS_BLANKET_DOCUMENTS'); ?>
        			</li>
        		     			
	        		<?php if($this->item->catalog_page):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->catalog_page; ?>"> <?php echo JText::_('COM_BLANKETS_BLANKET_CATALOG_PAGE') ?></a>
        				</li>
        			<?php endif; ?>

	        		<li class="product_link">
	        			<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="images/pdfs/blankets/technical_files/<?php echo $this->item->name ?>.pdf"> <?php echo JText::_('COM_BLANKETS_BLANKET_TECHNICAL_FILE') ?></a>
	        		</li>
	        		
	        		<?php if($this->item->installation_manual):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->installation_manual; ?>"> <?php echo JText::_('COM_BLANKETS_BLANKET_INSTALLATION_MANUAL') ?></a>
        				</li>
        			<?php endif; ?>	        	

        			<?php if($this->item->warranty):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->warranty; ?>"> <?php echo JText::_('COM_BLANKETS_BLANKET_WARRANTY') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->drawings):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->drawings; ?>"> <?php echo JText::_('COM_BLANKETS_BLANKET_DRAWINGS') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->safety_data):?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->safety_data; ?>"> <?php echo JText::_('COM_BLANKETS_BLANKET_SAFETY_DATA') ?></a>
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
							
			<div class="product_technical_info">		
				<div class="product_technical_title">
					<?php echo JText::_('COM_BLANKETS_LEGEND_MAIN_INFO') ?>			
				</div>
				
				<div class="product_technical_details">	
					<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_REF'); ?>:</b>
					<?php echo $this->item->ref; ?></li>
					<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_EAN13'); ?>:</b>
					<?php echo $this->item->ean13; ?></li>					
					<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_HS_CODE'); ?>:</b>
					<?php echo $this->item->hs_code; ?></li>		
					<li></li>			
					<li><b><?php echo JText::_('COM_BLANKETS_BLANKET_DIMENSIONS') ?>: </b>
					<?php echo number_format((float)$this->item->length, 0, '.', ''); ?> x <?php echo number_format((float)$this->item->width, 0, '.', ''); ?> x 
					<?php echo number_format((float)$this->item->thickness, 0, '.', ''); ?> mm</li>
					
					<?php if($this->item->weight > 0):?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_WEIGHT'); ?>:</b>
							<?php echo $this->item->weight; ?> kg
						</li>
					<?php endif; ?>	
					
					<?php if($this->item->density > 0):?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_DENSITY'); ?>:</b>
							<?php echo $this->item->density; ?>
						</li>
					<?php endif; ?>				

					<?php if($this->item->recycle_coefficient > 0):?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_RECYCLE_COEFFICIENT'); ?>:</b>
							<?php echo $this->item->recycle_coefficient; ?> %
						</li>
					<?php endif; ?>
				</div>

				<div class="product_technical_title">
					<?php echo JText::_('COM_BLANKETS_LEGEND_PERFORMANCE'); ?>
				</div>
					
				<div class="product_technical_details">

					<?php if($this->item->rw > 0):?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_RW'); ?>:</b>
							<?php echo ucwords($this->item->rw); ?> dB
						</li>
					<?php endif; ?>

					<?php if($this->item->rw_ctr > 0):?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_RW_CTR'); ?>:</b>
							<?php echo $this->item->rw_ctr; ?> dB
						</li>
					<?php endif; ?>
								
					<?php if($this->item->stc > 0):?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_STC'); ?>:</b>
							<?php echo $this->item->stc; ?> dB
						</li>
					<?php endif; ?>
				
					<?php if($this->item->dnfw > 0):?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_DNFW'); ?>:</b>
							<?php echo $this->item->dnfw; ?>
						</li>
					<?php endif; ?>				
					
					<li></li>
					
					<?php if($this->item->fire_class_en != ""): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_EN'); ?>:</b>
						<?php echo $this->item->fire_class_en; ?></li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_din != ""): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_DIN'); ?>:</b>
						<?php echo $this->item->fire_class_din; ?></li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_nf_p != ""): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_NF_P'); ?>:</b>
						<?php echo $this->item->fire_class_nf_p; ?></li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_uni != ""): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_UNI'); ?>:</b>
						<?php echo $this->item->fire_class_uni; ?></li>
					<?php endif; ?>
					
					<?php if($this->item->fire_class_bs != ""): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_BS'); ?>:</b>
						<?php echo $this->item->fire_class_bs; ?></li>
					<?php endif; ?>
					
					<li></li>
					
					<?php if($this->item->humidity_resistance > 0): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_HUMIDITY_RESISTANCE'); ?>:</b>
						<?php echo $this->item->humidity_resistance; ?> %</li>
					<?php endif; ?>

					<?php if($this->item->thermal_conductivity > 0): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_THERMAL_CONDUCTIVITY'); ?>:</b>
						<?php echo $this->item->thermal_conductivity; ?> W/mK</li>
					<?php endif; ?>						
				</div>
								
				
				<div class="product_technical_title">
					<?php echo JText::_('COM_BLANKETS_LEGEND_SHIPPING'); ?>
				</div>
				
				<div class="product_technical_details">
					<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_UNITS_PER_BOX'); ?>:</b>
						<?php echo $this->item->units_per_box; ?>						
					</li>
					<?php if($this->item->box_length > 0): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_BLANKET_BOX_DIMENSIONS'); ?>:</b>
						<?php echo number_format((float)$this->item->box_length, 0, '.', ''); ?> x 

						<?php if($this->item->box_width > 0): ?>
							<?php echo number_format((float)$this->item->box_width, 0, '.', ''); ?> x <?php echo number_format((float)$this->item->box_height, 0, '.', ''); ?> mm</li>
						<?php elseif($this->item->box_diameter > 0): ?>
							<?php echo number_format((float)$this->item->box_diameter, 0, '.', ''); ?> mm</li>
						<?php endif; ?>
					<?php endif; ?>

					<?php if($this->item->box_weight > 0): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_BOX_WEIGHT'); ?>:</b>
						<?php echo $this->item->box_weight; ?> kg</li>
					<?php endif; ?>

					<?php if($this->item->box_volume > 0): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_BOX_VOLUME'); ?>:</b>
						<?php echo $this->item->box_volume; ?> m<span style="vertical-align:super; font-size:0.8em">3</span></li>
					<?php endif; ?>
					
					<!--li><b><?php/* echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_BOX_MSRP'); */?>:</b>
					<?php /*echo $this->item->box_msrp;*/ ?> &euro;</li-->	
					
					<?php if($this->item->units_per_pallet != ""): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_UNITS_PER_PALLET'); ?>:</b>
						<?php echo $this->item->units_per_pallet; ?></li>
					<?php endif; ?>

					<?php if($this->item->mastercarton_box_length > 0): ?>
						<li><b><?php echo JText::_('COM_BLANKETS_BLANKET_PALLET_DIMENSIONS'); ?>:</b>
						<?php echo $this->item->mastercarton_box_length; ?> x <?php echo $this->item->mastercarton_box_width; ?> x <?php echo $this->item->mastercarton_box_height; ?> mm</li>
					<?php endif; ?>

					<?php /*if($this->item->mastercarton_box_msrp > 0):*/ ?>
						<!--li><b><?php /*echo JText::_('COM_BLANKETS_FORM_LBL_BLANKET_PALLET_MSRP'); */?>:</b>
						<?php/* echo $this->item->mastercarton_box_msrp; */?> &euro;</li-->
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
									<?php echo JText::_('COM_BLANKETS_BLANKET_SIMILAR_BLANKETS'); ?>
								</div>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_BLANKETS_BLANKETS_REF', 'a.ref'); ?>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_BLANKETS_BLANKETS_EAN13', 'a.ean13'); ?>
							</th>
							
							<th class='left'>
							<?php echo JText::_('COM_BLANKETS_BLANKET_DIMENSIONS'); ?>
							</th>							
						</tr>
					</thead>
						
					<tbody>							
						<?php foreach ($this->items as $i => $item) :	?>
						
							<?php if($item->family == $this->item->family) : ?>
								<tr class="row<?php echo $i % 2; ?>">											
					
									<td>
										<?php if($item->photo_150px) : ?>
											<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_blankets&view=blanket&id=' . (int)$item->id); ?>"
												rel="../../../../../<?php echo $item->photo_150px; ?>">
												<?php echo $this->escape($item->name); ?>
											</a>
										<?php else :?>
											<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_blankets&view=blanket&id=' . (int)$item->id); ?>" 
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
										<?php echo number_format((float)$item->length, 0, '.', ''); ?> x <?php echo number_format((float)$item->width, 0, '.', ''); ?> x <?php echo number_format((float)$item->thickness, 0, '.', ''); ?> mm 
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

			    $blanket_name = $GLOBALS['blanket_name'];

				$this->Cell(40,10, $blanket_name);
			    $this->Ln(23);
			}	
			function Footer(){
			    $this->Image('images/icons/footer-pdf.jpg', 0, 258, 210);
			}
		}

			$pdf = new PDF();
			$pdf->AddPage();
			$pdf->SetAutoPageBreak(true, 32);
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
			$pdf->Cell(27, 7, JText::_('COM_BLANKETS_LEGEND_MAIN_INFO'));
			
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_REF') . ": " . $this->item->ref, 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_EAN13') . ": " . $this->item->ean13, 'L');
			$pdf->Ln();			
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_HS_CODE') . ": " . $this->item->hs_code, 'L');
			$pdf->Ln(6);				
			$pdf->SetX(37);
			
			if($this->item->diameter == 0):		
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_BLANKET_DIMENSIONS') . ": " . number_format((float)$this->item->length, 0, '.', '') . " x " . number_format((float)$this->item->width, 0, '.', '') . " x " . number_format((float)$this->item->thickness, 0, '.', '') . " mm", 'L');				
			else :
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_BLANKET_DIMENSIONS') . ": " .number_format((float)$this->item->thickness, 0, '.', '') . " x " . number_format((float)$this->item->diameter, 0, '.', '') . " mm", 'L');
			endif; 
			
			$pdf->Ln();

			if($this->item->weight != 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_WEIGHT') . ": " . $this->item->weight . " kg", 'L');
				$pdf->Ln();
			endif;

			if($this->item->density != 0):		
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_DENSITY') . ": " . $this->item->density, 'L');
				$pdf->Ln();
			endif;

			if($this->item->recycle_coefficient != 0):
				$pdf->SetX(37);			
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_RECYCLE_COEFFICIENT') . ": " . $this->item->recycle_coefficient . " %", 'L');
			endif;
			$pdf->Ln(9);
			
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_BLANKETS_LEGEND_PERFORMANCE'));
			
			$pdf->SetFont('Arial','',9);
			
			if($this->item->rw > 0):
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_RW') . ": " . ucwords($this->item->rw) . " dB", 'L');
				$pdf->Ln();
			endif;

			if($this->item->rw_ctr > 0):
				$pdf->SetX(37);			
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_RW_CTR') . ": " . ucwords($this->item->rw_ctr) . " dB", 'L');
				$pdf->Ln();
			endif;

			if($this->item->stc > 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_STC') . ": " . ucwords($this->item->stc) . " dB", 'L');
				$pdf->Ln();
			endif;

			if($this->item->dnfw > 0):
				$pdf->SetX(37);				
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_DNFW') . ": " .  ' ' . $this->item->dnfw, 'L');
				$pdf->Ln();
			endif;			
	
			
			if($this->item->fire_class_en):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_EN') . ": " . $this->item->fire_class_en, 'L');
				$pdf->Ln();
			endif;
			if($this->item->fire_class_m):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_M') . ": " . $this->item->fire_class_m, 'L');
				$pdf->Ln();
			endif;
			if($this->item->fire_class_nf_p):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_NF_P') . ": " . $this->item->fire_class_nf_p, 'L');
				$pdf->Ln();
			endif;
			if($this->item->fire_class_uni):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_UNI') . ": " . $this->item->fire_class_uni, 'L');
				$pdf->Ln();
			endif;
			if($this->item->fire_class_bs):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_FIRE_CLASS_BS') . ": " . $this->item->fire_class_bs, 'L');
				$pdf->Ln();
			endif;
			if($this->item->humidity_class != 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_HUMIDITY_CLASS') . ": " . $this->item->humidity_class, 'L');
				$pdf->Ln();
			endif;
			
			if($this->item->humidity_resistance != 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_HUMIDITY_RESISTANCE') . ": " . $this->item->humidity_resistance . " %", 'L');
				$pdf->Ln();
			endif;
			if($this->item->thermal_conductivity != 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_THERMAL_CONDUCTIVITY') . ": " . $this->item->thermal_conductivity . " W/mK", 'L');					
			endif;
			$pdf->Ln(9);
			
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_BLANKETS_LEGEND_SHIPPING'));				
			$pdf->SetFont('Arial','',9);	
						
			
			$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_UNITS_PER_BOX') . ": " . $this->item->units_per_box, 'L');
			
			
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_BLANKETS_BLANKET_BOX_DIMENSIONS') . ": " . $this->item->box_length . " x " . $this->item->box_width ." x " . $this->item->box_height ." mm", 'L');
			$pdf->Ln();

			if($this->item->box_weight != 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_BOX_WEIGHT') . ": " . $this->item->box_weight . " kg", 'L');
			/*$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_BOX_MSRP') . ": " . $this->item->box_msrp . iconv('UTF-8', 'windows-1252', " €"), 'L');
			*/	$pdf->Ln();
			endif;

			if($this->item->mastercarton_box_length != 0 && $this->item->mastercarton_box_width != 0 && $this->item->mastercarton_box_height != 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_BLANKETS_BLANKET_PALLET_DIMENSIONS') . ": " . $this->item->mastercarton_box_length . " x " . $this->item->mastercarton_box_width . " x " . $this->item->mastercarton_box_height . " mm", 'L');
			endif;
			/*$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_BLANKETS_FORM_LBL_BLANKET_PALLET_MSRP') . ": " . $this->item->mastercarton_box_msrp . iconv('UTF-8', 'windows-1252', " €"), 'L');
			*/
			
			header('Content-Type: application/pdf');
			$pdf->Output("images/pdfs/blankets/technical_files/" . $this->item->name . ".pdf"); 		
	?>
	
    
<?php else: ?>
    Could not load the item
<?php endif; ?>