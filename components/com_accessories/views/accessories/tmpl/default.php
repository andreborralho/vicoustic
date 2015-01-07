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

<h1 class="page_title"><?php echo JText::_('ACCESSORIES'); ?></h1>

<?php if($this->items) { ?>

	<ul class="items_list products_items_list">

		<?php foreach ($this->items as $item) {  ?>
			<a class="products_list_entry" href="<?php echo JRoute::_('index.php?option=com_accessories&view=accessory&id=' . (int)$item->id); ?>">

				<div class="products_list_img">
					<?php echo AccessoriesHelper::renderProductsImage($item); ?>
				</div>

				<h2 class="products_list_family"><?php echo $item->family; ?></h2>

				<div class="products_list_description"><?php echo $item->description1; ?></div>
			</a>
		<?php } ?>
	</ul>

<?php
}
else {
	echo JText::_('NO_ACCESSORIES');
}
?>
