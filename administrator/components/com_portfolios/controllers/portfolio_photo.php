<?php
/**
 * @version     1.0.0
 * @package     com_portfolio
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Andre <andrefilipe_one@hotmail.com> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Portfolio controller class.
 */
class PortfoliosControllerPortfolio_photo extends JControllerForm
{

    function __construct() {
        $this->view_list = 'portfolio_photos';
        parent::__construct();
    }

}