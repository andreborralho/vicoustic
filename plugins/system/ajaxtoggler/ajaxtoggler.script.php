<?php
/**
 * @package		AJAX Toggler
 * @copyright	Copyright (C) 2009 - 2013 AlterBrains.com. All rights reserved.
 * @license		GNU/GPL, see LICENSE.txt
 */
class plgSystemAjaxtogglerInstallerScript
{

	function install($parent) {
		JFactory::getApplication()->enqueueMessage(JText::_('Successfully installed "System - AJAX Toggler" plugin!'));
	}

	function uninstall($parent) {
		JFactory::getApplication()->enqueueMessage(JText::_('Successfully uninstalled "System - AJAX Toggler" plugin!'));
	}

	function update($parent) {
		JFactory::getApplication()->enqueueMessage(JText::_('Successfully updated "System - AJAX Toggler" plugin!'));
	}
	
}