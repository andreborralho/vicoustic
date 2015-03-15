<?php
	/**
	 * @version     1.0.0
	 * @package     com_antivibratics
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
	 */

// no direct access
	defined('_JEXEC') or die;
?>

	<h1 class="page_title"><?php echo JText::_('ANTIVIBRATICS'); ?></h1>

<?php if($this->items) { ?>

	<ul class="items_list products_items_list">

		<?php foreach ($this->items as $item) {  ?>
			<a class="products_list_entry" href="<?php echo JRoute::_('index.php?option=com_antivibratics&view=antivibratic&id=' . (int)$item->id); ?>">

				<div class="products_list_img">
					<?php echo PanelsHelper::renderProductsImage($item); ?>
				</div>

				<h2 class="products_list_family"><?php echo $item->family; ?></h2>

				<div class="products_list_description"><?php echo $item->description1; ?></div>

				<div class="products_list_icons">
					<?php
						echo PanelsHelper::renderProductsIcons('images/icons/icon_load_weight.png', 'Load Weight', PanelsHelper::renderInterval($item->load_weight_min, $item->load_weight_max, JText::_('KG')), 'antivibratics_list_load_weight');
						echo PanelsHelper::renderProductsIcons('images/icons/icon_mounting_width.png', 'Mounting Width', PanelsHelper::renderIconsProperty($item->mounting_width), 'antivibratics_list_mounting_width');
					?>

					<?php if($item->installation_wall == 1) { ?>
						<img title="Installation: Wall" alt="Installation: Wall" src="images/icons/icon_wall.png">
						<div class="products_list_icon antivibratics_list_installation">
							<?php echo JText::_('WALL'); ?>

							<?php if($item->installation_ceiling == 1 || $item->installation_floor == 1 || $item->installation_division_wall == 1) { ?>
								<span>,</span>
							<?php } ?>
						</div>
					<?php } ?>

					<?php if($item->installation_ceiling == 1) { ?>
						<img title="Installation: Ceiling" alt="Installation: Ceiling" src="images/icons/icon_ceiling.png">
						<div class="products_list_icon antivibratics_list_installation">
							<?php echo JText::_('CEILING'); ?>

							<?php if($item->installation_floor == 1 || $item->installation_division_wall == 1) { ?>
								<span>,</span>
							<?php } ?>
						</div>
					<?php } ?>

					<?php if($item->installation_floor == 1) { ?>
						<img title="Installation: Floor" alt="Installation: Floor" src="images/icons/icon_floor.png">
						<div class="products_list_icon antivibratics_list_installation">
							<?php echo JText::_('FLOOR'); ?>

							<?php if($item->installation_division_wall == 1) { ?>
								<span>,</span>
							<?php } ?>
						</div>
					<?php } ?>

					<?php if($item->installation_division_wall == 1) { ?>
						<img title="Installation: Division Wall" alt="Installation: Division Wall" src="images/icons/icon_wall.png">
						<div class="products_list_icon antivibratics_list_installation">
							<?php echo JText::_('DIVISION_WALL'); ?>
						</div>
					<?php } ?>
				</div>
			</a>

		<?php } ?>
	</ul>

<?php
}
else {
	echo JText::_('NO_ANTIVIBRATICS');
}
