<?php
/**
 * @version     1.0.3
 * @package     com_distributors
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
$canOrder	= $user->authorise('core.edit.state', 'com_distributors');
$saveOrder	= $listOrder == 'a.ordering';
?>

<form action="<?php echo JRoute::_('index.php?option=com_distributors&view=distributors'); ?>" method="post" name="adminForm" id="adminForm">
	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('Search'); ?>" />
			<button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
		
        

	</fieldset>
	<div class="clr"> </div>

	<table id="distributors_table" class="adminlist">
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
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_MUSIC_BROADCAST', 'a.music_broadcast', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_HIFI_HOME_CINEMA', 'a.hifi_home_cinema', $listDirn, $listOrder); ?>
				</th>
				<th width="3%" class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_BUILDING_CONSTRUCTION', 'a.building_construction', $listDirn, $listOrder); ?>
				</th>
				
				<th class='left'>
				<?php echo JText::alt("COM_DISTRIBUTORS_DISTRIBUTORS_IMAGE","language");?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_NAME', 'a.name', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_ADDRESS', 'a.address', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_ZIPPOSTALCODE', 'a.zippostalcode', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_CITY', 'a.city', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_TELEPHONE', 'a.telephone', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_COUNTRY', 'a.country', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_EMAIL', 'a.email', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_WEBSITE', 'a.website', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_FACEBOOK', 'a.facebook', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_DISTRIBUTORS_DISTRIBUTORS_CATEGORY', 'a.category', $listDirn, $listOrder); ?>
				</th>				
               
                <?php if (isset($this->items[0]->ordering)) { ?>
				<th width="10%">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'a.ordering', $listDirn, $listOrder); ?>
					<?php if ($canOrder && $saveOrder) :?>
						<?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', 'distributors.saveorder'); ?>
					<?php endif; ?>
				</th>
                <?php } ?>
                <?php if (isset($this->items[0]->id)) { ?>
                <th width="1%" class="nowrap">
                    <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
                <?php } ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="12">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			$ordering	= ($listOrder == 'a.ordering');
			$canCreate	= $user->authorise('core.create',		'com_distributors');
			$canEdit	= $user->authorise('core.edit',			'com_distributors');
			$canCheckin	= $user->authorise('core.manage',		'com_distributors');
			$canChange	= $user->authorise('core.edit.state',	'com_distributors');
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>
				
				<?php if (isset($this->items[0]->state)) { ?>
				    <td class="center">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'distributors.', $canChange, 'cb'); ?>
				    </td>
                <?php } ?>

                <td class="center">
					<?php echo JHtml::_('jgrid.published', $item->music_broadcast, $i, 'distributors.', $canChange, 'cb'); ?>
				</td>
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->hifi_home_cinema, $i, 'distributors.', $canChange, 'cb'); ?>
				</td>	
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->building_construction, $i, 'distributors.', $canChange, 'cb'); ?>
				</td>
				
				<td>
					<?php if (substr($item->image,0,6) == 'images') : ?>
						<img src="../<?php echo $item->image; ?>" height="40" width="78">
					<?php else :?>
						<img src="<?php echo $item->image; ?>" height="40" width="78">
					<?php endif; ?>	
				</td>
				
				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'distributors.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_distributors&task=distributor.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->name); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->name); ?>
				<?php endif; ?>
				</td>
				<td>
					<?php echo $item->address; ?>
				</td>
				<td>
					<?php echo $item->zippostalcode; ?>
				</td>
				<td>
					<?php echo $item->city; ?>
				</td>
				<td>
					<?php echo $item->telephone; ?>
				</td>
				<td>
					<?php echo $item->country; ?>
				</td>
				<td>
					<a href="mailto:<?php echo $item->email; ?>"><?php echo $item->email; ?></a>
				</td>
				<td>
					<a href="<?php echo $item->website; ?>"><?php echo $item->website; ?></a>
				</td>
				<td>
					<a href="<?php echo $item->facebook; ?>"><?php echo $item->facebook; ?></a>
				</td>
				<td>
					<?php echo $item->category; ?>
				</td>				


                
                <?php if (isset($this->items[0]->ordering)) { ?>
				    <td class="order">
					    <?php if ($canChange) : ?>
						    <?php if ($saveOrder) :?>
							    <?php if ($listDirn == 'asc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, 'distributors.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'distributors.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							    <?php elseif ($listDirn == 'desc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, 'distributors.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'distributors.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
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
	    jQuery("#distributors_table").stickyTableHeaders();
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