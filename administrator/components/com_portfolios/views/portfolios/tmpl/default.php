<?php
/**
 * @version     1.0.0
 * @package     com_portfolios
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');


$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_portfolios');
$saveOrder	= $listOrder == 'a.ordering';
?>

<form action="<?php echo JRoute::_('index.php?option=com_portfolios&view=portfolios'); ?>" method="post" name="adminForm" id="adminForm">
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

	<table id="portfolios_table" class="adminlist">
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
                
                <th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_MUSIC_BROADCAST', 'a.music_broadcast', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_HIFI_HOME_CINEMA', 'a.hifi_home_cinema', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_BUILDING_CONSTRUCTION', 'a.building_construction', $listDirn, $listOrder); ?>
				</th>

                <th class='left' width='120px'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_ICON', 'a.icon', $listDirn, $listOrder); ?>
				</th>
                
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_TITLE', 'a.title', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_COUNTRY', 'a.country', $listDirn, $listOrder); ?>
				</th>

				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_CATEGORY_EDUCATION', 'a.category_education', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_CATEGORY_HEALTHCARE', 'a.category_healthcare', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_CATEGORY_TRANSPORTS', 'a.category_transports', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_CATEGORY_RETAIL_LEISURE', 'a.category_retail_leisure', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_CATEGORY_OFFICE', 'a.category_office', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_CATEGORY_HIFI_HOME_CINEMA', 'a.category_hifi_home_cinema', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_CATEGORY_THEATRE', 'a.category_theatre', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_CATEGORY_OUTDOOR', 'a.category_outdoor', $listDirn, $listOrder); ?>
				</th>

	            <th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_PANEL_ID1', 'a.panel_id1', $listDirn, $listOrder); ?>
				</th> 
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_PANEL_ID2', 'a.panel_id2', $listDirn, $listOrder); ?>
				</th> 
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_PANEL_ID3', 'a.panel_id3', $listDirn, $listOrder); ?>
				</th> 
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_PANEL_ID4', 'a.panel_id4', $listDirn, $listOrder); ?>
				</th> 
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_PANEL_ID5', 'a.panel_id5', $listDirn, $listOrder); ?>
				</th> 
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_PANEL_ID6', 'a.panel_id6', $listDirn, $listOrder); ?>
				</th> 
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_PANEL_ID7', 'a.panel_id7', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_PANEL_ID8', 'a.panel_id8', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_DOOR_ID', 'a.door_id', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_BLANKET_ID', 'a.blanket_id', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_ANTIVIBRATIC_ID1', 'a.antivibratic_id1', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PORTFOLIOS_PORTFOLIOS_ANTIVIBRATIC_ID2', 'a.antivibratic_id2', $listDirn, $listOrder); ?>
				</th>
	              
                <?php if (isset($this->items[0]->id)) { ?>
                <th width="2%" class="nowrap">
                    <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
                <?php } ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="27">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			$ordering	= ($listOrder == 'a.ordering');
			$canCreate	= $user->authorise('core.create',		'com_portfolios');
			$canEdit	= $user->authorise('core.edit',			'com_portfolios');
			$canCheckin	= $user->authorise('core.manage',		'com_portfolios');
			$canChange	= $user->authorise('core.edit.state',	'com_portfolios');
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>

				 <?php if (isset($this->items[0]->state)) { ?>
				    <td class="center">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'portfolios.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>

                <td class="center">
					<?php echo JHtml::_('jgrid.published', $item->music_broadcast, $i, 'portfolios.', $canChange, 'cb'); ?>
				</td>
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->hifi_home_cinema, $i, 'portfolios.', $canChange, 'cb'); ?>
				</td>	
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->building_construction, $i, 'portfolios.', $canChange, 'cb'); ?>
				</td>

                
                <td class="center">
	                <?php if (isset($item->checked_out) && $item->checked_out) : ?>
						<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'portfolios.', $canCheckin); ?>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<a href="<?php echo JRoute::_('index.php?option=com_portfolios&task=portfolio.edit&id='.(int) $item->id); ?>">
							<img src="../<?php echo $item->icon; ?>" height="60" width="80">
						</a>
					<?php else : ?>
						<img src="../<?php echo $item->icon; ?>" height="60" width="80">
					<?php endif; ?>
                </td>
				
				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'portfolios.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_portfolios&task=portfolio.edit&id='.(int) $item->id); ?>">
						<?php echo $this->escape($item->title); ?>
					</a>
				<?php else : ?>
					<?php echo $this->escape($item->title); ?>
				<?php endif; ?>
				</td>
				
				<td>
					<?php echo $item->country; ?>
				</td>

				<td>
					<?php if ($item->category_education == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->category_healthcare == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->category_transports == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->category_retail_leisure == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->category_office == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->category_hifi_home_cinema == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->category_theatre == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($item->category_outdoor == 1) : ?>
						<span class="check"></span>
					<?php else: ?>
						<span class="not_checked"></span>
					<?php endif; ?>
				</td>
				
				<td>
					<img src="../<?php echo $item->panel1_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->panel2_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->panel3_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->panel4_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->panel5_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->panel6_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->panel7_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->panel8_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->door_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->blanket_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->antivibratic1_photo; ?>" height="50" width="70">
				</td>
				<td>
					<img src="../<?php echo $item->antivibratic2_photo; ?>" height="50" width="70">
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

<?php 
	JHTML::_('script','system/multiselect.js',false,true);
	// Import
	$document = JFactory::getDocument();
	$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
?>

<script type="text/javascript">

	jQuery(function(){
	    jQuery("#portfolios_table").stickyTableHeaders();
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