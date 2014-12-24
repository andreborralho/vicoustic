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
?>


<?php if( $this->item ) {
  //var_dump($this->item);
  $GLOBALS['accessory_name'] = $this->item->name;
  ?>

  <section id="accessories_fields_list" class="products_fields_list">

	<h1 class="product_name"><?php echo $this->item->name; ?></h1>

	<div id="accessory_main_img">
	  <?php
		echo AccessoriesHelper::renderProductGalleryImage($this->item);
		echo AccessoriesHelper::renderProductGallerySubImage($this->item->photo_detail1);
		echo AccessoriesHelper::renderProductGallerySubImage($this->item->photo_detail2);
		echo AccessoriesHelper::renderProductGallerySubImage($this->item->photo_detail3);
		echo AccessoriesHelper::renderProductGallerySubImage($this->item->photo_detail4);
		echo AccessoriesHelper::renderProductGallerySubImage($this->item->photo_detail5);
	  ?>
	</div>

	<div class="product_video"><?php echo $this->item->video; ?></div>

	<div class="product_links">
	  <ul>
		<li class="product_links_title">
		  <?php echo JText::_('DOCUMENTS'); ?>
		</li>

		<?php
		  echo AccessoriesHelper::renderProductFileLink($this->item->catalog_page, JText::_('CATALOG_PAGE'));
		  echo AccessoriesHelper::renderProductFileLink('/images/pdfs/accessories/technical_files/' . AccessoriesHelper::seoUrl($this->item->name) . '.pdf', JText::_('TECHNICAL_FILE'));
		  echo AccessoriesHelper::renderProductFileLink($this->item->installation_manual, JText::_('INSTALLATION_MANUAL'));
		  echo AccessoriesHelper::renderProductFileLink($this->item->sketchup, JText::_('SKETCHUP'));
		  echo AccessoriesHelper::renderProductFileLink($this->item->warranty, JText::_('WARRANTY'));
		  echo AccessoriesHelper::renderProductFileLink($this->item->drawings, JText::_('DRAWINGS'));
		  echo AccessoriesHelper::renderProductFileLink($this->item->safety_data, JText::_('SAFETY_DATE'));
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
		  echo AccessoriesHelper::renderTechnicalProperty($this->item->ref, JText::_('REF'));
		  echo AccessoriesHelper::renderTechnicalProperty($this->item->ean13, JText::_('EAN13'));
		  echo AccessoriesHelper::renderTechnicalProperty($this->item->hs_code, JText::_('HS_CODE'));
		  echo AccessoriesHelper::renderTechnicalProperty($this->item->recycle_coefficient, JText::_('RECYCLE_COEFFICIENT'), '%');
		?>
	  </ul>

	  <div class="product_technical_title"><?php echo JText::_('SHIPPING'); ?></div>

	  <ul class="product_technical_details">
		<?php
		  echo AccessoriesHelper::renderTechnicalProperty($this->item->units_per_box, JText::_('UNITS_PER_BOX'));

		  if($this->item->box_length > 0 && $this->item->box_width > 0) {
			echo '<li><b>' . JText::_('BOX_DIMENSIONS') . ': </b>' . number_format((float)$this->item->box_length, 0, '.', '') . ' x ' . number_format((float)$this->item->box_width, 0, '.', '') . ' x ' . number_format((float)$this->item->box_height, 0, '.', '') . ' mm</li>';
		  }

		  echo AccessoriesHelper::renderTechnicalProperty($this->item->box_weight, JText::_('BOX_WEIGHT'), 'kg');
		  echo AccessoriesHelper::renderTechnicalProperty($this->item->box_volume, JText::_('BOX_VOLUME'), 'm<span style="vertical-align:super; font-size:0.8em">3</span>');
		?>
	  </ul>
	</div>

	<div class="product_portfolio_images">
	  <?php
		foreach ($this->items as $i=>$item) {
		  echo AccessoriesHelper::renderProductPortfolioImage($this->item->portfolio_photo_id1, $item->portfolio_photo_id1, $item->portfolio_photo1_thumbnail, $item->portfolio_photo1_label);
		  echo AccessoriesHelper::renderProductPortfolioImage($this->item->portfolio_photo_id2, $item->portfolio_photo_id2, $item->portfolio_photo2_thumbnail, $item->portfolio_photo2_label);

		  //MUDAR - tem muitos ciclos e queries e comparaçoes so para devolver uma row de uma tabela
		}
	  ?>
	</div>

	<?php if(AccessoriesHelper::hasSimilarProducts($this->items, $this->item)) { ?>
	  <table class="product_similar_table">
		<thead>
		<tr>
		  <th class='left product_similar_title'><?php echo JText::_('SIMILAR_ACCESSORIES'); ?></th>
		  <th class='left'><?php echo JText::_('REF'); ?></th>
		  <th class='left'><?php echo JText::_('EAN13'); ?></th>
		</tr>
		</thead>

		<tbody>
		<?php foreach ($this->items as $i => $item) {
		  if($item->family == $this->item->family) { ?>
			<tr>
			  <td><?php echo AccessoriesHelper::renderSimilarProductImage($item); ?></td>
			  <td><?php echo $item->ref; ?></td>
			  <td><?php echo $item->ean13; ?></td>
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

	function Header(){
	  $this->Image(JPATH_BASE . '/images/icons/cab-pdf.jpg', 0, 0, 210);
	  $this->SetFont('Arial','B',16);

	  $accessory_name = $GLOBALS['accessory_name'];

	  $this->Cell(40,10, $accessory_name);
	  $this->Ln(23);
	}
	function Footer(){
	  $this->Image(JPATH_BASE . '/images/icons/footer-pdf.jpg', 0, 258, 210);
	}
  }

  $pdf = new PDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',16);

  if(!empty($this->item->photo_300px)) {
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
  $pdf->Ln(1);
  $pdf->MultiCell(190,4,strip_tags($description2));
  $pdf->Ln(10);

  $pdf->SetFont('Arial','B',10.5);
  $pdf->Cell(27, 7, JText::_('MAIN_INFO'));
  $pdf->SetX(10);
  $pdf->Cell(27, 45, '');
  $pdf->SetFont('Arial','',9);
  $pdf->Cell(90, 5, JText::_('REF') . ': ' . $this->item->ref, 'L');
  $pdf->Ln();
  $pdf->SetX(37);
  $pdf->Cell(90, 5, JText::_('EAN13') . ': ' . $this->item->ean13, 'L');
  $pdf->Ln();
  $pdf->SetX(37);
  $pdf->Cell(90, 5, JText::_('HS_CODE') . ': ' . $this->item->hs_code, 'L');
  $pdf->Ln();

  if($this->item->recycle_coefficient > 0) {
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('RECYCLE_COEFFICIENT') . ': ' . $this->item->recycle_coefficient . ' %', 'L');
	$pdf->Ln(6);
  }

  $pdf->SetX(37);
  $pdf->Ln(9);

  $pdf->SetFont('Arial','B',10.5);
  $pdf->Cell(27, 7, JText::_('SHIPPING'));
  $pdf->SetFont('Arial','',9);

  $pdf->Cell(90, 5, JText::_('UNITS_PER_BOX') . ': ' . $this->item->units_per_box, 'L');

  $pdf->Ln();
  $pdf->SetX(37);
  $pdf->Cell(90, 5, JText::_('BOX_DIMENSIONS') . ': ' . number_format((float)$this->item->box_length, 0, '.', '') . ' x ' . number_format((float)$this->item->box_width, 0, '.', '') .' x ' . number_format((float)$this->item->box_height, 0, '.', '') .' mm', 'L');
  $pdf->Ln();

  if($this->item->box_weight > 0) {
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('BOX_WEIGHT') . ': ' . $this->item->box_weight . ' kg', 'L');
	$pdf->Ln();
  }

  if($this->item->box_volume > 0) {
	$pdf->SetX(37);
	$pdf->Cell(90, 5, JText::_('BOX_VOLUME') . ': ' . $this->item->box_volume . ' m3', 'L');
	$pdf->Ln();
  }

  $pdf->Ln(9);
  $pdf->Output(JPATH_BASE . '/images/pdfs/accessories/technical_files/' . AccessoriesHelper::seoUrl($this->item->name) . '.pdf');
}

else {
  echo JText::_('NO_PRODUCT');
}