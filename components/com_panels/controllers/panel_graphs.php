<?php
/**
 * @version     1.0.0
 * @package     com_panels
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre Borralho <andrefilipe_one@hotmail.com> - http://
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Panel_graphs list controller class.
 */
class PanelsControllerPanel_graphs extends PanelsController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Panel_graphs', $prefix = 'PanelsModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}