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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_doors', JPATH_ADMINISTRATOR);

?>

<?php 
	$url_rw = JURI::current();																			
	$tokens = explode('/', $url_rw);
	$url_rw = $tokens[sizeof($tokens)-1];	
?>

<h1 class="page_title">Acoustic Doors</h1>
                
<?php if($this->items) : ?>

    <div class="items">

        <ul class="items_list products_items_list">

            <?php foreach ($this->items as $item) : ?>
            	            	           		
            	<?php if($item->state_featured) : ?>
            																	
					<a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_doors&view=door&id=' . (int)$item->id); ?>">
						
						<div class="products_list_img">
							<?php if($item->photo_150px) : ?>
								<img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px?>" width="150px" height="150px">
							<?php else : ?>
								<img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
							<?php endif; ?>
						</div>

						<h2 class="products_list_family"><?php echo $item->family; ?></h2>
												
						<div class="products_list_description"><?php echo $item->description1; ?></div>
						
						<div class="products_list_icons">
						
							<img title="Acoustic Reduction (rw)" alt="Rw" src="images/icons/icon_rw.png" height="30px" width="30px">
							<div class="products_list_icon doors_list_aw">								
								<?php echo $item->rw; ?> dB
							</div>	
							
							<img title="Fire Resistance" alt="Fire Resistance" src="images/icons/icon_fire.png" height="30px" width="30px">										
							<div class="products_list_icon doors_list_fire_res">
								 <?php echo $item->fire_resistance; ?> minutes
							</div>	
																	
							<?php if($item->number_of_doors == 1) : ?>
								<img title="Single Door" alt="Single Door" src="images/icons/icon_single_door.png" height="30px" width="30px">								
						 	<?php else: ?>
								<img title="Double Door" alt="Double Door" src="images/icons/icon_double_door.png" height="30px" width="30px">								
						 	<?php endif; ?>

							<div class="products_list_icon doors_list_number_of_doors">
								<?php if($item->number_of_doors == 1) : ?>
							 		<?php echo JText::_('COM_DOORS_LEGEND_SINGLE_DOOR'); ?>
							 	<?php else: ?>
							 		<?php echo JText::_('COM_DOORS_LEGEND_DOUBLE_DOOR'); ?>
							 	<?php endif; ?>
						    </div>
				
							<img title="Dimensions" alt="Dimensions" src="images/icons/icon_dimensions.png" height="30px" width="30px">
							<div class="products_list_icon doors_list_dimensions">
								<?php echo number_format((float)$item->width, 0, '.', ''); ?> x
								<?php echo number_format((float)$item->height, 0, '.', ''); ?> mm
							</div>
						</div>			
					</a>
				<?php endif; ?>

            <?php endforeach; ?>
        </ul>

    </div>    
    
<?php else: ?>
    There are no items in the list
<?php endif; ?>