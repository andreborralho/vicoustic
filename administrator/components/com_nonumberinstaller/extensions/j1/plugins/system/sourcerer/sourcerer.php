<?php
/**
 * Main Plugin File
 * Does all the magic!
 *
 * @package         Sourcerer
 * @version         3.2.2
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

// Import library dependencies
jimport('joomla.plugin.plugin');

/**
 * Plugin that replaces Sourcerer code with its HTML / CSS / JavaScript / PHP equivalent
 */
class plgSystemSourcerer extends JPlugin
{
	function __construct(&$subject, $config)
	{
		$this->_pass = 0;
		parent::__construct($subject, $config);
	}

	function onAfterRoute()
	{
		$this->_pass = 0;

		jimport('joomla.filesystem.file');
		if (JFile::exists(JPATH_PLUGINS . '/system/nnframework/helpers/protect.php')) {
			require_once JPATH_PLUGINS . '/system/nnframework/helpers/protect.php';
			// return if page should be protected
			if (NNProtect::isProtectedPage('', 1)) {
				return;
			}
		}

		$app = JFactory::getApplication();

		// load the admin language file
		$lang = JFactory::getLanguage();
		if ($lang->getTag() != 'en-GB') {
			// Loads English language file as fallback (for undefined stuff in other language file)
			$lang->load('plg_' . $this->_type . '_' . $this->_name, JPATH_ADMINISTRATOR, 'en-GB');
		}
		$lang->load('plg_' . $this->_type . '_' . $this->_name, JPATH_ADMINISTRATOR, null, 1);

		// return if NoNumber Framework plugin is not installed
		if (!JFile::exists(JPATH_PLUGINS . '/system/nnframework/nnframework.php')) {
			if ($app->isAdmin() && JRequest::getCmd('option') != 'com_login') {
				$msg = JText::_('SRC_NONUMBER_FRAMEWORK_NOT_INSTALLED');
				$msg .= ' ' . JText::sprintf('SRC_EXTENSION_CAN_NOT_FUNCTION', JText::_('SOURCERER'));
				$mq = $app->getMessageQueue();
				foreach ($mq as $m) {
					if ($m['message'] == $msg) {
						$msg = '';
						break;
					}
				}
				if ($msg) {
					$app->enqueueMessage($msg, 'error');
				}
			}
			return;
		}

		if (JFile::exists(JPATH_PLUGINS . '/system/nnframework/helpers/protect.php')) {
			require_once JPATH_PLUGINS . '/system/nnframework/helpers/protect.php';
			// return if current page is an admin page
			if (NNProtect::isAdmin()) {
				return;
			}
		} else if ($app->isAdmin()) {
			return;
		}

		$this->_pass = 1;

		// load the admin language file
		$lang = JFactory::getLanguage();
		if ($lang->getTag() != 'en-GB') {
			// Loads English language file as fallback (for undefined stuff in other language file)
			$lang->load('plg_' . $this->_type . '_' . $this->_name, JPATH_SITE, 'en-GB');
		}
		$lang->load('plg_' . $this->_type . '_' . $this->_name, JPATH_SITE, null, 1);

		// Load plugin parameters
		require_once JPATH_PLUGINS . '/system/nnframework/helpers/parameters.php';
		$parameters = NNParameters::getInstance();
		$params = $parameters->getPluginParams($this->_name, $this->_type, $this->params);

		// Include the Helper
		require_once JPATH_PLUGINS . '/' . $this->_type . '/' . $this->_name . '/helper.php';
		$class = get_class($this) . 'Helper';
		$this->helper = new $class ($params);
	}

	function onPrepareContent(&$article, &$params)
	{
		if ($this->_pass) {
			$this->helper->onPrepareContent($article, $params);
		}
	}

	function onAfterDispatch()
	{
		if ($this->_pass) {
			$this->helper->onAfterDispatch();
		}
	}

	function onAfterRender()
	{
		if ($this->_pass) {
			$this->helper->onAfterRender();
		}
	}
}