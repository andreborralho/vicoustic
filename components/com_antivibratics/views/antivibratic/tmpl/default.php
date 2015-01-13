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
?>


<?php
	if( $this->item ) {
		$GLOBALS['antivibratic_name'] = $this->item->name;
		?>

		<section id="antivibratics_fields_list" class="products_fields_list">

			<h1 class="product_name"><?php echo $this->item->name; ?></h1>

			<div class="product_main_img">
				<?php
					echo AntivibraticsHelper::renderProductGalleryImage($this->item);
					echo AntivibraticsHelper::renderProductGallerySubImage($this->item->photo_detail1);
					echo AntivibraticsHelper::renderProductGallerySubImage($this->item->photo_detail2);
					echo AntivibraticsHelper::renderProductGallerySubImage($this->item->photo_detail3);
					echo AntivibraticsHelper::renderProductGallerySubImage($this->item->photo_detail4);
					echo AntivibraticsHelper::renderProductGallerySubImage($this->item->photo_detail5);
				?>
			</div>

			<div class="product_video"><?php echo $this->item->video; ?></div>

			<div class="product_links">
				<ul>
					<li class="product_links_title"><?php echo JText::_('DOCUMENTS'); ?></li>

					<?php
						echo AntivibraticsHelper::renderProductFileLink($this->item->catalog_page, JText::_('CATALOG_PAGE'));
						echo AntivibraticsHelper::renderProductFileLink('/images/pdfs/antivibratics/technical_files/' . AntivibraticsHelper::seoUrl($this->item->name) . '.pdf', JText::_('TECHNICAL_FILE'));
						echo AntivibraticsHelper::renderProductFileLink($this->item->installation_manual, JText::_('INSTALLATION_MANUAL'));
						echo AntivibraticsHelper::renderProductFileLink($this->item->warranty, JText::_('WARRANTY'));
						echo AntivibraticsHelper::renderProductFileLink($this->item->drawings, JText::_('DRAWINGS'));
						echo AntivibraticsHelper::renderProductFileLink($this->item->safety_data, JText::_('SAFETY_DATE'));
					?>
				</ul>
			</div>

			<div class="product_description1"><?php echo $this->item->description1; ?></div>
			<div class="product_description2">
				<?php
					if(!empty($this->item->description2)) {
						echo $this->item->description2;
					}
				?>
			</div>

			<div class="product_technical_info">
				<div class="product_technical_title"><?php echo JText::_('MAIN_INFO') ?></div>

				<ul class="product_technical_details">
					<?php
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->ref, JText::_('REF'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->ean13, JText::_('EAN13'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->hs_code, JText::_('HS_CODE'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->recycle_coefficient, JText::_('RECYCLE_COEFFICIENT'), '%');
					?>
				</ul>

				<div class="product_technical_title"><?php echo JText::_('PERFORMANCE'); ?></div>

				<ul class="product_technical_details">
					<?php
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->mounting_width, JText::_('MOUNTING_WIDTH'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->rupture_point, JText::_('RUPTURE_POINT'), JText::_('KG'));
						echo AntivibraticsHelper::renderTechnicalProperty(AntivibraticsHelper::renderInterval($this->item->load_weight_min, $this->item->load_weight_max, JText::_('KG')), JText::_('LOAD_WEIGHT'));
					?>
					<li></li>
					<?php
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->fire_class_en, JText::_('FIRE_CLASS_EN'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->fire_class_din, JText::_('FIRE_CLASS_DIN'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->fire_class_nf_p, JText::_('FIRE_CLASS_NF_P'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->fire_class_uni, JText::_('FIRE_CLASS_UNI'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->fire_class_bs, JText::_('FIRE_CLASS_BS'));
					?>
				</ul>

				<div class="product_technical_title"><?php echo JText::_('INSTALLATION'); ?></div>

				<ul class="product_technical_details">
					<?php
						if($this->item->installation_wall == 1 || $this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_division_wall == 1) {
							echo AntivibraticsHelper::renderTechnicalProperty(AntivibraticsHelper::renderInstallationPlaceProperty($this->item->installation_wall, $this->item->installation_ceiling, $this->item->installation_floor, $this->item->installation_division_wall), JText::_('INSTALLATION_PLACE'));
						}

						echo AntivibraticsHelper::renderTechnicalPropertyYesNo($this->item->steel, JText::_('STEEL'));
						echo AntivibraticsHelper::renderTechnicalProperty(ucwords($this->item->rubber_color), JText::_('RUBBER_COLOR'));
						echo AntivibraticsHelper::renderTechnicalPropertyYes($this->item->angle_adaptation, JText::_('ANGLE_ADAPTATION'));
						echo AntivibraticsHelper::renderTechnicalPropertyYes($this->item->hooking_system, JText::_('HOOKING_SYSTEM'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->security_devices, JText::_('SECURITY_DEVICES'));
						echo AntivibraticsHelper::renderTechnicalPropertyYesNo($this->item->fire_security_devices, JText::_('FIRE_SECURITY_DEVICES'));
						echo AntivibraticsHelper::renderTechnicalProperty(ucwords($this->item->plate_thickness), JText::_('PLATE_THICKNESS'), JText::_('MM'));
						echo AntivibraticsHelper::renderTechnicalProperty(ucwords($this->item->plate_length), JText::_('PLATE_LENGTH'), JText::_('MM'));
					?>
				</ul>

				<div class="product_technical_title"><?php echo JText::_('SHIPPING'); ?></div>

				<ul class="product_technical_details">
					<?php
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->units_per_box, JText::_('UNITS_PER_BOX'));
						echo AntivibraticsHelper::renderDimensionsProperty($this->item->box_length, $this->item->box_width, $this->item->box_height, JText::_('BOX_DIMENSIONS'), JText::_('MM'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->box_weight, JText::_('BOX_WEIGHT'), JText::_('KG'));
						echo AntivibraticsHelper::renderTechnicalProperty($this->item->box_volume, JText::_('BOX_VOLUME'), 'm<span style="vertical-align:super; font-size:0.8em">3</span>');
						echo AntivibraticsHelper::renderDimensionsProperty($this->item->mastercarton_box_length, $this->item->mastercarton_box_width, $this->item->mastercarton_box_height, JText::_('MASTERCARTON_BOX_DIMENSIONS'), JText::_('MM'))
					?>
				</ul>
			</div>

			<div class="product_portfolio_images">
				<?php
					//TODO: tem muitos ciclos e queries e comparaçoes so para devolver uma row de uma tabela
					foreach ($this->items as $i=>$item) {
						echo AntivibraticsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id1, $item->portfolio_photo_id1, $item->portfolio_photo1_thumbnail, $item->portfolio_photo1_label);
						echo AntivibraticsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id2, $item->portfolio_photo_id2, $item->portfolio_photo2_thumbnail, $item->portfolio_photo2_label);
					}
				?>
			</div>

			<?php if(AntivibraticsHelper::hasSimilarProducts($this->items, $this->item)) { ?>
				<table class="product_similar_table">
					<thead>
					<tr>
						<th class='left product_similar_title'><?php echo JText::_('SIMILAR_ANTIVIBRATICS'); ?></th>
						<th class='left'><?php echo JText::_('REF'); ?></th>
						<th class='left'><?php echo JText::_('EAN13'); ?></th>
						<th class='left'><?php echo JText::_('MOUNTING_WIDTH'); ?></th>
						<th class='left'><?php echo JText::_('LOAD_WEIGHT'); ?></th>
					</tr>
					</thead>

					<tbody>
					<?php foreach ($this->items as $i => $item) {
						if($item->family == $this->item->family) { ?>
							<tr>
								<td><?php echo AntivibraticsHelper::renderSimilarProductImage($item, JRoute::_('index.php?option=com_antivibratics&view=antivibratic&id=' . (int)$item->id)); ?></td>
								<td><?php echo $item->ref; ?></td>
								<td><?php echo $item->ean13; ?></td>
								<td><?php echo $item->mounting_width; ?></td>
								<td><?php echo AntivibraticsHelper::renderInterval($this->item->load_weight_min, $this->item->load_weight_max, JText::_('KG')); ?></td>
							</tr>
						<?php
						}
					}
					?>
					</tbody>
				</table>
			<?php } ?>
		</section>

		<?php
		class PDF extends FPDF{

			function Header(){
				$this->Image(JPATH_BASE . '/images/icons/cab-pdf.jpg', 0, 0, 210);
				$this->SetFont('Arial','B',16);

				$antivibratic_name = $GLOBALS['antivibratic_name'];

				$this->Cell(40, 10, $antivibratic_name);
				$this->Ln(23);
			}
			function Footer(){
				$this->Image(JPATH_BASE . '/images/icons/footer-pdf.jpg', 0, 258, 210);
			}
		}

		$pdf = new PDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);

		if($this->item->photo_300px) {
			$pdf->Image($this->item->photo_300px, 10, 30, 60);
		}

		$pdf->Image(JPATH_BASE . '/images/icons/contactos-pdf.jpg', 155, 33, 46);


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
		$pdf->Cell(27, 7, JText::_('MAIN_INFO'));

		$pdf->SetFont('Arial','',9);
		$pdf->Cell(90, 5, JText::_('REF') . ": " . $this->item->ref, 'L');
		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('EAN13') . ": " . $this->item->ean13, 'L');
		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('HS_CODE') . ": " . $this->item->hs_code, 'L');
		$pdf->Ln();

		if($this->item->recycle_coefficient > 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('RECYCLE_COEFFICIENT') . ": " . $this->item->recycle_coefficient . " %", 'L');
		}
		$pdf->Ln(9);

		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('PERFORMANCE'));

		$pdf->SetFont('Arial','',9);
		$pdf->Cell(90, 5, JText::_('MOUNTING_WIDTH') . ": " . $this->item->mounting_width, 'L');
		$pdf->Ln();

		if($this->item->rupture_point > 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('RUPTURE_POINT') . ": " . $this->item->rupture_point . ' ' . JText::_('KG'), 'L');
			$pdf->Ln();
		}

		$pdf->SetX(37);
		if($this->item->load_weight_min == $this->item->load_weight_max) {
			$pdf->Cell(90, 5, JText::_('LOAD_WEIGHT') . ": " . $this->item->load_weight_min . " " . JText::_('KG'), 'L');
		}
		else {
			$pdf->Cell(90, 5, JText::_('LOAD_WEIGHT') . ": " . $this->item->load_weight_min . " " . JText::_('TO') . " " . $this->item->load_weight_max . " " . JText::_('KG'), 'L');
		}

		$pdf->Ln(6);


		if($this->item->fire_class_en) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_EN') . ": " . $this->item->fire_class_en, 'L');
			$pdf->Ln();
		}
		if($this->item->fire_class_din) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_DIN') . ": " . $this->item->fire_class_din, 'L');
			$pdf->Ln();
		}
		if($this->item->fire_class_nf_p) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_NF_P') . ": " . $this->item->fire_class_nf_p, 'L');
			$pdf->Ln();
		}
		if($this->item->fire_class_uni) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_UNI') . ": " . $this->item->fire_class_uni, 'L');
			$pdf->Ln();
		}
		if($this->item->fire_class_bs) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_BS') . ": " . $this->item->fire_class_bs, 'L');
			$pdf->Ln();
		}
		$pdf->Ln(9);


		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('INSTALLATION'));

		$pdf->SetFont('Arial','',9);
		$pdf->SetX(37);

		if($this->item->installation_wall == 1 || $this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 ||
			$this->item->installation_division_wall == 1):
			$pdf->Cell(26, 5, JText::_('INSTALLATION_PLACE') . ": ", 'L');

			if($this->item->installation_wall == 1):
				$pdf->Cell(6, 5, JText::_('WALL'));

				if($this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_division_wall == 1):
					$pdf->Cell(2, 5, ",");
				endif;
			endif;

			if($this->item->installation_ceiling == 1):
				$pdf->Cell(10, 5, JText::_('CEILING'));

				if($this->item->installation_floor == 1 || $this->item->installation_division_wall == 1):
					$pdf->Cell(2, 5, ",");
				endif;
			endif;

			if($this->item->installation_floor == 1):
				$pdf->Cell(7, 5, JText::_('FLOOR'));

				if($this->item->installation_division_wall == 1):
					$pdf->Cell(2, 5, ",");
				endif;
			endif;

			if($this->item->installation_division_wall == 1):
				$pdf->Cell(8, 5, JText::_('DIVISION_WALL'));
			endif;

			$pdf->Ln();
		endif;


		$pdf->SetX(37);
		if($this->item->steel == 1) {
			$pdf->Cell(13, 5, JText::_('STEEL') . ": Yes", 'L');
		}
		else {
			$pdf->Cell(13, 5, JText::_('STEEL') . ": No", 'L');
		}
		$pdf->Ln();

		if($this->item->rubber_color) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('RUBBER_COLOR') . ": " . ucwords($this->item->rubber_color), 'L');
			$pdf->Ln();
		}

		if($this->item->angle_adaptation == 1) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('ANGLE_ADAPTATION') . ": Yes", 'L');
			$pdf->Ln();
		}

		if($this->item->hooking_system == 1) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('HOOKING_SYSTEM') . ": Yes", 'L');
			$pdf->Ln();
		}

		if($this->item->security_devices > 0) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('SECURITY_DEVICES') . ": " . ucwords($this->item->security_devices), 'L');
			$pdf->Ln();
		}

		$pdf->SetX(37);
		if($this->item->fire_security_devices == 1) {
			$pdf->Cell(13, 5, JText::_('FIRE_SECURITY_DEVICES') . ": Yes", 'L');
		}
		else {
			$pdf->Cell(13, 5, JText::_('FIRE_SECURITY_DEVICES') . ": No", 'L');
		}
		$pdf->Ln();

		if($this->item->plate_thickness > 0) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('PLATE_THICKNESS') . ": " . ucwords($this->item->plate_thickness) . " mm", 'L');
			$pdf->Ln();
		}

		if($this->item->plate_length > 0) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('PLATE_LENGTH') . ": " . ucwords($this->item->plate_length) . " mm", 'L');
			$pdf->Ln();
		}

		$pdf->Ln(9);

		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('SHIPPING'));
		$pdf->SetFont('Arial','',9);

		if($this->item->units_per_box > 1) {
			$pdf->Cell(90, 5, JText::_('UNITS_PER_BOX') . ": " . $this->item->units_per_box, 'L');
		}

		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('BOX_DIMENSIONS') . ": " . $this->item->box_length . " x " . $this->item->box_width ." x " . $this->item->box_height ." mm", 'L');
		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('BOX_WEIGHT') . ": " . $this->item->box_weight . ' ' . JText::_('KG'), 'L');

		if($this->item->mastercarton_box_length > 0 && $this->item->mastercarton_box_width > 0 && $this->item->mastercarton_box_height > 0) {
			$pdf->Ln();
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('MASTERCARTON_BOX_DIMENSIONS') . ": " . $this->item->mastercarton_box_length . " x " . $this->item->mastercarton_box_width . " x " . $this->item->mastercarton_box_height . " mm", 'L');
		}
		$pdf->Ln(9);
		$pdf->Output(JPATH_BASE . '/images/pdfs/antivibratics/technical_files/' . AntivibraticsHelper::seoUrl($this->item->name) . '.pdf');
	}

	else {
		echo JText::_('NO_PRODUCT');
	}