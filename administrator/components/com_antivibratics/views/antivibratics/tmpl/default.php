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

JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);
// Import CSS
$document = JFactory::getDocument();
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');


$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_antivibratics');
$saveOrder	= $listOrder == 'a.ordering';
?>

<form action="<?php echo JRoute::_('index.php?option=com_antivibratics&view=antivibratics'); ?>" method="post" name="adminForm" id="adminForm">
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

	<table id="antivibratics_table" class="adminlist">
		<thead>
			<tr>
				<th width="2%">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>

				<?php if (isset($this->items[0]->state)) { ?>
				<th class="admin_border_left" width="3%">
					<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
				</th>
                <?php } ?>                
                <th width="3%">
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_STATE_FEATURED', 'a.state_featured', $listDirn, $listOrder); ?>
				</th>
				
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_MUSIC_BROADCAST', 'a.music_broadcast', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_HIFI_HOME_CINEMA', 'a.hifi_home_cinema', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_BUILDING_CONSTRUCTION', 'a.building_construction', $listDirn, $listOrder); ?>
				</th>
				
				<th width="8%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_NAME', 'a.name', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="2.7%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_REF', 'a.ref', $listDirn, $listOrder); ?>
				</th>
				<th width="4%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_EAN13', 'a.ean13', $listDirn, $listOrder); ?>
				</th>				
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_HS_CODE', 'a.hs_code', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="7%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_FAMILY', 'a.family', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_MOUNTING_WIDTH', 'a.mounting_width', $listDirn, $listOrder); ?>
				</th>
				<th width="2%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_RUPTURE_POINT', 'a.rupture_point', $listDirn, $listOrder); ?>
				</th>
				<th width="3.3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_LOAD_WEIGHT_MIN', 'a.load_weight_min', $listDirn, $listOrder); ?>
				</th>			
				<th width="3.3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_LOAD_WEIGHT_MAX', 'a.load_weight_max', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_RECYCLE_COEFFICIENT', 'a.recycle_coefficient', $listDirn, $listOrder); ?>
				</th>

				<th width="3%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_INSTALLATION_WALL', 'a.installation_wall', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_INSTALLATION_CEILING', 'a.installation_ceiling', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_INSTALLATION_FLOOR', 'a.installation_floor', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_INSTALLATION_DIVISION_WALL', 'a.installation_division_wall', $listDirn, $listOrder); ?>
				</th>				
				
				<th width="3%" class='left admin_border_left'>			
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_FIRE_CLASS_EN', 'a.fire_class_en', $listDirn, $listOrder); ?>
				</th>			
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_FIRE_CLASS_DIN', 'a.fire_class_din', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_FIRE_CLASS_NF_P', 'a.fire_class_nf_p', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_FIRE_CLASS_UNI', 'a.fire_class_uni', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_FIRE_CLASS_BS', 'a.fire_class_bs', $listDirn, $listOrder); ?>
				</th>

				<th width="3%" class='left admin_border_left'>			
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_STEEL', 'a.steel', $listDirn, $listOrder); ?>
				</th>			
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_RUBBER_COLOR', 'a.rubber_color', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_ANGLE_ADAPTATION', 'a.angle_adaptation', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_HOOKING_SYSTEM', 'a.hooking_system', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_SECURITY_DEVICES', 'a.security_devices', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_FIRE_SECURITY_DEVICES', 'a.fire_security_devices', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PLATE_THICKNESS', 'a.plate_thickness', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PLATE_LENGTH', 'a.plate_length', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="2.2%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_MSRP', 'a.msrp', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_UNITS_PER_BOX', 'a.units_per_box', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_BOX_LENGTH', 'a.box_length', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_BOX_WIDTH', 'a.box_width', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_BOX_HEIGHT', 'a.box_height', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_BOX_WEIGHT', 'a.box_weight', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_BOX_VOLUME', 'a.box_volume', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_BOX_MSRP', 'a.box_msrp', $listDirn, $listOrder); ?>
				</th>
				<th width="4%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_MASTERCARTON_BOX_LENGTH', 'a.mastercarton_box_length', $listDirn, $listOrder); ?>
				</th>
				<th width="4%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_MASTERCARTON_BOX_WIDTH', 'a.mastercarton_box_width', $listDirn, $listOrder); ?>
				</th>
				<th width="4%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_MASTERCARTON_BOX_HEIGHT', 'a.mastercarton_box_height', $listDirn, $listOrder); ?>
				</th>
				<th width="4%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_MASTERCARTON_BOX_MSRP', 'a.mastercarton_box_msrp', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="15%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_DESCRIPTION1', 'a.description1', $listDirn, $listOrder); ?>
				</th>
				<th width="20%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_DESCRIPTION2', 'a.description2', $listDirn, $listOrder); ?>
				</th>
				
				<th width="7%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_CATALOG_PAGE', 'a.catalog_page', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_INSTALLATION_MANUAL', 'a.installation_manual', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_SKETCHUP', 'a.sketchup', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_WARRANTY', 'a.warranty', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_DRAWINGS', 'a.drawings', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_SAFETY_DATA', 'a.safety_data', $listDirn, $listOrder); ?>
				</th>				
				
				<th width="8%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_VIDEO', 'a.video', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PHOTO_150PX', 'a.photo_150px', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PHOTO_300PX', 'a.photo_300px', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PHOTO_1024PX', 'a.photo_1024px', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PHOTO_DETAIL1', 'a.photo_detail1', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PHOTO_DETAIL2', 'a.photo_detail2', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PHOTO_DETAIL3', 'a.photo_detail3', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PHOTO_DETAIL4', 'a.photo_detail4', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PHOTO_DETAIL5', 'a.photo_detail5', $listDirn, $listOrder); ?>
				</th>			
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PORTFOLIO_PHOTO_ID1', 'a.portfolio_photo_id1', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ANTIVIBRATICS_ANTIVIBRATICS_PORTFOLIO_PHOTO_ID2', 'a.portfolio_photo_id2', $listDirn, $listOrder); ?>
				</th>	
				
                 <?php if (isset($this->items[0]->id)) { ?>
                <th width="1.3%" class="admin_border_left nowrap">
                    <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
                <?php } ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="52">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			$ordering	= ($listOrder == 'a.ordering');
			$canCreate	= $user->authorise('core.create',		'com_antivibratics');
			$canEdit	= $user->authorise('core.edit',			'com_antivibratics');
			$canCheckin	= $user->authorise('core.manage',		'com_antivibratics');
			$canChange	= $user->authorise('core.edit.state',	'com_antivibratics');
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>
				
                <?php if (isset($this->items[0]->state)) { ?>
				    <td class="center admin_border_left">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'antivibratics.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>
                             					
				<?php if (isset($this->items[0]->state_featured)) { ?>
					<td class="center">
						<?php echo JHtml::_('jgrid.published', $item->state_featured, $i, 'antivibratics.', $canChange, 'cb'); ?>
					</td>
				<?php } ?>	

				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->music_broadcast, $i, 'antivibratics.', $canChange, 'cb'); ?>
				</td>
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->hifi_home_cinema, $i, 'antivibratics.', $canChange, 'cb'); ?>
				</td>	
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->building_construction, $i, 'antivibratics.', $canChange, 'cb'); ?>
				</td>
				
				<td class="admin_border_left">
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'antivibratics.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_antivibratics&task=antivibratic.edit&id='.(int) $item->id); ?>">
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
					<?php echo $item->hs_code; ?>
				</td>
				
				<td class="admin_border_left">
					<?php echo $item->family; ?>
				</td>
				<td>
					<?php echo $item->mounting_width; ?>
				</td>
				<td>
					<?php echo $item->rupture_point; ?>
				</td>		
				<td>
					<?php echo $item->load_weight_min; ?>
				</td>	
				<td>
					<?php echo $item->load_weight_max; ?>
				</td>	
				<td>
					<?php echo $item->recycle_coefficient; ?>
				</td>

				<td>
					<?php if ($item->installation_wall == 1) : ?>
					<span class="check"></span>
					<?php else: ?>
					<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->installation_ceiling == 1) : ?>
					<span class="check"></span>
					<?php else: ?>
					<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>	
					<?php if ($item->installation_floor == 1) : ?>
					<span class="check"></span>
					<?php else: ?>
					<span class="not_checked"></span>
					<?php endif; ?>				
				</td>
				<td>
					<?php if ($item->installation_division_wall == 1) : ?>
					<span class="check"></span>
					<?php else: ?>
					<span class="not_checked"></span>
					<?php endif; ?>
				</td>								
				
				<td class="admin_border_left">				
					<?php echo $item->fire_class_en; ?>
				</td>				
				<td>
					<?php echo $item->fire_class_din; ?>
				</td>
				<td>
					<?php echo $item->fire_class_nf_p; ?>
				</td>
				<td>
					<?php echo $item->fire_class_uni; ?>
				</td>
				<td>
					<?php echo $item->fire_class_bs; ?>
				</td>

				<td class="admin_border_left">	
					<?php if ($item->steel == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>				
				<td>
					<?php echo $item->rubber_color; ?>
				</td>
				<td>
					<?php if ($item->angle_adaptation == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->hooking_system == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $item->security_devices; ?>
				</td>
				<td>
					<?php if ($item->fire_security_devices == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $item->plate_thickness; ?>
				</td>	
				<td>
					<?php echo $item->plate_length; ?>
				</td>			
				
				
				<td class="admin_border_left">
					<?php echo $item->msrp; ?>
				</td>
				<td>
					<?php echo $item->units_per_box; ?>
				</td>
				<td>
					<?php echo $item->box_length; ?>
				</td>
				<td>
					<?php echo $item->box_width; ?>
				</td>
				<td>
					<?php echo $item->box_height; ?>
				</td>
				<td>
					<?php echo $item->box_weight; ?>
				</td>
				<td>
					<?php echo $item->box_volume; ?>
				</td>
				<td>
					<?php echo $item->box_msrp; ?>
				</td>
				<td>
					<?php echo $item->mastercarton_box_length; ?>
				</td>
				<td>
					<?php echo $item->mastercarton_box_width; ?>
				</td>
				<td>
					<?php echo $item->mastercarton_box_height; ?>
				</td>
				<td>
					<?php echo $item->mastercarton_box_msrp; ?>
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
				
				<td class="admin_border_left">
					<?php echo str_replace("<iframe", "", $item->video); ?>
				</td>
				<td>
					<?php if (substr($item->photo_150px,0,6) == 'images') : ?>
						<img alt="Photo 150px" src="../<?php echo $item->photo_150px; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="Photo 150px" src="<?php echo $item->photo_150px; ?>" height="60px" width="60px">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_300px,0,6) == 'images') : ?>
						<img alt="Photo 300px" src="../<?php echo $item->photo_300px; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="Photo 300px" src="<?php echo $item->photo_300px; ?>" height="60px" width="60px">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_1024px,0,6) == 'images') : ?>
						<img alt="Photo 1024px" src="../<?php echo $item->photo_1024px; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="Photo 1024px" src="<?php echo $item->photo_1024px; ?>" height="60px" width="60px">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_detail1,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail1; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail1; ?>" height="60px" width="60px">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail2,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail2; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail2; ?>" height="60px" width="60px">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail3,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail3; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail3; ?>" height="60px" width="60px">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail4,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail4; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail4; ?>" height="60px" width="60px">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail5,0,6) == 'images') : ?>
						<img alt="Detail Photo" src="../<?php echo $item->photo_detail5; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="Detail Photo" src="<?php echo $item->photo_detail5; ?>" height="60px" width="60px">
					<?php endif; ?>
				</td>		
				<td>
					<img alt="Portfolio Photo" src="../<?php echo $item->portfolio_photo1_photo; ?>" height="60px" width="80px">
				</td>
				<td>
					<img alt="Portfolio Photo" src="../<?php echo $item->portfolio_photo2_photo; ?>" height="60px" width="80px">
				</td>		
						
        
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
	    jQuery("#antivibratics_table").stickyTableHeaders();
	});
	
	;(function (jQuery, window, undefined) {
	    'use strict';
	
	    var pluginName = 'stickyTableHeaders';
	    var defaults = {
	            fixedOffset: 0
	        };
	
	    function Plugin (el, options) {
	        // To avoid scope issues, use 'base' instead of 'this'
	        // to reference this class from internal events and functions.
	        var base = this;
	
	        // Access to jQuery and DOM versions of element
	        base.$el = jQuery(el);
	        base.el = el;
	
	        // Cache DOM refs for performance reasons
	        base.$window = jQuery(window);
	        base.$clonedHeader = null;
	        base.$originalHeader = null;
	
	        // Keep track of state
	        base.isCloneVisible = false;
	        base.leftOffset = null;
	        base.topOffset = null;
	
	        base.init = function () {
	            base.options = jQuery.extend({}, defaults, options);
	
	            base.$el.each(function () {
	                var $this = jQuery(this);
	
	                // remove padding on <table> to fix issue #7
	                $this.css('padding', 0);
	
	                $this.wrap('<div class="divTableWithFloatingHeader"></div>');
	                				
	                base.$originalHeader = jQuery('thead:first', this);
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
	
	                $this.bind('sortEnd', base.updateWidth);
	            });
	
	            base.updateWidth();
	            base.toggleHeaders();
	
	            base.$window.scroll(base.toggleHeaders);
	            base.$window.resize(base.toggleHeaders);
	            base.$window.resize(base.updateWidth);
	        };
	
	        base.toggleHeaders = function () {
	            base.$el.each(function () {
	                var $this = jQuery(this);
	
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
	            jQuery('th', base.$clonedHeader).each(function (index) {
	                var $this = jQuery(this);
	                var $origCell = jQuery('th', base.$originalHeader).eq(index);
	                this.className = $origCell.attr('class') || '';
	                $this.css('width', $origCell.width());
	            });
	
	            // Copy row width from whole table
	            base.$clonedHeader.css('width', base.$originalHeader.width());
	        };
	
	        // Run initializer
	        base.init();
	    }
	
	    // A really lightweight plugin wrapper around the constructor,
	    // preventing against multiple instantiations
	    jQuery.fn[pluginName] = function ( options ) {
	        return this.each(function () {
	            if (!jQuery.data(this, 'plugin_' + pluginName)) {
	                jQuery.data(this, 'plugin_' + pluginName, new Plugin( this, options ));
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