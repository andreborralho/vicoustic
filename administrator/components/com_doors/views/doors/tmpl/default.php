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

JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);
// Import CSS
$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');

$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_doors');
$saveOrder	= $listOrder == 'a.ordering';
?>

 
    
<form action="<?php echo JRoute::_('index.php?option=com_doors&view=doors'); ?>" method="post" name="adminForm" id="adminForm">
	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('Search'); ?>" />
			<button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
		
        
		<div class='filter-select fltrt'>
			<select name="filter_published" class="inputbox" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
				<?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true);?>
			</select>
		</div>


	</fieldset>
	<div class="clr"> </div>

	<table id="doors_table" class="adminlist">
		<thead>
			<tr>
				<th width="35px">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>

				<?php if (isset($this->items[0]->state)) { ?>
					<th width="55px" class='left admin_border_left'>
						<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
					</th>
        		<?php } ?>
				
				<th width="55px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_STATE_FEATURED', 'a.state_featured', $listDirn, $listOrder); ?>
				</th>
				
				<th width="62px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_MUSIC_BROADCAST', 'a.music_broadcast', $listDirn, $listOrder); ?>
				</th>
				<th width="87px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_HIFI_HOME_CINEMA', 'a.hifi_home_cinema', $listDirn, $listOrder); ?>
				</th>
				<th width="78px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_BUILDING_CONSTRUCTION', 'a.building_construction', $listDirn, $listOrder); ?>
				</th>

				<th width="155px" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_NAME', 'a.name', $listDirn, $listOrder); ?>
				</th>
				
				<th width="50px" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_REF', 'a.ref', $listDirn, $listOrder); ?>
				</th>
				<th width="100px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_EAN13', 'a.ean13', $listDirn, $listOrder); ?>
				</th>
				<th width="100px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_UPC', 'a.upc', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_HS_CODE', 'a.hs_code', $listDirn, $listOrder); ?>
				</th>
				
				<th width="110px" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_FAMILY', 'a.family', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_WIDTH', 'a.width', $listDirn, $listOrder); ?> (mm)
				</th>				
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_HEIGHT', 'a.height', $listDirn, $listOrder); ?> (mm)
				</th>				
				<th width="60px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_NUMBER_OF_DOORS', 'a.number_of_doors', $listDirn, $listOrder); ?>
				</th>
				<th width="80px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_GROSS_WEIGHT', 'a.gross_weight', $listDirn, $listOrder); ?> (kg)
				</th>
				<th width="110px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_FINISH', 'a.finish', $listDirn, $listOrder); ?>
				</th>
				
				<th width="60px" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_FIRE_RESISTANCE', 'a.fire_resistance', $listDirn, $listOrder); ?>
				</th>
				<th width="80px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_RW', 'a.rw', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_DNFW', 'a.dnfw', $listDirn, $listOrder); ?>
				</th>

				<th width="70px" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_OUTER_WIDTH', 'a.outer_width', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_OUTER_HEIGHT', 'a.outer_height', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_RECOMMENDED_CONSTRUCTION_WIDTH', 'a.recommended_construction_width', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_RECOMMENDED_CONSTRUCTION_HEIGHT', 'a.recommended_construction_height', $listDirn, $listOrder); ?>
				</th>
				
				<th width="50px" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_UNITS_PER_PALLET', 'a.units_per_pallet', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PALLET_LENGTH', 'a.pallet_length', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PALLET_WIDTH', 'a.pallet_width', $listDirn, $listOrder); ?>
				</th>				
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PALLET_HEIGHT', 'a.pallet_height', $listDirn, $listOrder); ?>
				</th>				
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PALLET_VOLUME', 'a.pallet_volume', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PALLET_WEIGHT', 'a.pallet_weight', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_MSRP', 'a.msrp', $listDirn, $listOrder); ?> (&euro;)
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_MSRP_STATE', 'a.msrp_state', $listDirn, $listOrder); ?>
				</th>
				
				<th width="50px" class='left admin_border_left'>				
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_KEYLOCK', 'a.keylock', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_KEYLOCK_REF', 'a.keylock_ref', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_KEYLOCK_MSRP', 'a.keylock_msrp', $listDirn, $listOrder); ?> (&euro;)
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_ANTIPANIC_BAR', 'a.antipanic_bar', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_ANTIPANIC_BAR_REF', 'a.antipanic_bar_ref', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_ANTIPANIC_BAR_MSRP', 'a.antipanic_bar_msrp', $listDirn, $listOrder); ?> (&euro;)
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_KEYLOCK_ANTIPANICBAR_REF', 'a.keylock_antipanicbar_ref', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_KEYLOCK_ANTIPANICBAR_MSRP', 'a.keylock_antipanicbar_msrp', $listDirn, $listOrder); ?> (&euro;)
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_CIRCULAR_DOUBLE_WINDOW', 'a.circular_double_window', $listDirn, $listOrder); ?>
				</th>				
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_CIRCULAR_DOUBLE_WINDOW_REF', 'a.circular_double_window_ref', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_CIRCULAR_DOUBLE_WINDOW_MSRP', 'a.circular_double_window_msrp', $listDirn, $listOrder); ?> (&euro;)
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_WITHOUT_FLOOR_FRAME', 'a.without_floor_frame', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_WITHOUT_FLOOR_FRAME_REF', 'a.without_floor_frame_ref', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_WITHOUT_FLOOR_FRAME_MSRP', 'a.without_floor_frame_msrp', $listDirn, $listOrder); ?> (&euro;)
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_AUTOCLOSE_SYSTEM', 'a.autoclose_system', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_AUTOCLOSE_SYSTEM_REF', 'a.autoclose_system_ref', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_AUTOCLOSE_SYSTEM_MSRP', 'a.autoclose_system_msrp', $listDirn, $listOrder); ?> (&euro;)
				</th>
				
				<th width="300px" class='left admin_border_left admin_table_door_description'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_DESCRIPTION1', 'a.description1', $listDirn, $listOrder); ?>
				</th>
				<th width="650px" class='left admin_table_door_description'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_DESCRIPTION2', 'a.description2', $listDirn, $listOrder); ?>
				</th>
				
				<th width="100px" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_CATALOG_PAGE', 'a.catalog_page', $listDirn, $listOrder); ?>
				</th>
				<th width="100px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_INSTALLATION_MANUAL', 'a.installation_manual', $listDirn, $listOrder); ?>
				</th>
				<th width="100px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_SKETCHUP', 'a.sketchup', $listDirn, $listOrder); ?>
				</th>
				<th width="100px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_WARRANTY', 'a.warranty', $listDirn, $listOrder); ?>
				</th>
				<th width="100px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_DRAWINGS', 'a.drawings', $listDirn, $listOrder); ?>
				</th>
				<th width="100px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_SAFETY_DATA', 'a.safety_data', $listDirn, $listOrder); ?>
				</th>
				<th width="100px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_ACOUSTIC_REPORT', 'a.acoustic_report', $listDirn, $listOrder); ?>
				</th>

				<th width="250px" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_VIDEO', 'a.video', $listDirn, $listOrder); ?>
				</th>
				<th width="60px">
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PHOTO_150PX', 'a.photo_150px', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PHOTO_300PX', 'a.photo_300px', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PHOTO_1024PX', 'a.photo_1024px', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PHOTO_DETAIL1', 'a.photo_detail1', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PHOTO_DETAIL2', 'a.photo_detail2', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PHOTO_DETAIL3', 'a.photo_detail3', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PHOTO_DETAIL4', 'a.photo_detail4', $listDirn, $listOrder); ?>
				</th>
				<th width="70px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PHOTO_DETAIL5', 'a.photo_detail5', $listDirn, $listOrder); ?>
				</th>
				<th width="90px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PORTFOLIO_PHOTO_ID1', 'a.portfolio_photo_id1', $listDirn, $listOrder); ?>
				</th>
				<th width="90px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DOORS_DOORS_PORTFOLIO_PHOTO_ID2', 'a.portfolio_photo_id2', $listDirn, $listOrder); ?>
				</th>
				
        		<?php if (isset($this->items[0]->ordering)) { ?>
					<th width="100px">
						<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'a.ordering', $listDirn, $listOrder); ?>
						<?php if ($canOrder && $saveOrder) :?>
							<?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', 'doors.saveorder'); ?>
						<?php endif; ?>
					</th>
       			<?php } ?>
        
		        <?php if (isset($this->items[0]->id)) { ?>
		        <th width="30px" class="nowrap admin_border_left">
		            <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
		        </th>
		        <?php } ?>
        
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="70">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			$ordering	= ($listOrder == 'a.ordering');
			$canCreate	= $user->authorise('core.create',		'com_doors');
			$canEdit	= $user->authorise('core.edit',			'com_doors');
			$canCheckin	= $user->authorise('core.manage',		'com_doors');
			$canChange	= $user->authorise('core.edit.state',	'com_doors');
			$keylock = 0;
			$antipanicbar = 0;
			$circularwindow = 0;
			$floorframe = 0;
			$autoclose = 0;
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>

				 <?php if (isset($this->items[0]->state)) { ?>
				    <td class="center admin_border_left">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'doors.', $canChange, 'cb'); ?>
				    </td>
		        <?php } ?>
				
				<?php if (isset($this->items[0]->state_featured)) { ?>
					<td class="center">
						<?php echo JHtml::_('jgrid.published', $item->state_featured, $i, 'doors.', $canChange, 'cb'); ?>
					</td>
				<?php } ?>	
				
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->music_broadcast, $i, 'doors.', $canChange, 'cb'); ?>
				</td>
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->hifi_home_cinema, $i, 'doors.', $canChange, 'cb'); ?>
				</td>	
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->building_construction, $i, 'doors.', $canChange, 'cb'); ?>
				</td>

				<td class="admin_border_left">
					<?php if (isset($item->checked_out) && $item->checked_out) : ?>
						<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'doors.', $canCheckin); ?>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<a href="<?php echo JRoute::_('index.php?option=com_doors&task=door.edit&id='.(int) $item->id); ?>">
						<?php echo $this->escape($item->name); ?></a>
					<?php else : ?>
						<?php echo $this->escape($item->name); ?>
					<?php endif; ?>
				</td>
				
				<td class="admin_border_left">
					<?php echo $item->ref; ?>
				</td>
				<td>
					<?php echo $item->ean13; ?>
				</td>
				<td>
					<?php echo $item->upc; ?>
				</td>
				<td>
					<?php echo $item->hs_code; ?>
				</td>
				
				<td class="admin_border_left">
					<?php echo $item->family; ?>
				</td>
				<td>
					<?php echo $item->width; ?>
				</td>			
				<td>
					<?php echo $item->height; ?>
				</td>				
				<td>
					<?php echo $item->number_of_doors; ?>
				</td>
				<td>
					<?php echo $item->gross_weight; ?>
				</td>
				<td>
					<?php echo $item->finish; ?>
				</td>
				
				<td class="admin_border_left">
					<?php echo $item->fire_resistance; ?>
				</td>
				<td>
					<?php echo $item->rw; ?>
				</td>
				<td>
					<?php echo $item->dnfw; ?>
				</td>

				<td class="admin_border_left">
					<?php echo $item->outer_width; ?>
				</td>
				<td>
					<?php echo $item->outer_height; ?>
				</td>
				<td>
					<?php echo $item->recommended_construction_width; ?>
				</td>
				<td>
					<?php echo $item->recommended_construction_height; ?>
				</td>

				<td class="admin_border_left">
					<?php echo $item->units_per_pallet; ?>
				</td>
				<td>
					<?php echo $item->pallet_length; ?>
				</td>				
				<td>
					<?php echo $item->pallet_width; ?>
				</td>
				<td>
					<?php echo $item->pallet_height; ?>
				</td>
				<td>
					<?php echo $item->pallet_volume; ?>
				</td>
				<td>
					<?php echo $item->pallet_weight; ?>
				</td>
				<td>
					<?php echo $item->msrp; ?>
				</td>
				<td>
					<?php echo $item->msrp_state; ?>
				</td>
				
				<td class="admin_border_left center">
					<?php if ($item->keylock == 1) : ?>
					<span class="check"></span>
					<?php $keylock = 1;?>
					<?php else: ?>
					<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($keylock == 1) : ?>
						<span>(included)</span>
					<?php else: ?>
						<?php echo $item->keylock_ref; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $item->keylock_msrp; ?>
				</td>
				
				<td class="center">
					<?php if ($item->antipanic_bar == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($antipanicbar == 1) : ?>
						<span>(included)</span>
					<?php else: ?>
						<?php echo $item->antipanic_bar_ref; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $item->antipanic_bar_msrp; ?>
				</td>
				
				<td>
					<?php echo $item->keylock_antipanicbar_ref; ?>
				</td>
				<td>
					<?php echo $item->keylock_antipanicbar_msrp; ?>
				</td>
				
				<td class="center">
					<?php if ($item->circular_double_window == 1) : ?>
						<span class="check"></span>
						<?php $circularwindow = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>				
				<td>
					<?php if ($circularwindow == 1) : ?>
						<span>(included)</span>
					<?php else: ?>
						<?php echo $item->circular_double_window_ref; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $item->circular_double_window_msrp; ?>
				</td>
				
				<td class="center">
					<?php if ($item->without_floor_frame == 1) : ?>
						<span class="check"></span>
						<?php $floorframe = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($floorframe == 1) : ?>
						<span>(included)</span>
					<?php else: ?>
						<?php echo $item->without_floor_frame_ref; ?>
					<?php endif; ?>					
				</td>
				<td>
					<?php echo $item->without_floor_frame_msrp; ?>
				</td>
				
				<td class="center">
					<?php if ($item->autoclose_system == 1) : ?>
					<span class="check"></span>
					<?php $autoclose = 1;?>
					<?php else: ?>
					<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($autoclose == 1) : ?>
						<span>(included)</span>
					<?php else: ?>
						<?php echo $item->autoclose_system_ref; ?>
					<?php endif; ?>		
				</td>
				<td>
					<?php echo $item->autoclose_system_msrp; ?>
				</td>
				

				<td class="admin_border_left">
					<?php echo $item->description1; ?>
				</td>
				<td>
					<?php echo $item->description2; ?>
				</td>

				<td class="admin_border_left">
					<?php echo $item->catalog_page; ?>
				</td>
				<td>
					<?php echo $item->installation_manual; ?>
				</td>
				<td>
					<?php echo $item->sketchup; ?>
				</td>
				<td>
					<?php echo $item->warranty; ?>
				</td>
				<td>
					<?php echo $item->drawings; ?>
				</td>
				<td>
					<?php echo $item->safety_data; ?>
				</td>
				<td>
					<?php echo $item->acoustic_report; ?>
				</td>


				<td class="admin_border_left">
					<?php echo str_replace("<iframe", "", $item->video); ?>
				</td>
				<td>
					<?php if (substr($item->photo_150px,0,6) == 'images') : ?>
						<img alt="Photo 150px" src="../<?php echo $item->photo_150px; ?>" height="60" width="60">
					<?php else :?>
						<img alt="Photo 150px" src="<?php echo $item->photo_150px; ?>" height="60" width="60">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_300px,0,6) == 'images') : ?>
						<img alt="Photo 300px" src="../<?php echo $item->photo_300px; ?>" height="60" width="60">
					<?php else :?>
						<img alt="Photo 300px" src="<?php echo $item->photo_300px; ?>" height="60" width="60">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_1024px,0,6) == 'images') : ?>
						<img alt="Photo 1024px" src="../<?php echo $item->photo_1024px; ?>" height="60" width="60">
					<?php else :?>
						<img alt="Photo 1024px" src="<?php echo $item->photo_1024px; ?>" height="60" width="60">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail1,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail1; ?>" height="60" width="60">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail1; ?>" height="60" width="60">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_detail2,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail2; ?>" height="60" width="60">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail2; ?>" height="60" width="60">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_detail3,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail3; ?>" height="60" width="60">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail3; ?>" height="60" width="60">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_detail4,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail4; ?>" height="60" width="60">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail4; ?>" height="60" width="60">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_detail5,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail5; ?>" height="60" width="60">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail5; ?>" height="60" width="60">
					<?php endif; ?>	
				</td>

				<td>
					<img alt="Portfolio Photo" src="../<?php echo $item->portfolio_photo1_photo; ?>" height="60" width="80">
				</td>
				<td>
					<img alt="Portfolio Photo" src="../<?php echo $item->portfolio_photo2_photo; ?>" height="60" width="80">
				</td>			
				
		 		<?php if (isset($this->items[0]->ordering)) { ?>
				    <td class="order">
					    <?php if ($canChange) : ?>
						    <?php if ($saveOrder) :?>
							    <?php if ($listDirn == 'asc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, 'doors.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'doors.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							    <?php elseif ($listDirn == 'desc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, 'doors.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'doors.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							    <?php endif; ?>
						    <?php endif; ?>
						    <?php $disabled = $saveOrder ?  '' : 'disabled="disabled"'; ?>
						    <input type="text" name="order[]" size="5" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text-area-order" />
					    <?php else : ?>
						    <?php echo $item->ordering; ?>
					    <?php endif; ?>
				    </td>
      			<?php } ?>
      	
      			<?php if (isset($this->items[0]->id)) { ?>
					<td class="center admin_border_left">
						<?php echo (int) $item->id; ?>
					</td>
        		<?php } ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
<script type="text/javascript">

	jQuery(function(){
	    jQuery("#doors_table").stickyTableHeaders();
	});
	
	;(function ($, window, undefined) {
	'use strict';

	var name = 'stickyTableHeaders';
	var defaults = {
			fixedOffset: 0
		};

	function Plugin (el, options) {
		// To avoid scope issues, use 'base' instead of 'this'
		// to reference this class from internal events and functions.
		var base = this;

		// Access to jQuery and DOM versions of element
		base.$el = $(el);
		base.el = el;

		// Listen for destroyed, call teardown
		base.$el.bind('destroyed',
			$.proxy(base.teardown, base));

		// Cache DOM refs for performance reasons
		base.$window = $(window);
		base.$clonedHeader = null;
		base.$originalHeader = null;

		// Keep track of state
		base.isCloneVisible = false;
		base.leftOffset = null;
		base.topOffset = null;

		base.init = function () {
			base.options = $.extend({}, defaults, options);

			base.$el.each(function () {
				var $this = $(this);

				// remove padding on <table> to fix issue #7
				$this.css('padding', 0);

				base.$originalHeader = $('thead:first', this);
				base.$clonedHeader = base.$originalHeader.clone();

				base.$clonedHeader.addClass('tableFloatingHeader');
				base.$clonedHeader.css({
					'position': 'fixed',
					'top': 0,
					'z-index': 1, // #18: opacity bug
					'display': 'none'
				});

				base.$originalHeader.addClass('tableFloatingHeaderOriginal');

				base.$originalHeader.after(base.$clonedHeader);

				// enabling support for jquery.tablesorter plugin
				// forward clicks on clone to original
				$('th', base.$clonedHeader).on('click.' + name, function (e) {
					var index = $('th', base.$clonedHeader).index(this);
					$('th', base.$originalHeader).eq(index).click();
				});
				$this.on('sortEnd.' + name, base.updateWidth);
			});

			base.updateWidth();
			base.toggleHeaders();

			base.bind();
		};

		base.destroy = function (){
			base.$el.unbind('destroyed', base.teardown);
			base.teardown();
		};

		base.teardown = function(){
			$.removeData(base.el, 'plugin_' + name);
			base.unbind();

			base.$clonedHeader.remove();
			base.$originalHeader.removeClass('tableFloatingHeaderOriginal');
			base.$originalHeader.css('visibility', 'visible');

			base.el = null;
			base.$el = null;
		};

		base.bind = function(){
			base.$window.on('scroll.' + name, base.toggleHeaders);
			base.$window.on('resize.' + name, base.toggleHeaders);
			base.$window.on('resize.' + name, base.updateWidth);
			// TODO: move tablesorter bindings here
		};

		base.unbind = function(){
			// unbind window events by specifying handle so we don't remove too much
			base.$window.off('.' + name, base.toggleHeaders);
			base.$window.off('.' + name, base.updateWidth);
			base.$el.off('.' + name);
			base.$el.find('*').off('.' + name);
		};

		base.toggleHeaders = function () {
			base.$el.each(function () {
				var $this = $(this);

				var newTopOffset = isNaN(base.options.fixedOffset) ?
					base.options.fixedOffset.height() : base.options.fixedOffset;

				var offset = $this.offset();
				var scrollTop = base.$window.scrollTop() + newTopOffset;
				var scrollLeft = base.$window.scrollLeft();

				if ((scrollTop > offset.top) && (scrollTop < offset.top + $this.height())) {
					var newLeft = offset.left - scrollLeft;
					if (base.isCloneVisible && (newLeft === base.leftOffset) && (newTopOffset === base.topOffset)) {
						return;
					}

					base.$clonedHeader.css({
						'top': newTopOffset,
						'margin-top': 0,
						'left': newLeft,
						'display': 'block'
					});
					base.$originalHeader.css('visibility', 'hidden');
					base.isCloneVisible = true;
					base.leftOffset = newLeft;
					base.topOffset = newTopOffset;
				}
				else if (base.isCloneVisible) {
					base.$clonedHeader.css('display', 'none');
					base.$originalHeader.css('visibility', 'visible');
					base.isCloneVisible = false;
				}
			});
		};

		base.updateWidth = function () {
			// Copy cell widths and classes from original header
			$('th', base.$clonedHeader).each(function (index) {
				var $this = $(this);
				var $origCell = $('th', base.$originalHeader).eq(index);
				this.className = $origCell.attr('class') || '';
				$this.css('width', $origCell.width());
			});

			// Copy row width from whole table
			base.$clonedHeader.css('width', base.$originalHeader.width());
		};

		// Run initializer
		base.init();
	}

	// A plugin wrapper around the constructor,
	// preventing against multiple instantiations
	$.fn[name] = function ( options ) {
		return this.each(function () {
			var instance = $.data(this, 'plugin_' + name);
			if (instance) {
				if (typeof options === "string") {
					instance[options].apply(instance);
				}
			} else if(options !== 'destroy') {
				$.data(this, 'plugin_' + name, new Plugin( this, options ));
			}
		});
	};

})(jQuery, window);
</script>

	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>