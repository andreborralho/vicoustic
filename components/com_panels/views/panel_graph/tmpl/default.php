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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_panels', JPATH_ADMINISTRATOR);
?>

<?php if( $this->item ) : ?>

    <div class="item_fields">
        
        <ul class="fields_list">

			<li><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_GRAPH_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_GRAPH_LABEL'); ?>:
			<?php echo $this->item->label; ?></li>
			<li><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_GRAPH_G_63HZ'); ?>:
			<?php echo $this->item->g_63hz; ?></li>
			<li><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_GRAPH_G_80HZ'); ?>:
			<?php echo $this->item->g_80hz; ?></li>
			<li><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_GRAPH_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_PANELS_FORM_LBL_PANEL_GRAPH_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>


        </ul>
        
    </div>
    
<?php else: ?>
    Could not load the item
<?php endif; ?>
