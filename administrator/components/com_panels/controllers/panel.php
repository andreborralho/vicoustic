<?php
/**
 * @version     1.0.0
 * @package     com_panels
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      André Borralho <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Panel controller class.
 */
class PanelsControllerPanel extends JControllerForm
{

    function __construct() {
        $this->view_list = 'panels';
        parent::__construct();
    }

}