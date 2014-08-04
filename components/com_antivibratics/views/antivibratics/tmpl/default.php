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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_antivibratics', JPATH_ADMINISTRATOR);
?>

<h1 class="page_title">Anti-Vibratics</h1>

<?php if($this->items) : ?>

    <div class="items">
        <ul class="items_list products_items_list">

			<?php foreach ($this->items as $item) :?>
				<a class="products_list_entry" style="cursor: pointer;" href="<?php echo JRoute::_('index.php?option=com_antivibratics&view=antivibratic&id=' . (int)$item->id); ?>">

					<div class="products_list_img">						
						<?php if($item->photo_150px) : ?>
							<img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
						<?php else : ?>
							<img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
						<?php endif; ?>						
					</div>		

					<h2 class="products_list_family"><?php echo $item->family; ?></h2>

					<div class="products_list_description"><?php echo $item->description1; ?></div>					
					
					<div class="products_list_icons">
						
						<img title="Load Weight" alt="Load Weight" src="images/icons/icon_load_weight.png" height="30px" width="30px">
						<div class="products_list_icon antivibratics_list_load_weight">
							<?php if($item->load_weight_min == $item->load_weight_max): ?>
								<?php echo $item->load_weight_min; ?> Kg
							<?php else: ?>
								<?php echo $item->load_weight_min; ?> to <?php echo $item->load_weight_max; ?> Kg
							<?php endif; ?>
						</div>
						
						<img title="Mounting Width" alt="Mounting Width" src="images/icons/icon_nrc.png" height="30px" width="30px">
						<div class="products_list_icon antivibratics_list_mounting_width">
							<?php echo $item->mounting_width; ?>
						</div>	
						
						
						<?php if($item->installation_wall == 1): ?>
							<img title="Installation: Wall" alt="Installation: Wall" src="images/icons/icon_wall.png" height="30px" width="30px">
							<div class="products_list_icon antivibratics_list_installation">
								<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_WALL'); ?>
								
								<?php if($item->installation_ceiling == 1 || $item->installation_floor == 1 || $item->installation_division_wall == 1): ?>
									<span>,</span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						
						<?php if($item->installation_ceiling == 1): ?>
							<img title="Installation: Ceiling" alt="Installation: Ceiling" src="images/icons/icon_ceiling.png" height="30px" width="30px">
							<div class="products_list_icon antivibratics_list_installation">
								<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_CEILING'); ?>
								
								<?php if($item->installation_floor == 1 || $item->installation_division_wall == 1): ?>
									<span>,</span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						
						<?php if($item->installation_floor == 1): ?>
							<img title="Installation: Floor" alt="Installation: Floor" src="images/icons/icon_floor.png" height="30px" width="30px">
							<div class="products_list_icon antivibratics_list_installation">
								<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_FLOOR'); ?>
								
								<?php if($item->installation_division_wall == 1): ?>
									<span>,</span>
								<?php endif; ?>
							</div>						
						<?php endif; ?>
						
						<?php if($item->installation_division_wall == 1): ?>
							<img title="Installation: Division Wall" alt="Installation: Division Wall" src="images/icons/icon_wall.png" height="30px" width="30px">
							<div class="products_list_icon antivibratics_list_installation">								
								<?php echo JText::_('COM_ANTIVIBRATICS_ANTIVIBRATIC_INSTALLATION_DIVISION_WALL'); ?>
							</div>																		
						<?php endif; ?>
					</div>
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