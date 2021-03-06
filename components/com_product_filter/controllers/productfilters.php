<?php
/**
 * @version     1.0.0
 * @package     com_product_filter
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Productfilters list controller class.
 */
class Product_filterControllerProductfilters extends Product_filterController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Productfilters', $prefix = 'Product_filterModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}