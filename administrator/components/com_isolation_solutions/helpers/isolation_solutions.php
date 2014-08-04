<?php
/**
 * @version     1.0.0
 * @package     com_isolation_solutions
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Isolation_solutions helper.
 */
class Isolation_solutionsHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_ISOLATION_SOLUTIONS_TITLE_ISOLATIONS'),
			'index.php?option=com_isolation_solutions&view=isolations',
			$vName == 'isolations'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_ISOLATION_SOLUTIONS_TITLE_ISOLATION_CATEGORIES'),
			'index.php?option=com_isolation_solutions&view=isolation_categories',
			$vName == 'isolation_categories'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_ISOLATION_SOLUTIONS_TITLE_ISOLATION_CURRENCIES'),
			'index.php?option=com_isolation_solutions&view=isolation_currencies',
			$vName == 'isolation_currencies'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_ISOLATION_SOLUTIONS_TITLE_ISOLATION_UNITS'),
			'index.php?option=com_isolation_solutions&view=isolation_units',
			$vName == 'isolation_units'
		);
	}

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

		$assetName = 'com_isolation_solutions';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
