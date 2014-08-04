<?php
/**
 * @version     1.0.0
 * @package     com_product_filter
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JController::getInstance('Product_filter');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
