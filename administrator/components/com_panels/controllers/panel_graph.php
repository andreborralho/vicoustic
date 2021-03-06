<?php
/**
 * @version     1.0.0
 * @package     com_panel_graphs
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre Borralho <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Panel_graph controller class.
 */
class PanelsControllerPanel_graph extends JControllerForm
{

    function __construct() {
        $this->view_list = 'panel_graphs';
        parent::__construct();
    }

}