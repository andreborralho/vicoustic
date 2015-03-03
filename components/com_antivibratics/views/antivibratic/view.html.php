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

	jimport('joomla.application.component.view');
	require_once JPATH_BASE . '/components/com_panels/helpers/panels.php';
	require_once JPATH_BASE . '/libraries/fpdf/fpdf.php';

	JFactory::getLanguage()->load('com_vicoustic', JPATH_SITE, 'en-GB');
	$document = JFactory::getDocument();
	$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
	$document->addScript('scripts/galleria-1.2.9.min.js');
	$document->addScript('scripts/components.js');

	class AntivibraticsViewAntivibratic extends JView {

		protected $state;
		protected $item;
		protected $form;
		protected $params;

		public function display($tpl = null) {
			$app	= JFactory::getApplication();

			$this->state = $this->get('State');
			$this->item = $this->get('Data');
			$this->items = $this->get('Items');
			$this->params = $app->getParams('com_antivibratics');

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
				$this->params->def('page_heading', JText::_('com_antivibratics_DEFAULT_PAGE_TITLE'));
			}

			$this->document->setTitle($this->item->name);

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