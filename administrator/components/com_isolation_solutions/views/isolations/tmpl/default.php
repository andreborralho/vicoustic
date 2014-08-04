<?php
/**
 * @version     1.0.0
 * @package     com_isolation_solutions
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHTML::_('script','system/multiselect.js',false,true);
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_isolation_solutions/assets/css/isolation_solutions.css');

$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_isolation_solutions');
$saveOrder	= $listOrder == 'a.ordering';
?>

<form action="<?php echo JRoute::_('index.php?option=com_isolation_solutions&view=isolations'); ?>" method="post" name="adminForm" id="adminForm">
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
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" >
				</th>

				<?php if (isset($this->items[0]->state)) { ?>
				<th width="5%">
					<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
				</th>
                <?php } ?>

				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_NAME', 'a.name', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_REF', 'a.ref', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_RW', 'a.rw', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_STC', 'a.stc', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_PRICE', 'a.price', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_GRAPH', 'a.graph', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_SOLUTION_IMAGE', 'a.solution_image', $listDirn, $listOrder); ?>
				</th>
				
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_SOLUTION_DATA_SHEET', 'a.solution_data_sheet', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_TECHNICAL_FILE1', 'a.technical_file1', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_TECHNICAL_FILE2', 'a.technical_file2', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_TECHNICAL_FILE3', 'a.technical_file3', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_TECHNICAL_FILE4', 'a.technical_file4', $listDirn, $listOrder); ?>
				</th>				

				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_ANTIVIBRATIC_ID1', 'a.antivibratic_id1', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_ANTIVIBRATIC_ID2', 'a.antivibratic_id2', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_ANTIVIBRATIC_ID3', 'a.antivibratic_id3', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_ANTIVIBRATIC_ID4', 'a.antivibratic_id4', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_ANTIVIBRATIC_ID5', 'a.antivibratic_id5', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ISOLATION_SOLUTIONS_ISOLATIONS_CATEGORY_ID', 'a.category_id', $listDirn, $listOrder); ?>
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
                    $colspan = 20;
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
			$canCreate	= $user->authorise('core.create',		'com_isolation_solutions');
			$canEdit	= $user->authorise('core.edit',			'com_isolation_solutions');
			$canCheckin	= $user->authorise('core.manage',		'com_isolation_solutions');
			$canChange	= $user->authorise('core.edit.state',	'com_isolation_solutions');
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>
				
				<?php if (isset($this->items[0]->state)) { ?>
				    <td class="center">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'isolations.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>

				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'isolations.', $canCheckin); ?>
				<?php endif; ?>
				
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_isolation_solutions&task=isolation.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->name); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->name); ?>
				<?php endif; ?>
				</td>
				
				<td>
					<?php echo $item->ref; ?>
				</td>
				<td>
					<?php echo $item->rw; ?>
				</td>
				<td>
					<?php echo $item->stc; ?>
				</td>
				<td>
					<?php echo $item->price; ?>
				</td>
				
				<td>
					<?php if (substr($item->solution_image,0,6) == 'images') : ?>
						<img alt="" src="../<?php echo $item->solution_image; ?>" height="60px" width="60px">
					<?php else :?>
						<img alt="" src="<?php echo $item->solution_image; ?>" height="60px" width="60px">
					<?php endif; ?>
				</td>
				<td>
					<?php if (substr($item->solution_image,0,6) == 'images') : ?>
						<img alt="" src="../<?php echo $item->graph; ?>" height="50px" width="70px">
					<?php else :?>
						<img alt="" src="<?php echo $item->graph; ?>" height="50px" width="70px">
					<?php endif; ?>
				</td>				
				
				<td>
					<?php echo $item->solution_data_sheet; ?>
				</td>
				<td>
					<?php echo $item->technical_file1; ?>
				</td>
				<td>
					<?php echo $item->technical_file2; ?>
				</td>
				<td>
					<?php echo $item->technical_file3; ?>
				</td>
				<td>
					<?php echo $item->technical_file4; ?>
				</td>
				

				<td>					
					<?php						
						if($item->antivibratic1_id != 0):
							echo $item->antivibratic1_name; 
						elseif($item->blanket1_id != 0):
							echo $item->blanket1_name; 
						endif;
					?>
				</td>
				<td>
					<?php
						if($item->antivibratic2_id != 0):
							echo $item->antivibratic2_name; 
						elseif($item->blanket2_id != 0):
							echo $item->blanket2_name; 
						endif;
					?>
				</td>
				<td>
					<?php
						if($item->antivibratic_id3 != 0):
							echo $item->antivibratic3_name; 
						elseif($item->blanket3_id != 0):
							echo $item->blanket3_name; 
						endif;
					?>
				</td>
				<td>
					<?php
						if($item->antivibratic_id4 != 0):
							echo $item->antivibratic4_name; 
						elseif($item->blanket4_id != 0):
							echo $item->blanket4_name; 
						endif;
					?>
				</td>
				<td>
					<?php
						if($item->antivibratic_id5 != 0):
							echo $item->antivibratic5_name; 
						elseif($item->blanket5_id != 0):
							echo $item->blanket5_name; 
						endif;
					?>
				</td>
                
                <td>
					<?php echo $item->category_name; ?>
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