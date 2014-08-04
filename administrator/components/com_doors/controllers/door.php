<?php
/**
 * @version     1.0.0
 * @package     com_doors
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Door controller class.
 */
class DoorsControllerDoor extends JControllerForm
{

    function __construct() {
        $this->view_list = 'doors';
        parent::__construct();
    }

}