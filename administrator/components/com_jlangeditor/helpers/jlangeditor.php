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
defined('_JEXEC') or die;

/**
 * JlangEditorHelper component helper.
 */
abstract class JlangEditorHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		// set some global property
		$document = JFactory::getDocument();
	}
	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($messageId)) {
			$assetName = 'com_jlangeditor';
		}
		else {
			$assetName = 'com_jlangeditor.message.'.(int) $messageId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}
