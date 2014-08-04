<?php
/**
 * @version     1.0.3
 * @package     com_distributors
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Distributor controller class.
 */
class DistributorsControllerDistributor extends JControllerForm
{

    function __construct() {
        $this->view_list = 'distributors';
        parent::__construct();
    }

}