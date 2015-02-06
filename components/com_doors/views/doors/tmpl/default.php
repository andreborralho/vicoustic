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

<?php
	$url_rw = JURI::current();
	$tokens = explode('/', $url_rw);
	$url_rw = $tokens[sizeof($tokens)-1];
?>

	<h1 class="page_title"><?php echo JText::_('ACOUSTIC_DOORS'); ?></h1>

<?php if($this->items) { ?>

	<ul class="items_list products_items_list">

		<?php foreach ($this->items as $item) {  ?>
			<a class="products_list_entry" href="<?php echo JRoute::_('index.php?option=com_doors&view=door&id=' . (int)$item->id); ?>">

				<div class="products_list_img">
					<?php echo DoorsHelper::renderProductsImage($item); ?>
				</div>

				<h2 class="products_list_family"><?php echo $item->family; ?></h2>

				<div class="products_list_description"><?php echo $item->description1; ?></div>

				<div class="products_list_icons">
					<img title="Acoustic Reduction (rw)" alt="Rw" src="images/icons/icon_rw.png">
					<div class="products_list_icon doors_list_aw">
						<?php echo $item->rw . ' ' . JText::_('DB'); ?>
					</div>

					<img title="Fire Resistance" alt="Fire Resistance" src="images/icons/icon_fire.png">
					<div class="products_list_icon doors_list_fire_res">
						<?php echo $item->fire_resistance . ' ' . JText::_('MINUTES'); ?>
					</div>

					<?php if($item->number_of_doors == 1) { ?>
						<img title="Single Door" alt="Single Door" src="images/icons/icon_single_door.png">
					<?php
					}
					else {
						?>
						<img title="Double Door" alt="Double Door" src="images/icons/icon_double_door.png">
					<?php } ?>

					<div class="products_list_icon doors_list_number_of_doors">
						<?php
							if($item->number_of_doors == 1) {
								echo JText::_('SINGLE_DOOR');
							}
							else {
								echo JText::_('DOUBLE_DOOR');
							}
						?>
					</div>

					<img title="Dimensions" alt="Dimensions" src="images/icons/icon_dimensions.png">
					<div class="products_list_icon doors_list_dimensions">
						<?php
							echo number_format((float)$item->width, 0, '.', '') . ' x ' .
								number_format((float)$item->height, 0, '.', '') . ' ' . JText::_('MM');
						?>
					</div>
				</div>
			</a>

		<?php } ?>
	</ul>

<?php
}
else {
	echo JText::_('NO_DOORS');
}
