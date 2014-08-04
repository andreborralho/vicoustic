<?php
/**
 * @version     1.0.0
 * @package     com_portfolio
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_portfolios', JPATH_ADMINISTRATOR);
?>

<?php if( $this->item ) : ?>

    <div class="item_fields">
        
        <ul class="fields_list portfolio_fields_list">

			
			<li><?php echo JText::_('COM_PORTFOLIO_FORM_LBL_PORTFOLIO_TITLE'); ?>:
			<?php echo $this->item->title; ?></li>
			<li><?php echo JText::_('COM_PORTFOLIO_FORM_LBL_PORTFOLIO_COUNTRY'); ?>:
			<?php echo $this->item->country; ?></li>
			<li><?php echo JText::_('COM_PORTFOLIO_FORM_LBL_PORTFOLIO_CATEGORY'); ?>:
			<?php echo $this->item->category; ?></li>
			
			

        </ul>
        
    </div>
    
<?php else: ?>
    Could not load the item
<?php endif; ?>
