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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_accessories', JPATH_ADMINISTRATOR);
?>

<h1 class="page_title">Accessories</h1>

<?php if($this->items) : ?>
	
	<div class="items">
	    <ul class="items_list products_items_list">

	        <?php foreach ($this->items as $item) :?>
    			<a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_accessories&view=accessory&id=' . (int)$item->id); ?>">
					
					<div class="products_list_img">
						<?php if($item->photo_150px) : ?>
							<img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
						<?php else : ?>
							<img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">	
						<?php endif; ?>						
					</div>

					<h2 class="products_list_family"><?php echo $item->family; ?></h2>

					<div class="products_list_description"><?php echo $item->description1; ?></div>
				</a>
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
