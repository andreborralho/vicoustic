<?php
/**
 * @version     1.0.0
 * @package     com_acoustic_simulator_component
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Acoustic_simulator_component helper.
 */
class Acoustic_solutionsHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_ACOUSTIC_SOLUTIONS_TITLE_ACOUSTICS_MB'),
			'index.php?option=com_acoustic_solutions&view=acoustics_mb',
			$vName == 'acoustics_mb'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_ACOUSTIC_SOLUTIONS_TITLE_ACOUSTICS_MB_OPTIONS'),
			'index.php?option=com_acoustic_solutions&view=acoustics_mb_options',
			$vName == 'acoustics_mb_options'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_ACOUSTIC_SOLUTIONS_TITLE_ACOUSTIC_LINES'),
			'index.php?option=com_acoustic_solutions&view=acoustic_lines',
			$vName == 'acoustic_lines'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_ACOUSTIC_SOLUTIONS_TITLE_ACOUSTICS_BC'),
			'index.php?option=com_acoustic_solutions&view=acoustics_bc',
			$vName == 'acoustics_bc'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_ACOUSTIC_SOLUTIONS_TITLE_ACOUSTIC_ROOMS'),
			'index.php?option=com_acoustic_solutions&view=acoustic_rooms',
			$vName == 'acoustic_rooms'
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

		$assetName = 'com_acoustic_solutions';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
