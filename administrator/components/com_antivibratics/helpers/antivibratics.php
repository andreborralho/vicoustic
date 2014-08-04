<?php
/**
 * @version     1.0.0
 * @package     com_antivibratics
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Antivibratics helper.
 */
class AntivibraticsHelper
{

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_antivibratics';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
	
	/**
	 * Get the menu list for create a menu module
	 *
	 * @return		array	The menu array list
	 * @since		1.6
	 */
	public static function getAntivibratics()
	{
		$db = JFactory::getDbo();
		$db->setQuery('SELECT a.id, a.name FROM #__antivibratics AS a');
		return $db->loadObjectList();
	}

}
