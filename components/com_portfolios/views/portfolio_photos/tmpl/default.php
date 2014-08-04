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

<?php if($this->items) : ?>

    <div class="items">

        <ul class="items_list portfolios_items_list">

            <?php foreach ($this->items as $item) :?>

                <div class="portfolios_list_entry">
                	<a href="<?php echo JRoute::_('index.php?option=com_portfolios&view=portfolio&id=' . (int)$item->id); ?>">						
						<div class="portfolios_list_image">
							<li><img src="<?php echo $item->icon; ?>"/></li>
						</div>
						
						<div class="portfolios_list_name">
							<li><?php echo $item->title; ?></li>
							<li><b><?php echo $item->country; ?></b></li>
						</div>						
					</a>
				</div>
				
            <?php endforeach; ?>
        </ul>

    </div>

     <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
    
<?php else: ?>
    
    There are no items in the list

<?php endif; ?>