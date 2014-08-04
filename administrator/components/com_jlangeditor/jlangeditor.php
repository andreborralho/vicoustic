<?php

/**
 * @version		$Id: jlangeditor.php 177 2011-06-10 10:00:00 rajug $
 * @package		Joomla
 * @subpackage	Components
 * @copyright	Copyright (C) 2011 Raju Gautam - raju@devraju.com  All rights reserved.
 * @author		Raju Gautam <raju@devraju.com>
 * @link		http://www.devraju.com
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_jlangeditor')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// require helper file
JLoader::register('JlangEditorHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'jlangeditor.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by JlangEditor
$controller = JController::getInstance('JlangEditor');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
