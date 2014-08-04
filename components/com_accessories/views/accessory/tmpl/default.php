<?php
/**
 * @version     1.0.0
 * @package     com_accessories
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;
require_once('fpdf/fpdf.php');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_accessories', JPATH_ADMINISTRATOR);

$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$document->addScript('scripts/galleria-1.2.9.min.js');
?>

   
        
<?php if( $this->item ) : 
	$GLOBALS['accessory_name'] = $this->item->name;
?>

    <div class="item_fields">
        
        <ul id="accessories_fields_list" class="products_fields_list">

			<h1 class="product_name">
				<?php echo $this->item->name; ?>
			</h1>
						
        	<div id="accessory_main_img">
        		<?php if($this->item->photo_300px && $this->item->photo_1024px): ?>
        			<img alt="<?php echo $this->item->name; ?>" src="<?php echo $this->item->photo_300px; ?>" data-big="http://www.vicoustic.com/<?php echo $this->item->photo_1024px; ?>">
				<?php elseif($this->item->photo_300px): ?>
        			<img alt="<?php echo $this->item->name; ?>" src="<?php echo $this->item->photo_300px; ?>">
        		<?php else : ?>
    				<img alt="<?php echo $this->item->name; ?>" src="images/not_available_medium.png" style="padding-top:20px">
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
        				<?php echo JText::_('COM_ACCESSORIES_ACCESSORY_DOCUMENTS'); ?>
        			</li>
        			
	        		<?php if($this->item->catalog_page): ?>
        				<li class="product_link product_link_first">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->catalog_page; ?>"> <?php echo JText::_('COM_ACCESSORIES_ACCESSORY_CATALOG_PAGE') ?></a>
        				</li>
        			<?php endif; ?>

	        		<li class="product_link product_link_first">
	        			<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="images/pdfs/accessories/technical_files/<?php echo $this->item->name ?>.pdf"> <?php echo JText::_('COM_ACCESSORIES_ACCESSORY_TECHNICAL_FILE') ?></a>
	        		</li>
	        		
	        		<?php if($this->item->installation_manual): ?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->installation_manual; ?>"> <?php echo JText::_('COM_ACCESSORIES_ACCESSORY_INSTALLATION_MANUAL') ?></a>
        				</li>
        			<?php endif; ?>
	        		
	        		<?php if($this->item->sketchup): ?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->sketchup; ?>"> <?php echo JText::_('COM_ACCESSORIES_ACCESSORY_SKETCHUP') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->warranty): ?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->warranty; ?>"> <?php echo JText::_('COM_ACCESSORIES_ACCESSORY_WARRANTY') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->drawings): ?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->drawings; ?>"> <?php echo JText::_('COM_ACCESSORIES_ACCESSORY_DRAWINGS') ?></a>
        				</li>
        			<?php endif; ?>

        			<?php if($this->item->safety_data): ?>
        				<li class="product_link">
        					<img alt="" src="images/icons/plus_arrow.gif"><a class="product_links_a" href="<?php echo $this->item->safety_data; ?>"> <?php echo JText::_('COM_ACCESSORIES_ACCESSORY_SAFETY_DATA') ?></a>
        				</li>
        			<?php endif; ?>        			
        		</ul>
    		</div>
        		
			<li class="product_description1"><?php echo $this->item->description1; ?></li>
			</br>
			<li class="product_description2">
				<?php if($this->item->description2):
					echo $this->item->description2;
					endif; ?>
			</li>

			<div class="product_technical_info">
				<div class="product_technical_title">
					<?php echo JText::_('COM_ACCESSORIES_LEGEND_MAIN_INFO') ?>					
				</div>
				
				<div class="product_technical_details">	
					<li><b><?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_REF'); ?>:</b>
					<?php echo $this->item->ref; ?></li>
					<li><b><?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_EAN13'); ?>:</b>
					<?php echo $this->item->ean13; ?></li>				
					<li><b><?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_HS_CODE'); ?>:</b>
					<?php echo $this->item->hs_code; ?></li>
					<li></li>

					<?php if($this->item->recycle_coefficient > 0):?>
						<li><b><?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_RECYCLE_COEFFICIENT'); ?>:</b>
							<?php echo $this->item->recycle_coefficient; ?> %
						</li>
					<?php endif; ?>
				</div>			
			
				<div class="product_technical_title">
					<?php echo JText::_('COM_ACCESSORIES_LEGEND_SHIPPING'); ?>
				</div>
					
				<div class="product_technical_details">
					<li><b><?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_UNITS_PER_BOX'); ?>:</b>
					<?php echo $this->item->units_per_box; ?></li>

					<?php if($this->item->box_length > 0 && $this->item->box_width > 0):?>
						<li><b><?php echo JText::_('COM_ACCESSORIES_LEGEND_BOX_DIMENSIONS'); ?>:</b>
							<?php echo number_format((float)$this->item->box_length, 0, '.', ''); ?> x <?php echo number_format((float)$this->item->box_width, 0, '.', ''); ?> x <?php echo number_format((float)$this->item->box_height, 0, '.', ''); ?> mm
						</li>
					<?php endif; ?>
					
					<?php if($this->item->box_weight > 0):?>
						<li><b><?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_BOX_WEIGHT'); ?>:</b>
							<?php echo $this->item->box_weight; ?> kg
						</li>
					<?php endif; ?>

					<?php if($this->item->box_volume > 0):?>
						<li><b><?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_BOX_VOLUME'); ?>:</b>
							<?php echo $this->item->box_volume; ?> m<span style="vertical-align:super; font-size:0.8em">3</span>
						</li>
					<?php endif; ?>
								
					<!--li><b><?php /*echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_BOX_MSRP'); */?>:</b>					
					<?php/* echo $this->item->box_msrp; */?> &euro;</li-->				
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
									<?php echo JText::_('COM_ACCESSORIES_LEGEND_SIMILAR_ACCESSORIES'); ?>
								</div>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_REF', 'a.ref'); ?>
							</th>
							<th class='left'>
							<?php echo JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_EAN13', 'a.ean13'); ?>
							</th>
						</tr>
					</thead>
						
					<tbody>							
					<?php foreach ($this->items as $i => $item) : ?>
						<?php if($item->family == $this->item->family) : ?>
							
							<tr class="row<?php echo $i % 2; ?>">											
								<td>
									<?php if($item->photo_150px) : ?>
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_accessories&view=accessory&id=' . (int)$item->id); ?>" 
											rel="../../../../../<?php echo $item->photo_150px; ?>">
											<?php echo $this->escape($item->name); ?>
										</a>	
									<?php else :?>
										<a class="product_similar_link" href="<?php echo JRoute::_('index.php?option=com_accessories&view=accessory&id=' . (int)$item->id); ?>" 
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

			    $accessory_name = $GLOBALS['accessory_name'];

				$this->Cell(40,10, $accessory_name);
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
			$pdf->Cell(27, 7, JText::_('COM_ACCESSORIES_LEGEND_MAIN_INFO'));
			$pdf->SetX(10);
			$pdf->Cell(27, 45, "");
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_REF') . ": " . $this->item->ref, 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_EAN13') . ": " . $this->item->ean13, 'L');
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_HS_CODE') . ": " . $this->item->hs_code, 'L');
			$pdf->Ln();
			
			if($this->item->recycle_coefficient > 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_RECYCLE_COEFFICIENT') . ": " . $this->item->recycle_coefficient . " %", 'L');
				$pdf->Ln(6);	
			endif;

			$pdf->SetX(37);
			$pdf->Ln(9);
			
			
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 7, JText::_('COM_ACCESSORIES_LEGEND_SHIPPING'));				
			$pdf->SetFont('Arial','',9);	
						
			$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_UNITS_PER_BOX') . ": " . $this->item->units_per_box, 'L');						
			
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_LEGEND_BOX_DIMENSIONS') . ": " . number_format((float)$this->item->box_length, 0, '.', '') . " x " . number_format((float)$this->item->box_width, 0, '.', '') ." x " . number_format((float)$this->item->box_height, 0, '.', '') ." mm", 'L');
			$pdf->Ln();

			if($this->item->box_weight > 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_BOX_WEIGHT') . ": " . $this->item->box_weight . " kg", 'L');
				$pdf->Ln();
			endif;

			if($this->item->box_volume > 0):
				$pdf->SetX(37);
				$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_BOX_VOLUME') . ": " . $this->item->box_volume . " m3", 'L');
				$pdf->Ln();
			endif;

			/*$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('COM_ACCESSORIES_FORM_LBL_ACCESSORY_BOX_MSRP') . ": " . $this->item->box_msrp . iconv('UTF-8', 'windows-1252', " €"), 'L');
			*/$pdf->Ln(9);
				
			
			header('Content-Type: application/pdf');
			$pdf->Output("images/pdfs/accessories/technical_files/" . $this->item->name . ".pdf"); 	
	?>
		
<?php else: ?>
    Could not load the item
<?php endif; ?>