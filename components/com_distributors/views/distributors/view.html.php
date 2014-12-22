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

  jimport('joomla.application.component.view');
  require_once JPATH_COMPONENT . '/helpers/distributors.php';
  JFactory::getLanguage()->load('com_vicoustic', JPATH_SITE, 'en-GB');
  $document = JFactory::getDocument();
  $document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
  $document->addScript('components/com_distributors/assets/scripts/jquery-jvectormap-1.2.2.min.js');


  class DistributorsViewDistributors extends JView {

	protected $items;
	protected $pagination;
	protected $state;
	protected $params;

	function __construct() {
	  parent::__construct();
	  // Set the pagination request variables
	  JRequest::setVar('limit', JRequest::getVar('limit', 1000, '', 'int'));
	  JRequest::setVar('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));
	}


	public function display($tpl = null) {
	  $app                = JFactory::getApplication();
	  $this->state		= $this->get('State');
	  $this->items		= $this->get('Items');
	  $this->pagination	= $this->get('Pagination');
	  $this->params     = $app->getParams('com_distributors');

	  // Check for errors.
	  if (count($errors = $this->get('Errors'))) {
		throw new Exception(implode("\n", $errors));
	  }

	  $this->_prepareDocument();

	  parent::display($tpl);
	}


	protected function _prepareDocument() {
	  $app	= JFactory::getApplication();
	  $menus	= $app->getMenu();
	  $title	= null;

	  // Because the application sets a default page title, we need to get it from the menu item itself
	  $menu = $menus->getActive();
	  if($menu) {
		$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
	  }
	  else {
		$this->params->def('page_heading', JText::_('com_distributors_DEFAULT_PAGE_TITLE'));
	  }

	  $title = $this->params->get('page_title', '');
	  if (empty($title)) {
		$title = $app->getCfg('sitename');
	  }
	  elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
		$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
	  }
	  elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
		$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
	  }
	  $this->document->setTitle($title);

	  if ($this->params->get('menu-meta_description')) {
		$this->document->setDescription($this->params->get('menu-meta_description'));
	  }

	  if ($this->params->get('menu-meta_keywords')) {
		$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
	  }

	  if ($this->params->get('robots')) {
		$this->document->setMetadata('robots', $this->params->get('robots'));
	  }
	}

  }
