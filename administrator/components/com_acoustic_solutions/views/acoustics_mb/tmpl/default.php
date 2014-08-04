<?php
/**
 * @version     1.0.0
 * @package     com_acoustic_simulator_component
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);

$language = JFactory::getLanguage();
$language->load('com_acoustic_solutions');

$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_acoustic_solutions');
$saveOrder	= $listOrder == 'a.ordering';
?>

<form action="<?php echo JRoute::_('index.php?option=com_acoustic_solutions&view=acoustics_mb'); ?>" method="post" name="adminForm" id="adminForm">
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

	<table class="adminlist">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>				

                <?php if (isset($this->items[0]->state)) { ?>
				<th width="5%">
					<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
				</th>
                <?php } ?>
                
                <th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_NAME', 'a.name', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_REF', 'a.ref', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_AREA_MIN', 'a.area_min', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_AREA_MAX', 'a.area_max', $listDirn, $listOrder); ?>
				</th>
				<th width="25%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_DESCRIPTION', 'a.description', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_ICON', 'a.icon', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_IMAGE1', 'a.image1', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_IMAGE2', 'a.image2', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_IMAGE3', 'a.image3', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_TECHNICAL_FILE', 'a.technical_file', $listDirn, $listOrder); ?>
				</th>

				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_PANEL_ID1', 'a.panel_id1', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_PANEL1_BOXES', 'a.panel1_boxes', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_PANEL_ID2', 'a.panel_id2', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_PANEL2_BOXES', 'a.panel2_boxes', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_PANEL_ID3', 'a.panel_id3', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_PANEL3_BOXES', 'a.panel3_boxes', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_PANEL_ID4', 'a.panel_id4', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_PANEL4_BOXES', 'a.panel4_boxes', $listDirn, $listOrder); ?>
				</th>

				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_LINE_ID', 'a.line_id', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ACOUSTIC_SOLUTIONS_ACOUSTICS_MB_ROOM_ID', 'a.room_id', $listDirn, $listOrder); ?>
				</th>

                <?php if (isset($this->items[0]->id)) { ?>
                <th width="1%" class="nowrap">
                    <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
                <?php } ?>
			</tr>
		</thead>
		<tfoot>
			<?php 
                if(isset($this->items[0])){
                    $colspan = count(get_object_vars($this->items[0]));
                }
                else{
                    $colspan = 17;
                }
            ?>
			<tr>
				<td colspan="<?php echo $colspan ?>">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			$ordering	= ($listOrder == 'a.ordering');
			$canCreate	= $user->authorise('core.create',		'com_acoustic_solutions');
			$canEdit	= $user->authorise('core.edit',			'com_acoustic_solutions');
			$canCheckin	= $user->authorise('core.manage',		'com_acoustic_solutions');
			$canChange	= $user->authorise('core.edit.state',	'com_acoustic_solutions');
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>

                <?php if (isset($this->items[0]->state)) { ?>
				    <td class="center">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'acoustics_mb.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>

                <td>
                <?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_acoustic_solutions&task=acoustic_mb.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->name); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->name); ?>
				<?php endif; ?>
				</td>
				
				<td>
					<?php echo $item->ref; ?>
				</td>
				<td>
					<?php echo $item->area_min; ?>
				</td>
				<td>
					<?php echo $item->area_max; ?>
				</td>
				<td>
					<?php 
						$truncated = (strlen($item->description) > 50) ? substr($item->description, 0, 50) . '...' : $item->description;
					echo $truncated; ?>
				</td>
				<td>
					<img alt="Icon" src="../<?php echo $item->icon; ?>" height="60px" width="80px">
				</td>
				<td>
					<img alt="Image 1" src="../<?php echo $item->image1; ?>" height="60px" width="80px">
				</td>
				<td>
					<img alt="Image 2" src="../<?php echo $item->image2; ?>" height="60px" width="80px">
				</td>
                <td>
					<img alt="Image 3" src="../<?php echo $item->image3; ?>" height="60px" width="80px">
				</td>
				<td>
					<?php echo $item->technical_file; ?>
				</td>
				<td>
					<?php echo $item->panel1_name; ?>
				</td>
				<td>
					<?php echo $item->panel1_boxes; ?>
				</td>
				<td>
					<?php echo $item->panel2_name; ?>
				</td>
				<td>
					<?php echo $item->panel2_boxes; ?>
				</td>
				<td>
					<?php echo $item->panel3_name; ?>
				</td>
				<td>
					<?php echo $item->panel3_boxes; ?>
				</td>				
				<td>
					<?php echo $item->panel4_name; ?>
				</td>
				<td>
					<?php echo $item->panel4_boxes; ?>
				</td>				
				<td>
					<?php echo $item->line_name; ?>
				</td>
				<td>
					<?php echo $item->room_name; ?>
				</td>

                <?php if (isset($this->items[0]->id)) { ?>
				<td class="center">
					<?php echo (int) $item->id; ?>
				</td>
                <?php } ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>