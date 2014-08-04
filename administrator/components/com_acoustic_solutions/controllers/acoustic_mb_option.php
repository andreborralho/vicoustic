<?php
/**
 * @version     1.0.0
 * @package     com_acoustic_simulator_component
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Acousticsolutionsline controller class.
 */
class Acoustic_solutionsControllerAcoustic_mb_option extends JControllerForm
{

    function __construct() {
        $this->view_list = 'acoustics_mb_options';
        parent::__construct();
    }

}