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

	if( $this->items[0] ) {
		$this->item = $this->items[0];
		$GLOBALS['panel_name'] = $this->item->name;
		?>

		<section id="panels_fields_list" class="products_fields_list">

			<h1 class="product_name"><?php echo $this->item->name; ?></h1>

			<div id="panel_main_img" class="product_main_img">
				<?php
					echo PanelsHelper::renderProductGalleryImage($this->item, $this->item->ref);
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
						echo PanelsHelper::renderProductFileLink('/images/pdfs/panels/technical_files/' . PanelsHelper::seoUrl($this->item->name) . '.pdf', JText::_('TECHNICAL_FILE'));
						echo PanelsHelper::renderProductFileLink($this->item->installation_manual, JText::_('INSTALLATION_MANUAL'));
						echo PanelsHelper::renderProductFileLink($this->item->sketchup, JText::_('SKETCHUP'));
						echo PanelsHelper::renderProductFileLink($this->item->warranty, JText::_('WARRANTY'));
						echo PanelsHelper::renderProductFileLink($this->item->drawings, JText::_('DRAWINGS'));
						echo PanelsHelper::renderProductFileLink($this->item->safety_data, JText::_('SAFETY_DATE'));
						echo PanelsHelper::renderProductFileLink($this->item->acoustic_report, JText::_('ACOUSTIC_REPORT'));
					?>
				</ul>
			</div>

			<li class="product_description1"><?php echo $this->item->description1; ?></li>

			<div class="product_description2">
				<?php
					if (!empty($this->item->description2)) {
						echo $this->item->description2;
					}
				?>
			</div>

			<?php if($this->item->graph_id > 0) { ?>
				<div id="panel_graph_title"><?php echo JText::_('GRAPH'); ?></div>

				<div id="panel_graph_detail">
					&nbsp;<?php echo $this->item->label; ?>

					<input id="panel_graph_panel_id" class="panel_graph_value" type="hidden" value="<?php echo $this->item->id; ?>">
					<input id="panel_graph_63hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_63hz; ?>">
					<input id="panel_graph_80hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_80hz; ?>">
					<input id="panel_graph_100hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_100hz; ?>">
					<input id="panel_graph_125hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_125hz; ?>">
					<input id="panel_graph_160hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_160hz; ?>">
					<input id="panel_graph_200hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_200hz; ?>">
					<input id="panel_graph_250hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_250hz; ?>">
					<input id="panel_graph_315hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_315hz; ?>">
					<input id="panel_graph_400hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_400hz; ?>">
					<input id="panel_graph_500hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_500hz; ?>">
					<input id="panel_graph_630hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_630hz; ?>">
					<input id="panel_graph_800hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_800hz; ?>">
					<input id="panel_graph_1000hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_1000hz; ?>">
					<input id="panel_graph_1250hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_1250hz; ?>">
					<input id="panel_graph_1600hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_1600hz; ?>">
					<input id="panel_graph_2000hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_2000hz; ?>">
					<input id="panel_graph_2500hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_2500hz; ?>">
					<input id="panel_graph_3150hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_3150hz; ?>">
					<input id="panel_graph_4000hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_4000hz; ?>">
					<input id="panel_graph_5000hz" class="panel_graph_value" type="hidden" value="<?php echo $this->item->graph_5000hz; ?>">

					<div id="chartdiv"></div>
				</div>
			<?php } ?>

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
						if($this->item->diameter == 0) {
							echo PanelsHelper::renderDimensionsProperty($this->item->length, $this->item->width, $this->item->thickness, JText::_('DIMENSIONS'), JText::_('MM'));
						}
						else {
							echo PanelsHelper::renderDimensionsProperty($this->item->thickness, $this->item->diameter, 0, JText::_('DIMENSIONS'), JText::_('MM'));
						}

						echo PanelsHelper::renderTechnicalProperty($this->item->weight, JText::_('WEIGHT'), JText::_('KG'));
						echo PanelsHelper::renderTechnicalProperty($this->item->density, JText::_('DENSITY'));
						echo PanelsHelper::renderTechnicalPropertyYesNo($this->item->scratch_resistance, JText::_('SCRATCH_RESISTANCE'));
						echo PanelsHelper::renderTechnicalPropertyYesNo($this->item->washable, JText::_('WASHABLE'));
						echo PanelsHelper::renderTechnicalProperty($this->item->recycle_coefficient, JText::_('RECYCLE_COEFFICIENT'), '%');
					?>
				</div>

				<div class="product_technical_title"><?php echo JText::_('PERFORMANCE'); ?></div>

				<div class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->functionality), JText::_('FUNCTIONALITY'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->absorption_frequency), JText::_('ABSORPTION_FREQUENCY'), JText::_('FREQUENCIES'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->absorption_class), JText::_('ABSORPTION_CLASS'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->aw), JText::_('AW'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->nrc), JText::_('NRC'));
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
						echo PanelsHelper::renderTechnicalProperty($this->item->humidity_class, JText::_('HUMIDITY_CLASS'));
						echo PanelsHelper::renderTechnicalProperty($this->item->light_reflection, JText::_('LIGHT_REFLECTION'), '%');
						echo PanelsHelper::renderTechnicalProperty($this->item->humidity_resistance, JText::_('HUMIDITY_RESISTANCE'), '%');
						echo PanelsHelper::renderTechnicalProperty($this->item->thermal_conductivity, JText::_('THERMAL_CONDUCTIVITY'), 'W/mK');
					?>
				</div>

				<div class="product_technical_title"><?php echo JText::_('SHIPPING'); ?></div>

				<div class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty($this->item->units_per_box, JText::_('UNITS_PER_BOX'));
						echo PanelsHelper::renderDimensionsProperty($this->item->box_length, $this->item->box_width, $this->item->box_height, JText::_('PALLET_DIMENSIONS'), JText::_('MM'));
						echo PanelsHelper::renderTechnicalProperty($this->item->box_weight, JText::_('BOX_WEIGHT'), JText::_('KG'));
						echo PanelsHelper::renderTechnicalProperty($this->item->box_volume, JText::_('BOX_VOLUME'), 'm<span style="vertical-align:super; font-size:0.8em">3</span>');
						echo PanelsHelper::renderDimensionsProperty($this->item->mastercarton_box_length, $this->item->mastercarton_box_width, $this->item->mastercarton_box_height, JText::_('BOX_DIMENSIONS'), JText::_('MM'));
					?>
				</div>

				<div class="product_technical_title"><?php echo JText::_('RAW_MATERIALS'); ?></div>

				<div class="product_technical_details">
					<?php
						$properties = array();
						$properties[JText::_('WOOD')] = $this->item->wood;
						$properties[JText::_('METAL')] = $this->item->metal;
						$properties[JText::_('FABRIC')] = $this->item->fabric;
						$properties[JText::_('FOAM')] = $this->item->foam;
						$properties[JText::_('POLYSTYRENE')] = $this->item->polystyrene;
						echo PanelsHelper::renderTechnicalProperty(PanelsHelper::renderMultipleWords($properties), JText::_('MATERIAL'));

						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->wood_type), JText::_('WOOD_TYPE'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->fabric_type), JText::_('FABRIC_TYPE'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->foam_type), JText::_('FOAM_TYPE'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->polystyrene_density), JText::_('POLYSTYRENE_DENSITY'));
					?>
				</div>

				<div class="product_technical_title"><?php echo JText::_('DESIGN'); ?></div>

				<div class="product_technical_details">
					<?php
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->wood_color), JText::_('WOOD_COLOR'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->metal_color), JText::_('METAL_COLOR'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->fabric_color), JText::_('FABRIC_COLOR'));
						echo PanelsHelper::renderTechnicalProperty(ucwords($this->item->polystyrene_color), JText::_('POLYSTYRENE_COLOR'));

						$properties = array();
						$properties[JText::_('LEVELED')] = $this->item->edge_leveled;
						$properties[JText::_('ANGLED')] = $this->item->edge_angled;
						echo PanelsHelper::renderTechnicalProperty(PanelsHelper::renderMultipleWords($properties), JText::_('EDGES'));
					?>
				</div>

				<div class="product_technical_title"><?php echo JText::_('INSTALLATION'); ?></div>

				<div class="product_technical_details">
					<?php
						$properties = array();
						$properties[JText::_('WALL')] = $this->item->installation_wall;
						$properties[JText::_('CEILING')] = $this->item->installation_ceiling;
						$properties[JText::_('FLOOR')] = $this->item->installation_floor;
						$properties[JText::_('CORNER')] = $this->item->installation_corner;
						echo PanelsHelper::renderTechnicalProperty(PanelsHelper::renderMultipleWords($properties), JText::_('INSTALLATION_PLACE'));

						echo PanelsHelper::renderTechnicalProperty($this->item->load_weight, JText::_('LOAD_WEIGHT'), JText::_('KG'));

						$properties = array();
						$properties[JText::_('STANDARD_15MM')] = $this->item->fixing_type_standard15;
						$properties[JText::_('STANDARD_24MM')] = $this->item->fixing_type_standard24;
						$properties[JText::_('CLIPIN')] = $this->item->fixing_type_clipin;
						$properties[JText::_('SCREWED')] = $this->item->fixing_type_screwed;
						$properties[JText::_('GLUED')] = $this->item->fixing_type_glued;
						$properties[JText::_('ADHESIVE')] = $this->item->fixing_type_adhesive;
						echo PanelsHelper::renderTechnicalProperty(PanelsHelper::renderMultipleWords($properties), JText::_('FIXING_TYPE'));
					?>
				</div>
			</div>

			<div class="product_portfolio_images">
				<?php
					echo PanelsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id1, $this->item->portfolio_photo1_thumbnail, $this->item->portfolio_photo1_label);
					echo PanelsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id2, $this->item->portfolio_photo2_thumbnail, $this->item->portfolio_photo2_label);
					echo PanelsHelper::renderProductPortfolioImage($this->item->portfolio_photo_id3, $this->item->portfolio_photo3_thumbnail, $this->item->portfolio_photo3_label);
				?>
			</div>

			<?php if (isset($this->similar) && sizeof($this->similar) > 1) { ?>
				<table class="product_similar_table">
					<thead>
					<tr>
						<th class='product_similar_title'>
							<div class="product_similar_title_label"><?php echo JText::_('SIMILAR_PANELS'); ?></div>
						</th>
						<?php
							echo '<th>' . JText::_('REF') . '</th>';

							if($this->item->wood == 1) {
								echo '<th>' . JText::_('WOOD_COLOR') . '</th>';
							}
							if($this->item->metal == 1) {
								echo '<th>' . JText::_('METAL_COLOR') . '</th>';
							}
							if($this->item->fabric == 1) {
								echo '<th>' . JText::_('FABRIC_COLOR') . '</th>';
							}
							if($this->item->polystyrene == 1) {
								echo '<th>' . JText::_('POLYSTYRENE_COLOR') . '</th>';
							}

							echo '<th>' . JText::_('ABSORPTION_FREQUENCY') . '</th>';
							echo '<th>' . JText::_('AW') . '</th>';
							echo '<th>' . JText::_('NRC') . '</th>';
						?>
					</tr>
					</thead>

					<tbody>
					<?php foreach ($this->similar as $i => $item) { ?>
						<tr>
							<?php
								echo '<td>' . PanelsHelper::renderSimilarProductImage($item, JRoute::_('index.php?option=com_panels&view=panel&id=' . (int) $item->id)) . '</td>';
								echo '<td>' . $item->ref . '</td>';

								if($this->item->wood == 1) {
									echo '<td>' . ucwords($item->wood_color) . '</td>';
								}
								if($this->item->metal == 1) {
									echo '<td>' . ucwords($item->metal_color) . '</td>';
								}
								if($this->item->fabric == 1) {
									echo '<td>' . ucwords($item->fabric_color) . '</td>';
								}
								if($this->item->polystyrene == 1) {
									echo '<td>' . ucwords($item->polystyrene_color) . '</td>';
								}

								echo '<td>' . ucwords($item->absorption_frequency) . '</td>';
								echo '<td>' . PanelsHelper::renderIconsProperty($item->aw) . '</td>';
								echo '<td>' . PanelsHelper::renderIconsProperty($item->nrc) . '</td>';
							?>
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

			function Header(){
				$this->Image('images/icons/cab-pdf.jpg', 0, 0, 210);
				$this->SetFont('Arial','B',16);

				$panel_name = $GLOBALS['panel_name'];

				$this->Cell(40,10, $panel_name);
				$this->Ln(23);
			}
			function Footer(){
				$this->Image('images/icons/footer-pdf.jpg', 0, 258, 210);
			}
		}

		if (isset($_POST['img_PDF'])) {
			$img_PDF = $_POST['img_PDF'];
			file_put_contents('images/graphs/Graph-' . PanelsHelper::seoUrl($this->item->label) . '.png', base64_decode($img_PDF));
		}

		$pdf = new PDF();
		$pdf->SetAutoPageBreak(true, 40);
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);

		$url = getimagesize('images/panels/photos_300px/'. $this->item->ref .'_220.png');

		if($this->item->photo_300px) {
			$pdf->Image($this->item->photo_300px, 10, 30, 60);
		}
		elseif(!is_array($url)) {
			$pdf->Image('images/not_available_medium.png', 10, 30, 60);
		}
		else {
			$pdf->Image('images/panels/photos_300px/' . $this->item->ref . '_220.png', 10, 30, 67);
		}
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

		if(file_exists('images/graphs/Graph-' . PanelsHelper::seoUrl($this->item->label) . '.png')) {
			$pdf->SetFont('Arial','B',10.5);
			$pdf->Cell(27, 39, JText::_('GRAPH'), 'R');
			$pdf->Image('images/graphs/Graph-' . PanelsHelper::seoUrl($this->item->label) . '.png', 40, null, 150);
			$pdf->Ln(9);
		}

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
		$pdf->Ln(6);
		$pdf->SetX(37);

		if($this->item->diameter == 0) {
			$pdf->Cell(90, 5, JText::_('DIMENSIONS') . ": " . $this->item->length . " x " . $this->item->width . " x " . $this->item->thickness . " mm", 'L');
		}
		else {
			$pdf->Cell(90, 5, JText::_('DIMENSIONS') . ": " .$this->item->thickness . " x " . $this->item->diameter . " mm", 'L');
		}

		$pdf->Ln();

		if($this->item->weight != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('WEIGHT') . ": " . $this->item->weight . " kg", 'L');
			$pdf->Ln();
		}

		if($this->item->density != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('DENSITY') . ": " . $this->item->density, 'L');
			$pdf->Ln();
		}

		$pdf->SetX(37);

		if($this->item->scratch_resistance == 1) {
			$pdf->Cell(90, 5, JText::_('SCRATCH_RESISTANCE') . ": Yes", 'L');
		}
		elseif($this->item->scratch_resistance == 0) {
			$pdf->Cell(90, 5, JText::_('SCRATCH_RESISTANCE') . ": No", 'L');
		}

		$pdf->Ln();
		$pdf->SetX(37);

		if($this->item->washable == 1) {
			$pdf->Cell(90, 5, JText::_('WASHABLE') . ": Yes", 'L');
		}
		elseif($this->item->washable == 0) {
			$pdf->Cell(90, 5, JText::_('WASHABLE') . ": No", 'L');
		}

		$pdf->Ln();

		if($this->item->recycle_coefficient != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('RECYCLE_COEFFICIENT') . ": " . $this->item->recycle_coefficient . " %", 'L');
			$pdf->Ln();
		}

		$pdf->Ln(9);

		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('PERFORMANCE'));

		$pdf->SetFont('Arial','',9);
		$pdf->Cell(90, 5, JText::_('FUNCTIONALITY') . ": " . ucwords($this->item->functionality), 'L');
		$pdf->Ln();
		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('ABSORPTION_FREQUENCY') . ": " . ucwords($this->item->absorption_frequency), 'L');
		$pdf->Ln();

		if($this->item->absorption_class != "") {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('ABSORPTION_CLASS') . ": " . ucwords($this->item->absorption_class), 'L');
			$pdf->Ln();
		}

		if($this->item->aw != "") {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, iconv('UTF-8', 'windows-1252', JText::_('AW')) . ": " .  ' ' . $this->item->aw, 'L');
			$pdf->Ln();
		}

		$pdf->SetX(37);
		$pdf->Cell(90, 5, JText::_('NRC') . ": " . $this->item->nrc, 'L');
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
		if($this->item->humidity_class != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('HUMIDITY_CLASS') . ": " . $this->item->humidity_class, 'L');
			$pdf->Ln();
		}
		if($this->item->light_reflection != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('LIGHT_REFLECTION') . ": " . $this->item->light_reflection . " %", 'L');
			$pdf->Ln();
		}
		if($this->item->humidity_resistance != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('HUMIDITY_RESISTANCE') . ": " . $this->item->humidity_resistance . " %", 'L');
			$pdf->Ln();
		}
		if($this->item->thermal_conductivity != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('THERMAL_CONDUCTIVITY') . ": " . $this->item->thermal_conductivity . " W/mK", 'L');
		}
		$pdf->Ln(9);

		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('SHIPPING'));
		$pdf->SetFont('Arial','',9);

		if($this->item->units_per_box == 1) {
			$pdf->Cell(90, 5, JText::_('UNITS_PER_BOX') . ": " . $this->item->units_per_box . " box", 'L');
		}
		else {
			$pdf->Cell(90, 5, JText::_('UNITS_PER_BOX') . ": " . $this->item->units_per_box . " boxes", 'L');
		}

		$pdf->Ln();

		if($this->item->box_weight != 0 || $this->item->box_width != 0 || $this->item->box_height != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('BOX_DIMENSIONS') . ": " . $this->item->box_length . " x " . $this->item->box_width ." x " . $this->item->box_height ." mm", 'L');
			$pdf->Ln();
		}

		if($this->item->box_weight != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('BOX_WEIGHT') . ": " . $this->item->box_weight . " kg", 'L');
			$pdf->Ln();
		}

		if($this->item->mastercarton_box_length != 0 || $this->item->mastercarton_box_width != 0 || $this->item->mastercarton_box_height != 0) {
			$pdf->SetX(37);
			$pdf->Cell(90, 5, JText::_('MASTERCARTON_BOX_DIMENSIONS') . ": " . $this->item->mastercarton_box_length . " x " . $this->item->mastercarton_box_width . " x " . $this->item->mastercarton_box_height . " mm", 'L');
			$pdf->Ln();
		}
		$pdf->Ln(9);


		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('RAW_MATERIALS'));

		$pdf->SetFont('Arial','',9);
		$pdf->SetX(37);
		$pdf->Cell(13, 5, JText::_('MATERIAL') . ": ", 'L');

		if($this->item->wood == 1) {
			$pdf->Cell(8, 5, JText::_('WOOD'));

			if($this->item->metal == 1 || $this->item->fabric == 1 || $this->item->foam == 1 || $this->item->polystyrene == 1) {
				$pdf->Cell(2, 5, ",");
			}
		}

		if($this->item->metal == 1) {
			$pdf->Cell(8, 5, JText::_('METAL'));

			if($this->item->foam == 1 || $this->item->fabric == 1 || $this->item->polystyrene == 1) {
				$pdf->Cell(2, 5, ",");
			}
		}

		if($this->item->fabric == 1) {
			$pdf->Cell(9, 5, JText::_('FABRIC'));

			if($this->item->foam == 1 || $this->item->polystyrene == 1) {
				$pdf->Cell(2, 5, ",");
			}
		}

		if($this->item->foam == 1) {
			$pdf->Cell(9, 5, JText::_('FOAM'));

			if($this->item->polystyrene == 1) {
				$pdf->Cell(2, 5, ",");
			}
		}

		if($this->item->polystyrene == 1) {
			$pdf->Cell(13, 5, JText::_('POLYSTYRENE'));
		}

		$pdf->Ln();

		if($this->item->wood_type) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('WOOD_TYPE') . ": " . ucwords($this->item->wood_type), 'L');
			$pdf->Ln();
		}
		if($this->item->fabric_type) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('FABRIC_TYPE') . ": " . ucwords($this->item->fabric_type), 'L');
			$pdf->Ln();
		}
		if($this->item->foam_type) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('FOAM_TYPE') . ": " . ucwords($this->item->foam_type), 'L');
			$pdf->Ln();
		}
		if($this->item->polystyrene_density != 0) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('POLYSTYRENE_DENSITY') . ": " . ucwords($this->item->polystyrene_density), 'L');
			$pdf->Ln();
		}

		$pdf->Ln(9);

		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('DESIGN'), 'R');

		$pdf->SetFont('Arial','',9);
		$pdf->SetX(37);

		if($this->item->wood_color) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('WOOD_COLOR') . ": " . ucwords($this->item->wood_color), 'L');
			$pdf->Ln();
		}

		if($this->item->metal_color) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('METAL_COLOR') . ": " . ucwords($this->item->metal_color), 'L');
			$pdf->Ln();
		}

		if($this->item->fabric_color) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('FABRIC_COLOR') . ": " . ucwords($this->item->fabric_color), 'L');
			$pdf->Ln();
		}

		if($this->item->polystyrene) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('POLYSTYRENE_COLOR') . ": " . ucwords($this->item->polystyrene_color), 'L');
			$pdf->Ln();
		}

		if($this->item->edge_leveled == 1 || $this->item->edge_angled == 1) {
			$pdf->SetX(37);
			$pdf->Cell(11, 5, JText::_('EDGES') . ": ", 'L');

			if($this->item->edge_leveled == 1) {
				$pdf->Cell(11.5, 5, JText::_('LEVELED'));

				if($this->item->edge_angled == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->edge_angled == 1) {
				$pdf->Cell(13, 5, JText::_('ANGLED'));
				$pdf->Ln();
			}
		}

		$pdf->Ln(9);

		$pdf->SetFont('Arial','B',10.5);
		$pdf->Cell(27, 7, JText::_('INSTALLATION'));

		$pdf->SetFont('Arial','',9);
		$pdf->SetX(37);

		if($this->item->installation_wall == 1 || $this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_corner == 1) {
			$pdf->Cell(26, 5, JText::_('INSTALLATION_PLACE') . ": ", 'L');

			if($this->item->installation_wall == 1) {
				$pdf->Cell(6, 5, JText::_('WALL'));

				if($this->item->installation_ceiling == 1 || $this->item->installation_floor == 1 || $this->item->installation_corner == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->installation_ceiling == 1) {
				$pdf->Cell(10, 5, JText::_('CEILING'));

				if($this->item->installation_floor == 1 || $this->item->installation_corner == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->installation_floor == 1) {
				$pdf->Cell(7, 5, JText::_('FLOOR'));

				if($this->item->installation_corner == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->installation_corner == 1) {
				$pdf->Cell(8, 5, JText::_('CORNER'));
			}

			$pdf->Ln();
		}

		if($this->item->load_weight != 0) {
			$pdf->SetX(37);
			$pdf->Cell(13, 5, JText::_('LOAD_WEIGHT') . ": " . $this->item->load_weight . " kg", 'L');
			$pdf->Ln();
		}

		if($this->item->fixing_type_standard15 == 1 || $this->item->fixing_type_standard24 == 1 || $this->item->fixing_type_clipin == 1 ||
			$this->item->fixing_type_screwed == 1 || $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1) {
			$pdf->SetX(37);
			$pdf->Cell(18, 5, JText::_('FIXING_TYPE') . ": ", 'L');

			if($this->item->fixing_type_standard15 == 1) {
				$pdf->Cell(23, 5, JText::_('STANDARD_15MM'));

				if($this->item->fixing_type_standard24 == 1 || $this->item->fixing_type_clipin == 1 || $this->item->fixing_type_screwed == 1 ||
					$this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->fixing_type_standard24 == 1) {
				$pdf->Cell(23, 5, JText::_('STANDARD_24MM'));

				if($this->item->fixing_type_clipin == 1 || $this->item->fixing_type_screwed == 1 || $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->fixing_type_clipin == 1) {
				$pdf->Cell(9, 5, JText::_('CLIPIN'));

				if($this->item->fixing_type_screwed == 1 || $this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->fixing_type_screwed == 1) {
				$pdf->Cell(12.5, 5, JText::_('SCREWED'));

				if($this->item->fixing_type_glued == 1 || $this->item->fixing_type_adhesive == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->fixing_type_glued == 1) {
				$pdf->Cell(8.5, 5, JText::_('GLUED'));

				if($this->item->fixing_type_adhesive == 1) {
					$pdf->Cell(2, 5, ",");
				}
			}

			if($this->item->fixing_type_adhesive == 1) {
				$pdf->Cell(15, 5, JText::_('ADHESIVE'));
			}
		}

		header('Content-Type: application/pdf');
		$pdf->Output(JPATH_BASE . '/images/pdfs/panels/technical_files/' . PanelsHelper::seoUrl($this->item->name) . '.pdf');

	}
	else {
		echo JText::_('NO_PRODUCT');
	}