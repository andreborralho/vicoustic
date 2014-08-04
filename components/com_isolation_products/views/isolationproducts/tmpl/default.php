<?php
/**
 * @version     1.0.0
 * @package     com_isolation_products
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

$url = JURI::current();
$tokens = explode('/', $url);

$db =& JFactory::getDBO();
$query = "SELECT * FROM #__doors";    
$db->setQuery( $query, 0 , $this->items );
$items = $db->loadObjectList();

?>

<h1 class="page_title">Insulation</h1>

    <div class="items">

        <ul class="items_list products_items_list">

            <?php foreach ($items as $item) : ?>            	            	           		
            	<?php if($item->state_featured) : ?>
            																	
					<a class="products_list_entry" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/doors/door/' . (int)$item->id; ?>">						
						<div class="products_list_img">
							<?php if($item->photo_150px) : ?>
								<img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px?>" width="150px" height="150px">
							<?php else : ?>
								<img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
							<?php endif; ?>
						</div>

						<div class="products_list_family"><?php echo $item->family; ?></div>
												
						<div class="products_list_description"><?php echo $item->description1; ?></div>
						
						<div class="products_list_icons">
						
							<img title="Acoustic Reduction (rw)" alt="Acoustic Reduction (rw)" src="images/icons/icon_rw.png" height="30px" width="30px">
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

<?php
    $db =& JFactory::getDBO();
    $query = "SELECT * FROM #__antivibratics";
    $db->setQuery( $query, 0 , $this->items );
    $items = $db->loadObjectList();
?>
    <div class="items">

        <ul class="items_list products_items_list">

			<?php foreach ($items as $item) :?>
				<?php if($item->state_featured) : ?>
					<a class="products_list_entry" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/antivibratics/antivibratic/' . (int)$item->id; ?>">
						<div class="products_list_img">
							<?php if($item->photo_150px) : ?>
								<img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
							<?php else : ?>
								<img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">	
							<?php endif; ?>
						</div>		

						<div class="products_list_family"><?php echo $item->family; ?></div>

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
				<?php endif; ?>				
            <?php endforeach; ?>
        </ul>
    </div>
    
    <?php 
        $db =& JFactory::getDBO();
        $query = "SELECT * FROM #__blankets";
        $db->setQuery( $query, 0 , $this->items );
        $items = $db->loadObjectList();
    ?>

    <div class="items">

        <ul class="items_list products_items_list">

            <?php foreach ($items as $item) :?>

	            <?php if($item->state_featured) : ?>
	                <a class="products_list_entry" style="cursor: pointer;" href="<?php echo $tokens[3] . '/products/insulation/blankets/blanket/' . (int)$item->id; ?>">										
						<div class="products_list_img">
							<?php if($item->photo_150px) : ?>
								<img alt="<?php echo $item->family; ?>" src="<?php echo $item->photo_150px; ?>" width="150px" height="150px">
							<?php else : ?>
								<img alt="<?php echo $item->family; ?>" class="products_list_not_available" src="images/not_available_medium.png" width="150px" height="150px">
							<?php endif; ?>
						</div>	

						<div class="products_list_family"><?php echo $item->family; ?></div>

						<div class="products_list_description"><?php echo $item->description1; ?></div>
						
						
						<div class="products_list_icons">
							<img title="Acoustic Reduction (rw)" alt="Acoustic Reduction (rw)" src="images/icons/icon_rw.png" height="30px" width="30px">
							<div class="products_list_icon blankets_list_rw">								
								<?php echo $item->rw; ?> dB
							</div>												
							
							<img title="Dimensions" alt="Dimensions" src="images/icons/icon_dimensions.png" height="30px" width="30px">
								<div class="products_list_icon blankets_list_dimensions">
									<?php echo number_format((float)$item->length, 0, '.', ''); ?> x
									<?php echo number_format((float)$item->width, 0, '.', ''); ?> x
									<?php echo number_format((float)$item->thickness, 0, '.', ''); ?> mm
								</div>
						</div>
					</a>	
                <?php endif; ?>     
            <?php endforeach; ?>

        </ul>

    </div>

