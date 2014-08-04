<?php
/**
 * @version     1.0.0
 * @package     com_panels
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre Borralho <andrefilipe_one@hotmail.com> - http://
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
$canOrder	= $user->authorise('core.edit.state', 'com_panels');
$saveOrder	= $listOrder == 'a.ordering';
?>

<form action="<?php echo JRoute::_('index.php?option=com_panels&view=panels'); ?>" method="post" name="adminForm" id="adminForm">
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

	<table id="panels_table" class="adminlist">
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
                <th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_STATE_FEATURED', 'a.state_featured', $listDirn, $listOrder); ?>
				</th>
				
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_MUSIC_BROADCAST', 'a.music_broadcast', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_HIFI_HOME_CINEMA', 'a.hifi_home_cinema', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_BUILDING_CONSTRUCTION', 'a.building_construction', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="8%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_NAME', 'a.name', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="2%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_REF', 'a.ref', $listDirn, $listOrder); ?>
				</th>
				<th width="4%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_EAN13', 'a.ean13', $listDirn, $listOrder); ?>
				</th>			
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_HS_CODE', 'a.hs_code', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="6.5%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FAMILY', 'a.family', $listDirn, $listOrder); ?>
				</th>
				<th width="2%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_LENGTH', 'a.length', $listDirn, $listOrder); ?>
				</th>
				<th width="2%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_WIDTH', 'a.width', $listDirn, $listOrder); ?>
				</th>
				<th width="2.3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_DIAMETER', 'a.diameter', $listDirn, $listOrder); ?>
				</th>
				<th width="3.2%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_THICKNESS', 'a.thickness', $listDirn, $listOrder); ?>
				</th>
				<th width="2%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_WEIGHT', 'a.weight', $listDirn, $listOrder); ?>
				</th>				
				<th width="2%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_DENSITY', 'a.density', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_SCRATCH_RESISTANCE', 'a.scratch_resistance', $listDirn, $listOrder); ?>
				</th>
				<th width="2.9%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_WASHABLE', 'a.washable', $listDirn, $listOrder); ?>
				</th>
				<th width="3.2%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_RECYCLE_COEFFICIENT', 'a.recycle_coefficient', $listDirn, $listOrder); ?>
				</th>
				
				<th width="3%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FUNCTIONALITY', 'a.functionality', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_ABSORPTION_FREQUENCY', 'a.absorption_frequency', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_ABSORPTION_CLASS', 'a.absorption_class', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_AW', 'a.aw', $listDirn, $listOrder); ?>
				</th>
				<th width="2%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_NRC', 'a.nrc', $listDirn, $listOrder); ?>
				</th>				
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_ABSORPTION_CLASS_2', 'a.absorption_class_2', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_AW_2', 'a.aw_2', $listDirn, $listOrder); ?>
				</th>
				<th width="2.5%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_NRC_2', 'a.nrc_2', $listDirn, $listOrder); ?>
				</th>				
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIRE_CLASS_EN', 'a.fire_class_en', $listDirn, $listOrder); ?>
				</th>			
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIRE_CLASS_DIN', 'a.fire_class_din', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIRE_CLASS_NF_P', 'a.fire_class_nf_p', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIRE_CLASS_UNI', 'a.fire_class_uni', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIRE_CLASS_BS', 'a.fire_class_bs', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_HUMIDITY_CLASS', 'a.humidity_class', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_LIGHT_REFLECTION', 'a.light_reflection', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_HUMIDITY_RESISTANCE', 'a.humidity_resistance', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_THERMAL_CONDUCTIVITY', 'a.thermal_conductivity', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="2.2%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_UNITS_PER_BOX', 'a.units_per_box', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_BOX_LENGTH', 'a.box_length', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_BOX_WIDTH', 'a.box_width', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_BOX_HEIGHT', 'a.box_height', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_BOX_WEIGHT', 'a.box_weight', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_BOX_VOLUME', 'a.box_volume', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_BOX_MSRP', 'a.box_msrp', $listDirn, $listOrder); ?>
				</th>
				<th width="3.9%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_MASTERCARTON_BOX_LENGTH', 'a.mastercarton_box_length', $listDirn, $listOrder); ?>
				</th>
				<th width="3.9%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_MASTERCARTON_BOX_WIDTH', 'a.mastercarton_box_width', $listDirn, $listOrder); ?>
				</th>
				<th width="3.9%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_MASTERCARTON_BOX_HEIGHT', 'a.mastercarton_box_height', $listDirn, $listOrder); ?>
				</th>
				<th width="3.8%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_MASTERCARTON_BOX_MSRP', 'a.mastercarton_box_msrp', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="2%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_WOOD', 'a.wood', $listDirn, $listOrder); ?>
				</th>
				<th width="2%">
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_METAL', 'a.metal', $listDirn, $listOrder); ?>
				</th>
				<th width="2%">
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FABRIC', 'a.fabric', $listDirn, $listOrder); ?>
				</th>
				<th width="2%">
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FOAM', 'a.foam', $listDirn, $listOrder); ?>
				</th>
				<th width="3%">
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_POLYSTYRENE', 'a.polystyrene', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_WOOD_COLOR', 'a.wood_color', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_WOOD_TYPE', 'a.wood_type', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_METAL_COLOR', 'a.metal_color', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FABRIC_COLOR', 'a.fabric_color', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FABRIC_TYPE', 'a.fabric_type', $listDirn, $listOrder); ?>
				</th>
				<th width="2.7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FOAM_TYPE', 'a.foam_type', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_POLYSTYRENE_COLOR', 'a.polystyrene_color', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_POLYSTYRENE_DENSITY', 'a.polystyrene_density', $listDirn, $listOrder); ?>
				</th>				
				<th width="2.5%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_EDGE_LEVELED', 'a.edge_leveled', $listDirn, $listOrder); ?>
				</th>
				<th width="2.5%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_EDGE_ANGLED', 'a.edge_angled', $listDirn, $listOrder); ?>
				</th>
				
				
				<th width="3%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_INSTALLATION_WALL', 'a.installation_wall', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_INSTALLATION_CEILING', 'a.installation_ceiling', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_INSTALLATION_VERTICAL_ACOUSTIC_SYSTEM', 'a.installation_vas', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_INSTALLATION_FLOOR', 'a.installation_floor', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_INSTALLATION_CORNER', 'a.installation_corner', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIXING_TYPE_STANDARD15', 'a.fixing_type_standard15', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIXING_TYPE_STANDARD24', 'a.fixing_type_standard24', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIXING_TYPE_CLIPIN', 'a.fixing_type_clipin', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIXING_TYPE_SCREWED', 'a.fixing_type_screwed', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIXING_TYPE_GLUED', 'a.fixing_type_glued', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_FIXING_TYPE_ADHESIVE', 'a.fixing_type_adhesive', $listDirn, $listOrder); ?>
				</th>				
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_LOAD_WEIGHT', 'a.load_weight', $listDirn, $listOrder); ?>
				</th>
				
			
				<th width="15%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_DESCRIPTION1', 'a.description1', $listDirn, $listOrder); ?>
				</th>
				<th width="20%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_DESCRIPTION2', 'a.description2', $listDirn, $listOrder); ?>
				</th>
				

				<th width="7%" class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_CATALOG_PAGE', 'a.catalog_page', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_INSTALLATION_MANUAL', 'a.installation_manual', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_SKETCHUP', 'a.sketchup', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_WARRANTY', 'a.warranty', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_DRAWINGS', 'a.drawings', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_SAFETY_DATA', 'a.safety_data', $listDirn, $listOrder); ?>
				</th>
				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_ACOUSTIC_REPORT', 'a.acoustic_report', $listDirn, $listOrder); ?>
				</th>

				<th width="7%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PANEL_GRAPH', 'a.graph_id', $listDirn, $listOrder); ?>
				</th>


				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_VIDEO', 'a.video', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_ROW_MATERIAL', 'a.photo_row_material', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_150PX', 'a.photo_150px', $listDirn, $listOrder); ?>
				</th>
				<th width="50px" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_300PX', 'a.photo_300px', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_1024PX', 'a.photo_1024px', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_DETAIL1', 'a.photo_detail1', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_DETAIL2', 'a.photo_detail2', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_DETAIL3', 'a.photo_detail3', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_DETAIL4', 'a.photo_detail4', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PHOTO_DETAIL5', 'a.photo_detail5', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PORTFOLIO_PHOTO_ID1', 'a.portfolio_photo_id1', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PORTFOLIO_PHOTO_ID2', 'a.portfolio_photo_id2', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANELS_PORTFOLIO_PHOTO_ID3', 'a.portfolio_photo_id3', $listDirn, $listOrder); ?>
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
				<td colspan="100">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			$ordering	= ($listOrder == 'a.ordering');
			$canCreate	= $user->authorise('core.create',		'com_panels');
			$canEdit	= $user->authorise('core.edit',			'com_panels');
			$canCheckin	= $user->authorise('core.manage',		'com_panels');
			$canChange	= $user->authorise('core.edit.state',	'com_panels');
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>
				
                <?php if (isset($this->items[0]->state)) { ?>
				    <td class="center admin_border_left">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'panels.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>
                             					
				<?php if (isset($this->items[0]->state_featured)) { ?>
					<td class="center">
						<?php echo JHtml::_('jgrid.published', $item->state_featured, $i, 'panels.', $canChange, 'cb'); ?>
					</td>
				<?php } ?>	

				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->music_broadcast, $i, 'panels.', $canChange, 'cb'); ?>
				</td>
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->hifi_home_cinema, $i, 'panels.', $canChange, 'cb'); ?>
				</td>	
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->building_construction, $i, 'panels.', $canChange, 'cb'); ?>
				</td>

				<td class="admin_border_left">
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'panels.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_panels&task=panel.edit&id='.(int) $item->id); ?>">
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
					<?php echo $item->length; ?>
				</td>
				<td>
					<?php echo $item->width; ?>
				</td>
				<td>
					<?php echo $item->diameter; ?>
				</td>
				<td>
					<?php echo $item->thickness; ?>
				</td>
				<td>
					<?php echo $item->weight; ?>
				</td>				
				<td>
					<?php echo $item->density; ?>
				</td>
				<td>
					<?php if ($item->scratch_resistance == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->washable == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $item->recycle_coefficient; ?>
				</td>
				
				
				<td class="admin_border_left">
					<?php echo ucwords($item->functionality); ?>
				</td>
				<td>
					<?php echo $item->absorption_frequency; ?>
				</td>							
				<td>
					<?php echo $item->absorption_class; ?>
				</td>
				<td>
					<?php echo $item->aw; ?>
				</td>
				<td>
					<?php echo $item->nrc; ?>
				</td>
				<td>
					<?php echo $item->absorption_class_2; ?>
				</td>
				<td>
					<?php echo $item->aw_2; ?>
				</td>
				<td>
					<?php echo $item->nrc_2; ?>
				</td>
				<td>
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
				<td>
					<?php echo $item->humidity_class; ?>
				</td>
				<td>
					<?php echo $item->light_reflection; ?>
				</td>
				<td>
					<?php echo $item->humidity_resistance; ?>
				</td>
				<td>
					<?php echo $item->thermal_conductivity; ?>
				</td>
				
				
				<td class="admin_border_left">
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
					<?php if ($item->wood == 1) : ?>
						<span class="check"></span>						
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>	
				<td>
					<?php if ($item->metal == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->fabric == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->foam == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->polystyrene == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>		
				<td>
					<?php echo ucwords($item->wood_color); ?>
				</td>
				<td>
					<?php echo ucwords($item->wood_type); ?>
				</td>
				<td>
					<?php echo ucwords($item->metal_color); ?>
				</td>
				<td>
					<?php echo ucwords($item->fabric_color); ?>
				</td>
				<td>
					<?php echo ucwords($item->fabric_type); ?>
				</td>
				<td>
					<?php echo ucwords($item->foam_type); ?>
				</td>
				<td>
					<?php echo ucwords($item->polystyrene_color); ?>
				</td>
				<td>
					<?php echo $item->polystyrene_density; ?>
				</td>			
				<td>
					<?php if ($item->edge_leveled == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->edge_angled == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				
				
				<td class='admin_border_left'>
					<?php if ($item->installation_wall == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->installation_ceiling == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->installation_vas == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->installation_floor == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>					
				</td>
				<td>
					<?php if ($item->installation_corner == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->fixing_type_standard15 == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->fixing_type_standard24 == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->fixing_type_clipin == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->fixing_type_screwed == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->fixing_type_glued == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->fixing_type_adhesive == 1) : ?>
						<span class="check"></span>
						<?php $antipanicbar = 1;?>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $item->load_weight; ?>
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

				<td>
					<?php echo $item->panel_graph_label; ?>
				</td>


				<td>
					<?php echo str_replace("<iframe", "", $item->video); ?>
				</td>
				<td>					
					<?php if (substr($item->photo_row_material,0,6) == 'images') : ?>
						<img src="../<?php echo $item->photo_row_material; ?>" height="50" width="70">
					<?php else :?>
						<img src="<?php echo $item->photo_row_material; ?>" height="50" width="70">
					<?php endif; ?>	
				</td>
				<td>
					<?php $url_image=getimagesize('../images/panels/photos_150px/'. $item->ref .'_150.png'); ?>
					<?php if($item->photo_150px): ?>
	        			<img alt="<?php echo $item->name; ?>" src="<?php echo $item->photo_150px; ?>" height="50" width="50">
					<?php elseif(!is_array($url_image)): ?>
	    				<img alt="<?php echo $item->name; ?>" src="../images/not_available_medium.png" height="50" width="50">
	        		<?php else : ?>
	    				<img alt="<?php echo $item->name; ?>" src="../images/panels/photos_150px/<?php echo $item->ref; ?>_150.png " height="50" width="50">
	    			<?php endif; ?>

				</td>
				<td>
					<?php $url_image=getimagesize('../images/panels/photos_300px/'. $item->ref .'_220.png'); ?>
					<?php if($item->photo_300px): ?>
	        			<img alt="<?php echo $item->name; ?>" src="<?php echo $item->photo_300px; ?>" height="50" width="50">
					<?php elseif(!is_array($url_image)): ?>
	    				<img alt="<?php echo $item->name; ?>" src="../images/not_available_medium.png" height="50" width="50">
	        		<?php else : ?>
	    				<img alt="<?php echo $item->name; ?>" src="../images/panels/photos_300px/<?php echo $item->ref; ?>_220.png " height="50" width="50">
	    			<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_1024px,0,6) == 'images') : ?>
						<img src="../<?php echo $item->photo_1024px; ?>" height="50" width="70">
					<?php else :?>
						<img src="<?php echo $item->photo_1024px; ?>" height="50" width="70">
					<?php endif; ?>	
				</td>
				<td>
					<?php if (substr($item->photo_detail1,0,6) == 'images') : ?>
						<img src="../<?php echo $item->photo_detail1; ?>" height="50" width="70">
					<?php else :?>
						<img src="<?php echo $item->photo_detail1; ?>" height="50" width="70">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail2,0,6) == 'images') : ?>
						<img src="../<?php echo $item->photo_detail2; ?>" height="50" width="70">
					<?php else :?>
						<img src="<?php echo $item->photo_detail2; ?>" height="50" width="70">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail3,0,6) == 'images') : ?>
						<img src="../<?php echo $item->photo_detail3; ?>" height="50" width="70">
					<?php else :?>
						<img src="<?php echo $item->photo_detail3; ?>" height="50" width="70">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail4,0,6) == 'images') : ?>
						<img src="../<?php echo $item->photo_detail4; ?>" height="50" width="70">
					<?php else :?>
						<img src="<?php echo $item->photo_detail4; ?>" height="50" width="70">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->photo_detail5,0,6) == 'images') : ?>
						<img src="../<?php echo $item->photo_detail5; ?>" height="50" width="70">
					<?php else :?>
						<img src="<?php echo $item->photo_detail5; ?>" height="50" width="70">
					<?php endif; ?>
				</td>	
				
				<td>
					<img src="../<?php echo $item->portfolio_photo1_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->portfolio_photo2_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->portfolio_photo3_photo; ?>" height="50" width="70">
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
		    jQuery("#panels_table").stickyTableHeaders();
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