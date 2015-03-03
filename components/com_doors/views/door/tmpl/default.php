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
?>

<?php if( $this->item ) {
	$GLOBALS['door_name'] = $this->item->name;
	?>

	<section id="doors_fields_list" class="products_fields_list">

		<h1 class="product_name"><?php echo $this->item->family . ' - ' . $this->item->name; ?></h1>

		<div class="product_main_img">
			<?php
				echo PanelsHelper::renderProductGalleryImage($this->item);
				echo PanelsHelper::renderProductGallerySubImage($this->item->photo_detail1);
				echo PanelsHelper::renderProductGallerySubImage($this->item->photo_detail2);
				echo PanelsHelper::renderProductGallerySubImage($this->item->photo_detail3);
				echo PanelsHelper::renderProductGallerySubImage($this->item->photo_detail4);
				echo PanelsHelper::renderProductGallerySubImage($this->item->photo_detail5);
			?>
		</div>

		<div class="product_video"><?php echo $this->item->video; ?></div>

		<div class="product_links">
			<ul>
				<li class="product_links_title"><?php echo JText::_('DOCUMENTS'); ?></li>

				<?php
					echo PanelsHelper::renderProductFileLink($this->item->catalog_page, JText::_('CATALOG_PAGE'));
					echo PanelsHelper::renderProductFileLink('/images/pdfs/doors/technical_files/' . PanelsHelper::seoUrl($this->item->name) . '.pdf', JText::_('TECHNICAL_FILE'));
					echo PanelsHelper::renderProductFileLink($this->item->installation_manual, JText::_('INSTALLATION_MANUAL'));
					echo PanelsHelper::renderProductFileLink($this->item->sketchup, JText::_('SKETCHUP'));
					echo PanelsHelper::renderProductFileLink($this->item->warranty, JText::_('WARRANTY'));
					echo PanelsHelper::renderProductFileLink($this->item->drawings, JText::_('DRAWINGS'));
					echo PanelsHelper::renderProductFileLink($this->item->safety_data, JText::_('SAFETY_DATE'));
					echo PanelsHelper::renderProductFileLink($this->item->acoustic_report, JText::_('ACOUSTIC_REPORT'));
				?>
			</ul>
		</div>

		<div class="product_description1"><?php echo $this->item->description1; ?></div>

		<div class="product_description2">
			<?php
				if (!empty($this->item->description2)) {
					echo $this->item->description2;
				}
			?>
		</div>

		<div id="door_icons">

			<div class="door_options_titles"><?php echo JText::_('FINISH'); ?></div>

			<div class="door_options_icons">
				<div class="door_icon">
					<?php if (strcasecmp($this->item->finish, 'Wood') == 0) : ?>
						<img alt="" src="images/doors/options_icons/wood.png">
						<div><?php echo JText::_('WOOD'); ?></div>
					<?php elseif (strcasecmp($this->item->finish, 'Grey Enamel Primer') == 0) : ?>
						<img alt="" src="images/doors/options_icons/steel.png">
						<div><?php echo $this->item->finish; ?></div>
					<?php endif; ?>
				</div>
			</div>

			<?php if ($this->item->keylock == 1 || $this->item->antipanic_bar == 1 || $this->item->circular_double_window == 1 || $this->item->without_floor_frame == 1 || $this->item->autoclose_system == 1) : ?>
				<div class="door_options_titles"><?php echo JText::_('INCLUDES'); ?></div>

				<div class="door_options_icons">
					<?php
						echo PanelsHelper::renderDoorIcon(TRUE, $this->item->keylock, 'images/doors/options_icons/keylock.png', JText::_('KEYLOCK'));
						echo PanelsHelper::renderDoorIcon(TRUE, $this->item->antipanic_bar, 'images/doors/options_icons/panic_bar.png', JText::_('ANTIPANIC_BAR'));
						echo PanelsHelper::renderDoorIcon(TRUE, $this->item->circular_double_window, 'images/doors/options_icons/circular_window_2.png', JText::_('CIRCULAR_DOUBLE_WINDOW'));
						echo PanelsHelper::renderDoorIcon(TRUE, $this->item->without_floor_frame, 'images/doors/options_icons/removed_floor_frame.png', JText::_('WITHOUT_FLOOR_FRAME'));
						echo PanelsHelper::renderDoorIcon(TRUE, $this->item->autoclose_system, 'images/doors/options_icons/automatic_door.png', JText::_('AUTOCLOSE_SYSTEM'));
					?>
				</div>
			<?php endif; ?>

			<div class="door_options_titles"><?php echo JText::_('OPTIONS'); ?></div>

			<div class="door_options_icons">
				<?php
					echo PanelsHelper::renderDoorIcon(FALSE, $this->item->keylock, 'images/doors/options_icons/keylock.png', JText::_('KEYLOCK'));
					echo PanelsHelper::renderDoorIcon(FALSE, $this->item->antipanic_bar, 'images/doors/options_icons/panic_bar.png', JText::_('ANTIPANIC_BAR'));

					if ($this->item->keylock == 0 && $this->item->antipanic_bar == 0) : ?>
						<div class="door_icon">
							<img alt="" src="images/doors/options_icons/panic_bar+keylock.png">
							<?php echo JText::_('KEYLOCK_ANTIPANICBAR'); ?>
						</div>
					<?php endif; ?>
				<?php
					echo PanelsHelper::renderDoorIcon(FALSE, $this->item->circular_double_window, 'images/doors/options_icons/circular_window_2.png', JText::_('CIRCULAR_DOUBLE_WINDOW'));
					echo PanelsHelper::renderDoorIcon(FALSE, $this->item->without_floor_frame, 'images/doors/options_icons/removed_floor_frame.png', JText::_('WITHOUT_FLOOR_FRAME'));
					echo PanelsHelper::renderDoorIcon(FALSE, $this->item->autoclose_system, 'images/doors/options_icons/automatic_door.png', JText::_('AUTOCLOSE_SYSTEM'));
				?>
			</div>

			<div class="product_technical_info">
				<div class="product_technical_title"><?php echo JText::_('MAIN_INFO') ?></div>

				<div class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->ref, JText::_('REF'));
						echo PanelsHelper::renderTechnicalProperty($this->item->ean13, JText::_('EAN13'));
						echo PanelsHelper::renderTechnicalProperty($this->item->hs_code, JText::_('HS_CODE'));
					?>
					<li></li>
					<?php
						echo PanelsHelper::renderDimensionsProperty($this->item->width, $this->item->height, 0, JText::_('FREE_CLEARANCE_DIMENSIONS'), JText::_('MM'));
						echo PanelsHelper::renderTechnicalProperty($this->item->number_of_doors, JText::_('NUMBER_OF_DOORS'));
						echo PanelsHelper::renderTechnicalProperty($this->item->gross_weight, JText::_('GROSS_WEIGHT'), JText::_('KG'));
						echo PanelsHelper::renderTechnicalProperty($this->item->recycle_coefficient, JText::_('RECYCLE_COEFFICIENT'), '%');
					?>
				</div>

				<div class="product_technical_title"><?php echo JText::_('PERFORMANCE'); ?></div>

				<div class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->fire_resistance, JText::_('FIRE_RESISTANCE'), JText::_('MINUTES'));
						echo PanelsHelper::renderTechnicalProperty($this->item->rw, JText::_('RW'), JText::_('DB'));
						echo PanelsHelper::renderTechnicalProperty($this->item->dnfw, JText::_('DNFW'), JText::_('DB'));
					?>
				</div>

				<div class="product_technical_title"><?php echo JText::_('INSTALLATION'); ?></div>

				<div class="product_technical_details">
					<?php
						echo PanelsHelper::renderDimensionsProperty($this->item->outer_width, $this->item->outer_height, 0, JText::_('OUTER_MEASUREMENTS'), JText::_('MM'));
						echo PanelsHelper::renderDimensionsProperty($this->item->recommended_construction_width, $this->item->recommended_construction_height, 0, JText::_('RECOMMENDED_MEASUREMENTS_FOR_CONSTRUCTION'), JText::_('MM'));
					?>
				</div>

				<div class="product_technical_title"><?php echo JText::_('SHIPPING'); ?></div>

				<div class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->units_per_pallet, JText::_('UNITS_PER_PALLET'));
						echo PanelsHelper::renderDimensionsProperty($this->item->pallet_length, $this->item->pallet_width, $this->item->pallet_height, JText::_('PALLET_DIMENSIONS'), JText::_('MM'));
						echo PanelsHelper::renderTechnicalProperty($this->item->pallet_volume, JText::_('PALLET_VOLUME'), 'm<span style="vertical-align:super; font-size:0.8em">3</span>');
						echo PanelsHelper::renderTechnicalProperty($this->item->pallet_weight, JText::_('PALLET_WEIGHT'), JText::_('KG'));

						if ($this->item->msrp_state == 1) {
							echo PanelsHelper::renderTechnicalProperty($this->item->msrp, JText::_('MSRP'), JText::_('EURO'));
						}
					?>
				</div>
			</div>

			<table class="door_options_table">
				<thead>
				<tr>
					<th class='left door_options_title'>
						<div class="door_options_title_label"><?php echo JText::_('OPTIONS'); ?></div>
					</th>
					<th class='left'><?php echo JText::_('REF'); ?></th>
					<th class='left'><?php echo JText::_('MSRP'); ?></th>
				</tr>
				</thead>

				<tbody>
				<?php echo PanelsHelper::renderDoorOptionCell($this->item->keylock, JText::_('KEYLOCK'), $this->item->keylock_ref, $this->item->keylock_msrp, JText::_('EURO')); ?>
				<?php echo PanelsHelper::renderDoorOptionCell($this->item->antipanic_bar, JText::_('ANTIPANIC_BAR'), $this->item->antipanic_bar_ref, $this->item->antipanic_bar_msrp, JText::_('EURO')); ?>
				<?php echo PanelsHelper::renderDoorOptionCell($this->item->keylock_antipanicbar, JText::_('KEYLOCK_ANTIPANICBAR'), $this->item->keylock_antipanicbar_ref, $this->item->keylock_antipanicbar_msrp, JText::_('EURO')); ?>
				<?php echo PanelsHelper::renderDoorOptionCell($this->item->circular_double_window, JText::_('CIRCULAR_DOUBLE_WINDOW_30'), $this->item->circular_double_window_ref, $this->item->circular_double_window_msrp, JText::_('EURO')); ?>
				<?php echo PanelsHelper::renderDoorOptionCell($this->item->without_floor_frame, JText::_('WITHOUT_FLOOR_FRAME'), $this->item->without_floor_frame_ref, $this->item->without_floor_frame_msrp, JText::_('EURO')); ?>
				<?php echo PanelsHelper::renderDoorOptionCell($this->item->autoclose_system, JText::_('AUTOCLOSE_SYSTEM'), $this->item->autoclose_system_ref, $this->item->autoclose_system_msrp, JText::_('EURO')); ?>
				</tbody>
			</table>
		</div>

		<div class="product_portfolio_images">
			<?php
				//TODO: tem muitos ciclos e queries e comparaçoes so para devolver uma row de uma tabela
				foreach ($this->items as $i => $item) {
					echo PanelsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id1, $item->portfolio_photo_id1, $item->portfolio_photo1_thumbnail, $item->portfolio_photo1_label);
					echo PanelsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id2, $item->portfolio_photo_id2, $item->portfolio_photo2_thumbnail, $item->portfolio_photo2_label);
				}
			?>
		</div>

		<?php if (PanelsHelper::hasSimilarProducts($this->items, $this->item)) { ?>
			<table class="product_similar_table">
				<thead>
				<tr>
					<th width="19%" class='left product_similar_title'>
						<div class="product_similar_title_label"><?php echo JText::_('SIMILAR_DOORS'); ?></div>
					</th>
					<th width="4%" class='left'><?php echo JText::_('REF'); ?></th>
					<th width="8%" class='left'><?php echo JText::_('EAN13'); ?></th>
					<th width="4%" class='center'><?php echo JText::_('NUMBER_OF_DOORS'); ?></th>
					<th width="14%" class='left'><?php echo JText::_('DIMENSIONS'); ?></th>
					<th width="9%" class='left'><?php echo JText::_('GROSS_WEIGHT'); ?></th>
					<th width="12%" class='left'><?php echo JText::_('FINISH'); ?></th>
					<th width="5%" class='left'><?php echo JText::_('RW'); ?></th>
				</tr>
				</thead>

				<tbody>
				<?php foreach ($this->items as $i => $item) {
					if ($item->family == $this->item->family) { ?>
						<tr>
							<td><?php echo PanelsHelper::renderSimilarProductImage($item, JRoute::_('index.php?option=com_doors&view=door&id=' . (int) $item->id)); ?></td>
							<td><?php echo $item->ref; ?></td>
							<td><?php echo $item->ean13; ?></td>
							<td><?php echo $item->number_of_doors; ?></td>
							<td><?php echo PanelsHelper::render2Dimensions($item->width, $item->height, JText::_('MM')); ?></td>
							<td><?php echo $item->gross_weight . ' ' . JText::_('KG'); ?></td>
							<td><?php echo ucwords($item->finish); ?></td>
							<td><?php echo $item->rw . ' ' . JText::_('DB'); ?></td>
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

	class PDF extends FPDF {

		function Header() {
			$this->Image(JPATH_BASE . '/images/icons/cab-pdf.jpg', 0, 0, 210);
			$this->SetFont('Arial', 'B', 16);

			$door_name = $GLOBALS['door_name'];

			$this->Cell(40, 10, $door_name);
			$this->Ln(23);
		}

		function Footer() {
			$this->Image(JPATH_BASE . '/images/icons/footer-pdf.jpg', 0, 258, 210);
		}
	}

	$pdf = new PDF();

	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 16);

	if ($this->item->photo_300px) {
		$pdf->Image($this->item->photo_300px, 10, 30, 60);
	}

	$pdf->Image(JPATH_BASE . '/images/icons/contactos-pdf.jpg', 155, 33, 46);

	$pdf->SetDrawColor(150);
	$pdf->SetFont('Arial', '', 9);
	$pdf->SetXY(10, 87);

	$description1 = iconv('UTF-8', 'windows-1252', $this->item->description1);
	$description2 = iconv('UTF-8', 'windows-1252', $this->item->description2);

	$pdf->Ln();
	$pdf->MultiCell(190, 4, strip_tags($description1));
	$pdf->Ln();
	$pdf->MultiCell(190, 4, strip_tags($description2));
	$pdf->Ln();

	$pdf_currentY = $pdf->getY();
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(14, 15, JText::_('FINISH'), 'R');

	$pdf->SetFont('Arial', '', 7);
	if (strcasecmp($this->item->finish, 'Wood') == 0) :
		$pdf->Image('images/doors/options_icons/wood.png', 29, NULL, 10);
		$pdf->Cell(23, 5, JText::_('WOOD'), 0, 0, 'C');
	elseif (strcasecmp($this->item->finish, 'Grey Enamel Primer') == 0) :
		$pdf->Image('images/doors/options_icons/steel.png', 29, NULL, 10);
		$pdf->Cell(23, 5, $this->item->finish, 0, 0, 'C');
	endif;
	$pdf_currentX = $pdf->getX();

	if ($this->item->keylock == 1 || $this->item->antipanic_bar == 1 || $this->item->circular_double_window == 1 || $this->item->without_floor_frame == 1 || $this->item->autoclose_system == 1) {
		$pdf->setY($pdf_currentY);
		$pdf->setX(43);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(15, 15, JText::_('INCLUDES'), 'R');

		$pdf->SetFont('Arial', '', 7);
		if ($this->item->keylock == 1) {
			$pdf->Image('images/doors/options_icons/keylock.png', 63, NULL, 10);
			$pdf->Cell(15, 5, JText::_('KEYLOCK'), 0, 0, 'C');
			$pdf_currentX = $pdf->getX();
		}
		if ($this->item->antipanic_bar == 1) {
			$pdf->setX($pdf_currentX);
			$pdf->setY($pdf_currentY);
			$pdf->Image('images/doors/options_icons/panic_bar.png', $pdf_currentX + 5, NULL, 10);
			$pdf->setX($pdf_currentX + 2);
			$pdf->Cell(20, 5, JText::_('ANTIPANIC_BAR'), 0, 0, 'C');
			$pdf_currentX = $pdf->getX();
		}
		if ($this->item->circular_double_window == 1) {
			$pdf->setX($pdf_currentX);
			$pdf->setY($pdf_currentY);
			$pdf->Image('images/doors/options_icons/circular_window_2.png', $pdf_currentX, NULL, 10);
			$pdf->setX($pdf_currentX + 2);
			$pdf->Cell(20, 5, JText::_('CIRCULAR_DOUBLE_WINDOW'), 0, 0, 'C');
			$pdf_currentX = $pdf->getX();
		}
		if ($this->item->without_floor_frame == 1) {
			$pdf->setX($pdf_currentX);
			$pdf->setY($pdf_currentY);
			$pdf->Image('images/doors/options_icons/removed_floor_frame.png', $pdf_currentX + 7, NULL, 10);
			$pdf->setX($pdf_currentX + 2);
			$pdf->Cell(20, 5, JText::_('WITHOUT_FLOOR_FRAME'), 0, 0, 'C');
			$pdf_currentX = $pdf->getX();
		}
		if($this->item->autoclose_system == 1) {
			$pdf->setX($pdf_currentX);
			$pdf->setY($pdf_currentY);
			$pdf->Image('images/doors/options_icons/automatic_door.png', $pdf_currentX, NULL, 10);
			$pdf->setX($pdf_currentX + 2);
			$pdf->Cell(20, 5, JText::_('AUTOCLOSE_SYSTEM'), 0, 0, 'C');
			$pdf_currentX = $pdf->getX();
		}
	}

	$pdf->setY($pdf_currentY);
	$pdf->setX($pdf_currentX+3);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(15, 15, JText::_('OPTIONS'), 'R');
	$pdf_currentX = $pdf->getX();

	$pdf->SetFont('Arial','',7);
	if($this->item->keylock == 0) {
		$pdf->Image('images/doors/options_icons/keylock.png', 69, NULL, 10);
		$pdf->setX($pdf_currentX + 2);
		$pdf->Cell(15, 5, JText::_('KEYLOCK'), 0, 0, 'C');
		$pdf_currentX = $pdf->getX();
	}
	if ($this->item->antipanic_bar == 0) {
		$pdf->setX($pdf_currentX);
		$pdf->setY($pdf_currentY);
		$pdf->Image('images/doors/options_icons/panic_bar.png', $pdf_currentX + 5, NULL, 10);
		$pdf->setX($pdf_currentX);
		$pdf->Cell(20, 5, JText::_('ANTIPANIC_BAR'), 0, 0, 'C');
		$pdf_currentX = $pdf->getX();
	}
	if ($this->item->circular_double_window == 0) {
		$pdf->setX($pdf_currentX + 3);
		$pdf->setY($pdf_currentY);
		$pdf->Image('images/doors/options_icons/circular_window_2.png', $pdf_currentX + 8, NULL, 10);
		$pdf->setX($pdf_currentX + 3);
		$pdf->Cell(20, 5, JText::_('CIRCULAR_DOUBLE_WINDOW'), 0, 0, 'C');
		$pdf_currentX = $pdf->getX();
	}

	if ($this->item->without_floor_frame == 0) {
		$pdf->setX($pdf_currentX + 7);
		$pdf->setY($pdf_currentY);
		$pdf->Image('images/doors/options_icons/removed_floor_frame.png', $pdf_currentX + 12, NULL, 10);
		$pdf->setX($pdf_currentX + 7);
		$pdf->Cell(20, 5, JText::_('WITHOUT_FLOOR_FRAME'), 0, 0, 'C');
		$pdf_currentX = $pdf->getX();
	}
	if ($this->item->autoclose_system == 0) {
		$pdf->setX($pdf_currentX + 6);
		$pdf->setY($pdf_currentY);
		$pdf->Image('images/doors/options_icons/automatic_door.png', $pdf_currentX + 10, NULL, 10);
		$pdf->setX($pdf_currentX + 6);
		$pdf->Cell(20, 5, JText::_('AUTOCLOSE_SYSTEM'), 0, 0, 'C');
		$pdf_currentX = $pdf->getX();
	}

	$pdf->Ln(9);

	$pdf->SetFont('Arial', 'B', 10.5);
	$pdf->Cell(27, 7, JText::_('MAIN_INFO'));

	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(90, 5, JText::_('REF') . ": " . $this->item->ref, 'L');
	$pdf->Ln();
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('EAN13') . ": " . $this->item->ean13, 'L');
	$pdf->Ln();
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('HS_CODE') . ": " . $this->item->hs_code, 'L');
	$pdf->Ln(6);

	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('DIMENSIONS') . ": " . number_format((float) $this->item->width, 0, '.', '') . " x " . number_format((float) $this->item->height, 0, '.', '') . " mm", 'L');
	$pdf->Ln();
	$pdf->SetX(37);

	$pdf->Cell(90, 5, JText::_('NUMBER_OF_DOORS') . ": " . $this->item->number_of_doors, 'L');

	$pdf->Ln();
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('GROSS_WEIGHT') . ": " . $this->item->gross_weight . " kg", 'L');
	$pdf->Ln(9);

	$pdf->SetFont('Arial', 'B', 10.5);
	$pdf->Cell(27, 7, JText::_('PERFORMANCE'));

	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(90, 5, JText::_('FIRE_RESISTANCE') . ": " . ucwords($this->item->fire_resistance) . " " . JText::_('MINUTES'), 'L');
	$pdf->Ln();
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('RW') . ": " . ucwords($this->item->rw) . " dB", 'L');

	if ($this->item->dnfw):
		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('DNFW') . ": " . ucwords($this->item->dnfw) . " dB", 'L');
	endif;
	$pdf->Ln(9);

	$pdf->SetFont('Arial', 'B', 10.5);
	$pdf->Cell(27, 7, JText::_('INSTALLATION'));
	$pdf->SetFont('Arial', '', 9);

	$pdf->Cell(90, 5, "Outer Measurements: " . number_format((float) $this->item->outer_width, 0, '.', '') . " x " . number_format((float) $this->item->outer_height, 0, '.', '') . " mm", 'L');
	$pdf->Ln();
	$pdf->SetX(37);
	$pdf->Cell(90, 5, "Recommended Measurements for the construction span: " . number_format((float) $this->item->recommended_construction_width, 0, '.', '') . " x " . number_format((float) $this->item->recommended_construction_height, 0, '.', '') . " mm", 'L');
	$pdf->Ln(9);

	$pdf->SetFont('Arial', 'B', 10.5);
	$pdf->Cell(27, 7, JText::_('SHIPPING'));
	$pdf->SetFont('Arial', '', 9);

	$pdf->Cell(90, 5, JText::_('UNITS_PER_PALLET') . ": " . $this->item->units_per_pallet, 'L');

	$pdf->Ln();
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('PALLET_DIMENSIONS') . ": " . number_format((float) $this->item->pallet_length, 0, '.', '') . " x " . number_format((float) $this->item->pallet_width, 0, '.', '') . " x " . number_format((float) $this->item->pallet_height, 0, '.', '') . " mm", 'L');
	$pdf->Ln();
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('PALLET_VOLUME') . ": " . $this->item->pallet_volume . " m3", 'L');
	$pdf->Ln();
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('PALLET_WEIGHT') . ": " . $this->item->pallet_weight . " kg", 'L');
	$pdf->Ln(9);

	header('Content-Type: application/pdf');
	$pdf->Output(JPATH_BASE . '/images/pdfs/doors/technical_files/' . PanelsHelper::seoUrl($this->item->name) . '.pdf');
}

else {
	echo JText::_('NO_PRODUCT');
}