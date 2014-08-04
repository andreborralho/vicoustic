<?php
/**
 * @version     1.0.0
 * @package     com_panel_graphs
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
$document->addStyleSheet('components/com_panels/assets/css/panel_graphs.css');
$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');

$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_panels');
$saveOrder	= $listOrder == 'a.ordering';
?>

<form action="<?php echo JRoute::_('index.php?option=com_panels&view=panel_graphs'); ?>" method="post" name="adminForm" id="adminForm">
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

	<table id="panel_graphs_table" class="adminlist">
		<thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
				</th>

				<?php if (isset($this->items[0]->state)) { ?>
				<th width="5%" class='left admin_border_left'>
					<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
				</th>
                <?php } ?>
                
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_LABEL', 'a.label', $listDirn, $listOrder); ?>
				</th>
				
				<th class='left admin_border_left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_63HZ', 'a.graph_63hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_80HZ', 'a.graph_80hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_100HZ', 'a.graph_100hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_125HZ', 'a.graph_125hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_160HZ', 'a.graph_160hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_200HZ', 'a.graph_200hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_250HZ', 'a.graph_250hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_315HZ', 'a.graph_315hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_400HZ', 'a.graph_400hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_500HZ', 'a.graph_500hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_630HZ', 'a.graph_630hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_800HZ', 'a.graph_800hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_1000HZ', 'a.graph_1000hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_1250HZ', 'a.graph_1250hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_1600HZ', 'a.graph_1600hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_2000HZ', 'a.graph_2000hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_2500HZ', 'a.graph_2500hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_3150HZ', 'a.graph_3150hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_4000HZ', 'a.graph_4000hz', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_PANELS_PANEL_GRAPHS_GRAPH_5000HZ', 'a.graph_5000hz', $listDirn, $listOrder); ?>
				</th>				
                
               
                <?php if (isset($this->items[0]->id)) { ?>
                <th width="1%" class="nowrap">
                    <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
                <?php } ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="25">
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
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'panel_graphs.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>
                
				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'panel_graphs.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_panels&task=panel_graph.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->label); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->label); ?>
				<?php endif; ?>
				</td>
				
				<td class='left admin_border_left'>
					<?php echo $item->graph_63hz; ?>
				</td>
				<td>
					<?php echo $item->graph_80hz; ?>
				</td>
				<td>
					<?php echo $item->graph_100hz; ?>
				</td>
				<td>
					<?php echo $item->graph_125hz; ?>
				</td>
				<td>
					<?php echo $item->graph_160hz; ?>
				</td>
				<td>
					<?php echo $item->graph_200hz; ?>
				</td>
				<td>
					<?php echo $item->graph_250hz; ?>
				</td>
				<td>
					<?php echo $item->graph_315hz; ?>
				</td>
				<td>
					<?php echo $item->graph_400hz; ?>
				</td>
				<td>
					<?php echo $item->graph_500hz; ?>
				</td>
				<td>
					<?php echo $item->graph_630hz; ?>
				</td>
				<td>
					<?php echo $item->graph_800hz; ?>
				</td>
				<td>
					<?php echo $item->graph_1000hz; ?>
				</td>
				<td>
					<?php echo $item->graph_1250hz; ?>
				</td>
				<td>
					<?php echo $item->graph_1600hz; ?>
				</td>
				<td>
					<?php echo $item->graph_2000hz; ?>
				</td>
				<td>
					<?php echo $item->graph_2500hz; ?>
				</td>
				<td>
					<?php echo $item->graph_3150hz; ?>
				</td>
				<td>
					<?php echo $item->graph_4000hz; ?>
				</td>
				<td>
					<?php echo $item->graph_5000hz; ?>
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

<script type="text/javascript">

	jQuery(function(){
	    jQuery("#panel_graphs_table").stickyTableHeaders();
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