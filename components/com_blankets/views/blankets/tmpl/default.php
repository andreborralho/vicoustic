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
					<?php echo BlanketsHelper::renderProductsImage($item); ?>
				</div>

				<h2 class="products_list_family"><?php echo $item->family; ?></h2>

				<div class="products_list_description"><?php echo $item->description1; ?></div>

				<div class="products_list_icons">
					<img title="Acoustic Reduction (rw)" alt="Acoustic Reduction (rw)" src="images/icons/icon_rw.png">
					<div class="products_list_icon blankets_list_rw">
						<?php
							if ($item->rw == 0) {
								echo "N/A";
							}
							else {
								echo $item->rw . ' ' . JText::_('MM');
							}
						?>
					</div>

					<img title="Dimensions" alt="Dimensions" src="images/icons/icon_dimensions.png">
					<div class="products_list_icon blankets_list_dimensions">
						<?php
							echo number_format((float)$item->length, 0, '.', '') . ' x ' .
								number_format((float)$item->width, 0, '.', '') . ' x ' .
								number_format((float)$item->thickness, 0, '.', '') . JText::_('MM');
						?>
					</div>
				</div>
			</a>

		<?php } ?>
	</ul>

<?php
}
else {
	echo JText::_('NO_BLANKETS');
}
