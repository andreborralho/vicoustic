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

	<h1 class="page_title"><?php echo JText::_('ACOUSTIC_DOORS'); ?></h1>

<?php if($this->items) { ?>

	<ul class="items_list products_items_list">

		<?php foreach ($this->items as $item) {  ?>
			<a class="products_list_entry" href="<?php echo JRoute::_('index.php?option=com_doors&view=door&id=' . (int)$item->id); ?>">

				<div class="products_list_img">
					<?php echo PanelsHelper::renderProductsImage($item); ?>
				</div>

				<h2 class="products_list_family"><?php echo $item->family; ?></h2>

				<div class="products_list_description"><?php echo $item->description1; ?></div>

				<div class="products_list_icons">
					<?php
						echo PanelsHelper::renderProductsIcons('images/icons/icon_rw.png', 'Acoustic Reduction (rw)', PanelsHelper::renderIconsProperty($item->rw, JText::_('DB')), 'doors_list_aw');
						echo PanelsHelper::renderProductsIcons('images/icons/icon_fire.png', 'Fire Resistance', PanelsHelper::renderIconsProperty($item->fire_resistance, JText::_('MINUTES')), 'doors_list_fire_res');

						if($item->number_of_doors == 1) {
							echo PanelsHelper::renderProductsIcons('images/icons/icon_single_door.png', 'Single Door', JText::_('SINGLE_DOOR'), 'doors_list_number_of_doors');
						}
						else {
							echo PanelsHelper::renderProductsIcons('images/icons/icon_double_door.png', 'Double Door', JText::_('DOUBLE_DOOR'), 'doors_list_number_of_doors');
						}

						echo PanelsHelper::renderProductsIcons('images/icons/icon_dimensions.png', 'Dimensions', PanelsHelper::render2Dimensions($item->width, $item->height, JText::_('MM')), 'doors_list_dimensions');
					?>
				</div>
			</a>

		<?php } ?>
	</ul>

<?php
}
else {
	echo JText::_('NO_DOORS');
}
