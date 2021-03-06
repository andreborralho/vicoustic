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

	if( $this->items[0] ) {
		$this->item = $this->items[0];
		$GLOBALS['blanket_name'] = $this->item->name;
		?>

		<section id="blankets_fields_list" class="products_fields_list">

			<h1 class="product_name"><?php echo $this->item->name; ?></h1>

			<div class="product_main_img">
				<?php
					echo PanelsHelper::renderProductGalleryImage($this->item);
					echo PanelsHelper::renderProductGallerySubImage($this->item->photo_row_material);
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
						echo PanelsHelper::renderProductFileLink('/images/pdfs/blankets/technical_files/' . PanelsHelper::seoUrl($this->item->name) . '.pdf', JText::_('TECHNICAL_FILE'));
						echo PanelsHelper::renderProductFileLink($this->item->installation_manual, JText::_('INSTALLATION_MANUAL'));
						echo PanelsHelper::renderProductFileLink($this->item->warranty, JText::_('WARRANTY'));
						echo PanelsHelper::renderProductFileLink($this->item->drawings, JText::_('DRAWINGS'));
						echo PanelsHelper::renderProductFileLink($this->item->safety_data, JText::_('SAFETY_DATE'));
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

			<div class="product_technical_info">
				<div class="product_technical_title"><?php echo JText::_('MAIN_INFO') ?></div>

				<ul class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->ref, JText::_('REF'));
						echo PanelsHelper::renderTechnicalProperty($this->item->ean13, JText::_('EAN13'));
						echo PanelsHelper::renderTechnicalProperty($this->item->hs_code, JText::_('HS_CODE'));
					?>
					<li></li>
					<?php
						echo PanelsHelper::renderDimensionsProperty($this->item->length, $this->item->width, $this->item->thickness, JText::_('DIMENSIONS'), JText::_('MM'));
						echo PanelsHelper::renderTechnicalProperty($this->item->weight, JText::_('WEIGHT'), JText::_('KG'));
						echo PanelsHelper::renderTechnicalProperty($this->item->density, JText::_('DENSITY'));
						echo PanelsHelper::renderTechnicalProperty($this->item->recycle_coefficient, JText::_('RECYCLE_COEFFICIENT'), '%');
					?>
				</ul>

				<div class="product_technical_title"><?php echo JText::_('PERFORMANCE'); ?></div>

				<ul class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->rw, JText::_('RW'), JText::_('DB'));
						echo PanelsHelper::renderTechnicalProperty($this->item->rw_ctr, JText::_('RW_CTR'), JText::_('DB'));
						echo PanelsHelper::renderTechnicalProperty($this->item->stc, JText::_('STC'), JText::_('DB'));
						echo PanelsHelper::renderTechnicalProperty($this->item->dnfw, JText::_('DNFW'));
					?>
					<li></li>
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->fire_class_en, JText::_('FIRE_CLASS_EN'));
						echo PanelsHelper::renderTechnicalProperty($this->item->fire_class_din, JText::_('FIRE_CLASS_DIN'));
						echo PanelsHelper::renderTechnicalProperty($this->item->fire_class_nf_p, JText::_('FIRE_CLASS_NF_P'));
						echo PanelsHelper::renderTechnicalProperty($this->item->fire_class_uni, JText::_('FIRE_CLASS_UNI'));
						echo PanelsHelper::renderTechnicalProperty($this->item->fire_class_bs, JText::_('FIRE_CLASS_BS'));
					?>
					<li></li>
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->humidity_resistance, JText::_('HUMIDITY_RESISTANCE'), '%');
						echo PanelsHelper::renderTechnicalProperty($this->item->thermal_conductivity, JText::_('THERMAL_CONDUCTIVITY'), 'W/mK');
					?>
				</ul>

				<div class="product_technical_title"><?php echo JText::_('SHIPPING'); ?></div>

				<ul class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->units_per_box, JText::_('UNITS_PER_BOX'));

						if ($this->item->box_diameter > 0) {
							echo PanelsHelper::renderDimensionsProperty($this->item->box_length, $this->item->box_diameter, 0, JText::_('BOX_DIMENSIONS'), JText::_('MM'));
						}
						else {
							echo PanelsHelper::renderDimensionsProperty($this->item->box_length, $this->item->box_width, $this->item->box_length, JText::_('BOX_DIMENSIONS'), JText::_('MM'));
						}

						echo PanelsHelper::renderTechnicalProperty($this->item->box_weight, JText::_('BOX_WEIGHT'), JText::_('KG'));
						echo PanelsHelper::renderTechnicalProperty($this->item->box_volume, JText::_('BOX_VOLUME'), 'm<span style="vertical-align:super; font-size:0.8em">3</span>');
						echo PanelsHelper::renderTechnicalProperty($this->item->units_per_pallet, JText::_('UNITS_PER_PALLET'));
						echo PanelsHelper::renderDimensionsProperty($this->item->pallet_length, $this->item->pallet_width, $this->item->pallet_height, JText::_('PALLET_DIMENSIONS'), JText::_('MM'));
					?>
				</ul>
			</div>

			<div class="product_portfolio_images">
				<?php
					echo PanelsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id1, $this->item->portfolio_photo1_thumbnail, $this->item->portfolio_photo1_label);
					echo PanelsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id2, $this->item->portfolio_photo2_thumbnail, $this->item->portfolio_photo2_label);
				?>
			</div>

			<?php if (isset($this->similar) && sizeof($this->similar) > 1) { ?>
				<table class="product_similar_table">
					<thead>
					<tr>
						<th class='product_similar_title'><?php echo JText::_('SIMILAR_BLANKETS'); ?></th>
						<th><?php echo JText::_('REF'); ?></th>
						<th><?php echo JText::_('EAN13'); ?></th>
						<th><?php echo JText::_('DIMENSIONS'); ?></th>
					</tr>
					</thead>

					<tbody>
					<?php foreach ($this->similar as $i => $item) { ?>
						<tr>
							<td><?php echo PanelsHelper::renderSimilarProductImage($item, JRoute::_('index.php?option=com_blankets&view=blanket&id=' . (int) $item->id)); ?></td>
							<td><?php echo $item->ref; ?></td>
							<td><?php echo $item->ean13; ?></td>
							<td><?php echo PanelsHelper::render3Dimensions($item->length, $item->width, $item->thickness, JText::_('MM')); ?></td>
						</tr>
					<?php
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

				$blanket_name = $GLOBALS['blanket_name'];

				$this->Cell(40, 10, $blanket_name);
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
		$pdf->Cell(90, 5, JText::_('DIMENSIONS') . ": " . number_format((float) $this->item->length, 0, '.', '') . " x " . number_format((float) $this->item->width, 0, '.', '') . " x " . number_format((float) $this->item->thickness, 0, '.', '') . " mm", 'L');
		$pdf->Ln();

		if ($this->item->weight != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('WEIGHT') . ": " . $this->item->weight . " kg", 'L');
			$pdf->Ln();
		}

		if ($this->item->density != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('DENSITY') . ": " . $this->item->density, 'L');
			$pdf->Ln();
		}

		if ($this->item->recycle_coefficient != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('RECYCLE_COEFFICIENT') . ": " . $this->item->recycle_coefficient . " %", 'L');
		}
		$pdf->Ln(9);

		$pdf->SetFont('Arial', 'B', 10.5);
		$pdf->Cell(27, 7, JText::_('PERFORMANCE'));

		$pdf->SetFont('Arial', '', 9);

		if ($this->item->rw > 0) {
			$pdf->Cell(90, 5, JText::_('RW') . ": " . ucwords($this->item->rw) . " dB", 'L');
			$pdf->Ln();
		}

		if ($this->item->rw_ctr > 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('RW_CTR') . ": " . ucwords($this->item->rw_ctr) . " dB", 'L');
			$pdf->Ln();
		}

		if ($this->item->stc > 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('STC') . ": " . ucwords($this->item->stc) . " dB", 'L');
			$pdf->Ln();
		}

		if ($this->item->dnfw > 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('DNFW') . ": " . ' ' . $this->item->dnfw, 'L');
			$pdf->Ln();
		}

		if ($this->item->fire_class_en) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_EN') . ": " . $this->item->fire_class_en, 'L');
			$pdf->Ln();
		}
		if ($this->item->fire_class_din) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_DIN') . ": " . $this->item->fire_class_din, 'L');
			$pdf->Ln();
		}
		if ($this->item->fire_class_nf_p) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_NF_P') . ": " . $this->item->fire_class_nf_p, 'L');
			$pdf->Ln();
		}
		if ($this->item->fire_class_uni) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_UNI') . ": " . $this->item->fire_class_uni, 'L');
			$pdf->Ln();
		}
		if ($this->item->fire_class_bs) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('FIRE_CLASS_BS') . ": " . $this->item->fire_class_bs, 'L');
			$pdf->Ln();
		}

		if ($this->item->humidity_resistance != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('HUMIDITY_RESISTANCE') . ": " . $this->item->humidity_resistance . " %", 'L');
			$pdf->Ln();
		}
		if ($this->item->thermal_conductivity != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('THERMAL_CONDUCTIVITY') . ": " . $this->item->thermal_conductivity . " W/mK", 'L');
		}
		$pdf->Ln(9);

		$pdf->SetFont('Arial', 'B', 10.5);
		$pdf->Cell(27, 7, JText::_('SHIPPING'));
		$pdf->SetFont('Arial', '', 9);

		$pdf->Cell(90, 5, JText::_('UNITS_PER_BOX') . ": " . $this->item->units_per_box, 'L');

		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('BOX_DIMENSIONS') . ": " . $this->item->box_length . " x " . $this->item->box_width . " x " . $this->item->box_height . " mm", 'L');
		$pdf->Ln();

		if ($this->item->box_weight != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('BOX_WEIGHT') . ": " . $this->item->box_weight . " kg", 'L');
			$pdf->Ln();
		}

		if ($this->item->pallet_length != 0 && $this->item->pallet_width != 0 && $this->item->pallet_height != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('PALLET_DIMENSIONS') . ": " . $this->item->pallet_length . " x " . $this->item->pallet_width . " x " . $this->item->pallet_height . " mm", 'L');
		}

		header('Content-Type: application/pdf');
		$pdf->Output(JPATH_BASE . '/images/pdfs/blankets/technical_files/' . PanelsHelper::seoUrl($this->item->name) . '.pdf');
	}

	else {
		echo JText::_('NO_PRODUCT');
	}