<?php
	/**
	 * @version     1.0.0
	 * @package     com_panels
	 * @copyright   Copyright (C) 2012. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
	 */


// no direct access
	defined('_JEXEC') or die;

	$tokens = explode('/', JURI::current());
	$last_url = $tokens[sizeof($tokens)-1];
?>

	<h1 class="page_title"><?php echo JText::_('PANELS') . ' - ' . ucwords(str_replace('-panels', '', $last_url)); ?></h1>

<?php if($this->items) : ?>

	<ul class="items_list products_items_list">

		<?php foreach ($this->items as $item) { ?>
			<a class="products_list_entry" href="<?php echo JRoute::_('index.php?option=com_panels&view=panel&id=' . (int)$item->id); ?>">

				<div class="products_list_img">
					<?php echo PanelsHelper::renderProductsImage($item); ?>
				</div>

				<h2 class="products_list_family"><?php echo $item->family; ?></h2>

				<div class="products_list_description"><?php echo $item->description1; ?></div>

				<div class="products_list_icons">
					<?php
						echo PanelsHelper::renderProductsIcons('images/icons/icon_aw.png', 'Acoustic Absorption (aw)', PanelsHelper::renderIconsProperty($item->aw), 'panels_list_aw');
						echo PanelsHelper::renderProductsIcons('images/icons/icon_nrc.png', 'Acoustic Absorption (NRC)', PanelsHelper::renderIconsProperty($item->nrc, JText::_('DB')), 'panels_list_nrc');
						echo PanelsHelper::renderProductsIcons('images/icons/icon_eurclass.png', 'Fire Class', PanelsHelper::renderIconsProperty($item->fire_class_en), 'panels_list_fire_class');

						$image_srcs = ['images/icons/icon_low.png', 'images/icons/icon_medium.png', 'images/icons/icon_high.png', 'images/icons/icon_flat.png'];
						$image_labels = ['Low Frequencies', 'Medium Frequencies', 'High Frequencies', 'Flat Frequencies'];
						$options = ['low', 'medium', 'high', 'flat'];
						echo PanelsHelper::renderProductsIconsOptions($options, $image_srcs, $image_labels, ucwords($item->absorption_frequency), JText::_('FREQUENCIES'), 'panels_list_absorption_frequency');

						$image_srcs = ['images/icons/icon_absorption.png', 'images/icons/icon_diffusion.png', 'images/icons/icon_hybrid.png', 'images/icons/icon_hybrid.png'];
						$image_labels = ['Absorption', 'Diffusion', 'Basstrap', 'Hybrid'];
						$options = ['absorption', 'diffusion', 'basstrap', 'hybrid'];
						echo PanelsHelper::renderProductsIconsOptions($options, $image_srcs, $image_labels, ucwords($item->functionality), '', 'panels_list_functionality');
					?>
				</div>
			</a>

		<?php } ?>
	</ul>

<?php else: ?>
	There are no items in the list
<?php endif; ?>