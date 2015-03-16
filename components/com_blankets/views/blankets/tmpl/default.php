<?php
	/**
	 * @version     1.0.0
	 * @package     com_blankets
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
	 */


// no direct access
	defined('_JEXEC') or die;
?>

	<h1 class="page_title"><?php echo JText::_('BLANKETS'); ?></h1>

<?php if($this->items) { ?>

	<ul class="items_list products_items_list">

		<?php foreach ($this->items as $item) {  ?>
			<a class="products_list_entry" href="<?php echo JRoute::_('index.php?option=com_blankets&view=blanket&id=' . (int)$item->id); ?>">

				<div class="products_list_img">
					<?php echo PanelsHelper::renderProductsImage($item); ?>
				</div>

				<h2 class="products_list_family"><?php echo $item->family; ?></h2>

				<div class="products_list_description"><?php echo $item->description1; ?></div>

				<div class="products_list_icons">
					<?php
						echo PanelsHelper::renderProductsIcons('images/icons/icon_rw.png', 'Acoustic Reduction (rw)', PanelsHelper::renderIconsProperty($item->rw, JText::_('DB')), 'blankets_list_rw');
						echo PanelsHelper::renderProductsIcons('images/icons/icon_dimensions.png', JText::_('DIMENSIONS'), PanelsHelper::render3Dimensions($item->length, $item->width, $item->thickness, JText::_('MM')), 'blankets_list_dimensions');
					?>
				</div>
			</a>

		<?php } ?>
	</ul>

<?php
}
else {
	echo JText::_('NO_BLANKETS');
}
