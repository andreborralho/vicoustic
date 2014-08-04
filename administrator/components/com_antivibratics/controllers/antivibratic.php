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

jimport('joomla.application.component.controllerform');

/**
 * Antivibratic controller class.
 */
class AntivibraticsControllerAntivibratic extends JControllerForm
{

    function __construct() {
        $this->view_list = 'antivibratics';
        parent::__construct();
    }

}