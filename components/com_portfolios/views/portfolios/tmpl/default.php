<?php
/**
 * @version     1.0.0
 * @package     com_portfolio
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;
//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_portfolios', JPATH_ADMINISTRATOR);
?>

<h1 class="page_title">Portfolio</h1>

<?php if($this->items) : ?>

	<ul class="items_list portfolios_items_list">

		<?php foreach ($this->items as $item) :?>

			<div class="portfolios_list_entry">
				<a href="<?php echo JRoute::_('index.php?option=com_portfolios&view=portfolio&id=' . (int)$item->id); ?>">						
					<div class="portfolios_list_image">
						<li>
							<img alt="<?php echo $item->title; ?>" src="<?php echo $item->icon; ?>" width="240px" height="160px">
						</li>
					</div>
					
					<div class="portfolios_list_name">
						<li><?php echo $item->title; ?></li>
						<li><?php echo $item->country; ?></li>
					</div>						
				</a>
			</div>
			
		<?php endforeach; ?>
	</ul>     
    
<?php else: ?>
    
    There are no items in the list

<?php endif; ?>